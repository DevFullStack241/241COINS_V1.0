<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Etablishment;
use App\Models\Owner;
use App\Models\VerificationToken;
use Illuminate\Support\Facades\DB;
use constGuards;
use constDefaults;
use Illuminate\Support\Facades\File;
use SawaStacks\Utils\Kropify as UtilsKropify;



class ClientController extends Controller
{
    public function login(Request $request)
    {
        $data = [
            'pageTitle' => 'Client Login'
        ];
        return view('back.pages.client.auth.login', $data);
    } //End Method

    public function register(Request $request)
    {
        $data = [
            'pageTitle' => 'Create Client Account'
        ];
        return view('back.pages.client.auth.register', $data);
    } //End Method

    public function home(Request $request)
    {
        $etablishments = Etablishment::with('category')
            ->latest() // Trie du plus récent au plus ancien
            ->take(6) // Limite à 6 établissements
            ->get();

        // Récupérer tous les clients
        $clients = Client::all();

        $categories = Category::all();
        $owners = Owner::all();

        // Compter le nombre total de clients
        $totalClients = $clients->count();

        $totalEtablishments = $etablishments->count();

        $totalCategories = $categories->count();
        $totalOwners = $owners->count();

        $data = [
            'pageTitle' => 'Client Home',
            'etablishments' => $etablishments,
            'clients' => $clients,
            'totalClients' => $totalClients,
            'totalEtablishments' => $totalEtablishments,
            'totalCategories' => $totalCategories,
            'totalOwners' => $totalOwners,

        ];

        return view('font_end.pages.home', $data);
    }


    public function createClient(Request $request)
    {
        //Validate Client Registration Form
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients',
            'password' => 'min:5|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:5'
        ]);

        $client = new Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->password = Hash::make($request->password);
        $saved = $client->save();

        if ($saved) {
            //Generate token
            $token = base64_encode(Str::random(64));

            VerificationToken::create([
                'user_type' => 'client',
                'email' => $request->email,
                'token' => $token
            ]);

            $actionLink = route('client.verify', ['token' => $token]);
            $data['action_link'] = $actionLink;
            $data['client_name'] = $request->name;
            $data['client_email'] = $request->email;

            //Send Activation link to this client email
            $mail_body = view('email-templates.client-verify-template', $data)->render();

            $mailConfig = array(
                'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
                'mail_from_name' => env('EMAIL_FROM_NAME'),
                'mail_recipient_email' => $request->email,
                'mail_recipient_name' => $request->name,
                'mail_subject' => 'Verify Client Account',
                'mail_body' => $mail_body
            );

            if (sendEmail($mailConfig)) {
                return redirect()->route('client.register-success');
            } else {
                return redirect()->route('client.register')->with('fail', 'Une erreur s\'est produite lors de l\'envoi du lien de vérification.');
            }
        } else {
            return redirect()->route('client.register')->with('fail', 'Quelque chose s\'est mal passé.');
        }
    } //End Method

    public function verifyAccount(Request $requet, $token)
    {
        $verifyToken = VerificationToken::where('token', $token)->first();

        if (!is_null($verifyToken)) {
            $client = Client::where('email', $verifyToken->email)->first();

            if (!$client->verified) {
                $client->verified = 1;
                $client->email_verified_at = Carbon::now();
                $client->save();

                return redirect()->route('client.login')->with('success', 'Bien !, Votre e-mail est vérifié. Connectez-vous avec vos informations d\'identification et terminez la configuration de votre compte propriétaire.');
            } else {
                return redirect()->route('client.login')->with('info', 'Votre e-mail est déjà vérifié. Vous pouvez maintenant vous connecter.');
            }
        } else {
            return redirect()->route('client.register')->with('fail', 'Jeton invalide.');
        }
    } //End Method

    public function registerSuccess(Request $request)
    {
        return view('back.pages.client.register-success');
    } //End Method

    public function loginHandler(Request $request)
    {
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if ($fieldType == 'email') {
            $request->validate([
                'login_id' => 'required|email|exists:clients,email',
                'password' => 'required|min:5|max:45'
            ], [
                'login_id.required' => 'L\'e-mail ou le nom d\'utilisateur est requis.',
                'login_id.email' => 'Adresse e-mail invalide.',
                'login_id.exists' => 'L\'e-mail n\'existe pas dans le système.',
                'password.required' => 'Le mot de passe est requis'
            ]);
        } else {
            $request->validate([
                'login_id' => 'required|exists:clients,username',
                'password' => 'required|min:5|max:45'
            ], [
                'login_id.required' => 'L\'e-mail ou le nom d\'utilisateur est requis.',
                'login_id.exists' => 'Le nom d\'utilisateur n\'existe pas dans le système.',
                'password.required' => 'Le mot de passe est requis'
            ]);
        }

        $creds = array(
            $fieldType => $request->login_id,
            'password' => $request->password
        );

        if (Auth::guard('client')->attempt($creds)) {
            // return redirect()->route('client.home');
            if (!auth('client')->user()->verified) {
                auth('client')->logout();
                return redirect()->route('client.login')->with('fail', 'Votre compte n\'est pas vérifié. Vérifiez votre e-mail et cliquez sur le lien que nous vous avons envoyé afin de vérifier votre e-mail pour le compte propriétaire.');
            } else {
                return redirect()->route('client.home');
            }
        } else {
            return redirect()->route('client.login')->withInput()->with('fail', 'Mot de passe incorrect.');
        }
    } //End Method

    public function logoutHandler(Request $request)
    {
        Auth::guard('client')->logout();
        return redirect()->route('home')->with('fail', 'Vous êtes déconnecté !');
    } //End Method

    public function forgotPassword(Request $request)
    {
        $data = [
            'pageTitle' => 'Forgot Password'
        ];
        return view('back.pages.client.auth.forgot-password', $data);
    } //End Method

    public function sendPasswordResetLink(Request $request)
    {
        //Validate the form
        $request->validate([
            'email' => 'required|email|exists:clients,email'
        ], [
            'email.required' => 'L\'attribut :est obligatoire',
            'email.email' => 'Adresse e-mail invalide',
            'email.exists' => 'L\'attribut : n\'existe pas dans notre système'
        ]);

        //Get Client details
        $client = Client::where('email', $request->email)->first();

        //Generate token
        $token = base64_encode(Str::random(64));

        //Check if there is an existing reset password token for this client
        $oldToken = DB::table('password_reset_tokens')
            ->where(['email' => $client->email, 'guard' => constGuards::CLIENT])
            ->first();

        if ($oldToken) {
            //UPDATE EXISTING TOKEN
            DB::table('password_reset_tokens')
                ->where(['email' => $client->email, 'guard' => constGuards::CLIENT])
                ->update([
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
        } else {
            //INSERT NEW RESET PASSWORD TOKEN
            DB::table('password_reset_tokens')
                ->insert([
                    'email' => $client->email,
                    'guard' => constGuards::CLIENT,
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
        }

        $actionLink = route('client.reset-password', ['token' => $token, 'email' => urlencode($client->email)]);

        $data['actionLink'] = $actionLink;
        $data['client'] = $client;
        $mail_body = view('email-templates.client-forgot-email-template', $data)->render();

        $mailConfig = array(
            'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
            'mail_from_name' => env('EMAIL_FROM_NAME'),
            'mail_recipient_email' => $client->email,
            'mail_recipient_name' => $client->name,
            'mail_subject' => 'Reset Password',
            'mail_body' => $mail_body
        );

        if (sendEmail($mailConfig)) {
            return redirect()->route('client.forgot-password')->with('success', 'Nous avons envoyé par e-mail le lien de réinitialisation de votre mot de passe.');
        } else {
            return redirect()->route('client.forgot-password')->with('fail', 'Quelque chose s\'est mal passé.');
        }
    } //End Method

    public function showResetForm(Request $request, $token = null)
    {
        //Check if token exists
        $get_token = DB::table('password_reset_tokens')
            ->where(['token' => $token, 'guard' => constGuards::CLIENT])
            ->first();

        if ($get_token) {
            //Check if this token is not expired
            $diffMins = Carbon::createFromFormat('Y-m-d H:i:s', $get_token->created_at)->diffInMinutes(Carbon::now());

            if ($diffMins > constDefaults::tokenExpiredMinutes) {
                //When token is older that 15 minutes
                return redirect()->route('client.forgot-password', ['token' => $token])->with('fail', 'Jeton expiré !. Demandez un autre lien de réinitialisation du mot de passe.');
            } else {
                return view('back.pages.client.auth.reset-password')->with(['token' => $token]);
            }
        } else {
            return redirect()->route('client.forgot-password', ['token' => $token])->with('fail', 'Jeton invalide !, demandez un autre lien de réinitialisation du mot de passe.');
        }
    } //End Method

    public function resetPasswordHandler(Request $request)
    {
        //Validate the form
        $request->validate([
            'new_password' => 'required|min:5|max:45|required_with:confirm_new_password|same:confirm_new_password',
            'confirm_new_password' => 'required'
        ]);

        $token = DB::table('password_reset_tokens')
            ->where(['token' => $request->token, 'guard' => constGuards::CLIENT])
            ->first();

        //Get client details
        $client = Client::where('email', $token->email)->first();

        //Update client password
        Client::where('email', $client->email)->update([
            'password' => Hash::make($request->new_password)
        ]);

        //Delete token record
        DB::table('password_reset_tokens')->where([
            'email' => $client->email,
            'token' => $request->token,
            'guard' => constGuards::CLIENT
        ])->delete();

        //Send email to notify client for new password
        $data['client'] = $client;
        $data['new_password'] = $request->new_password;

        $mail_body = view('email-templates.client-reset-email-template', $data);

        $mailConfig = array(
            'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
            'mail_from_name' => env('EMAIL_FROM_NAME'),
            'mail_recipient_email' => $client->email,
            'mail_recipient_name' => $client->name,
            'mail_subject' => 'Password Changed',
            'mail_body' => $mail_body
        );

        sendEmail($mailConfig);
        return redirect()->route('client.login')->with('success', 'Terminé !, Votre mot de passe a été modifié. Utilisez un nouveau mot de passe pour vous connecter au système.');
    } //End Method

    public function profileView(Request $request)
    {
        $data = [
            'pageTitle' => 'Profile'
        ];
        return view('back.pages.client.profile', $data);
    }

    public function changeProfilePicture(Request $request)
    {
        $client = Client::findOrFail(auth('client')->id());
        $path = 'images/users/clients/';
        $file = $request->file('clientProfilePictureFile');
        $old_picture = $client->getAttributes()['picture'];
        $filename = 'CLIENT_IMG_' . $client->id . '.jpg';

        $upload = UtilsKropify::getFile($file, $filename)->maxWoH(325)->save($path);
        $infos = $upload->getInfo();

        if ($upload) {
            if ($old_picture != null && File::exists(public_path($path . $old_picture))) {
                File::delete(public_path($path . $old_picture));
            }
            $client->update(['picture' => $infos->getName]);

            return response()->json(['status' => 1, 'msg' => 'Votre photo de profil a été mise à jour avec succès.']);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Quelque chose s\'est mal passé.']);
        }
    }

    public function addComment(Request $request, $etablishmentId)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        Comment::create([
            'client_id' => Auth::guard('client')->id(),
            'etablishment_id' => $etablishmentId,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Commentaire ajouté avec succès.');
    }

    public function replyToComment(Request $request, $commentId)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        $parentComment = Comment::findOrFail($commentId);

        // Vérifier si l'utilisateur connecté est un client
        if (!Auth::guard('client')->check()) {
            return redirect()->back()->with('error', 'Seuls les clients peuvent répondre aux commentaires.');
        }

        // Un client peut répondre uniquement à un commentaire lié au même établissement
        if ($parentComment->etablishment_id != $request->etablishment_id) {
            return redirect()->back()->with('error', 'Action non autorisée.');
        }

        Comment::create([
            'client_id' => Auth::guard('client')->id(),
            'etablishment_id' => $parentComment->etablishment_id,
            'parent_id' => $commentId, // Permet d'afficher les réponses sous le bon commentaire
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Réponse ajoutée avec succès.');
    }
}
