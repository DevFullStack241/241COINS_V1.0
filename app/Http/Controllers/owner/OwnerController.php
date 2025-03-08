<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Etablishment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Owner;
use App\Models\VerificationToken;
use Illuminate\Support\Facades\DB;
use constGuards;
use constDefaults;
use Illuminate\Support\Facades\File;
use SawaStacks\Utils\Kropify as UtilsKropify;



class OwnerController extends Controller
{
    public function login(Request $request)
    {
        $data = [
            'pageTitle' => 'Owner Login'
        ];
        return view('back.pages.owner.auth.login', $data);
    } //End Method

    public function register(Request $request)
    {
        $data = [
            'pageTitle' => 'Create Owner Account'
        ];
        return view('back.pages.owner.auth.register', $data);
    } //End Method

    public function home(Request $request)
    {

        // Récupère uniquement les établissements de cet utilisateur
        $etablishments = Etablishment::where('owner_id', auth()->id())->get();


        $data = [
            'pageTitle' => 'Owner Dashboard',
            'etablishments' => $etablishments
        ];

        return view('back.pages.owner.home', $data);
    }


    public function createOwner(Request $request)
    {
        //Validate Owner Registration Form
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:owners',
            'password' => 'min:5|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:5'
        ]);

        $owner = new Owner();
        $owner->name = $request->name;
        $owner->email = $request->email;
        $owner->password = Hash::make($request->password);
        $saved = $owner->save();

        if ($saved) {
            //Generate token
            $token = base64_encode(Str::random(64));

            VerificationToken::create([
                'user_type' => 'owner',
                'email' => $request->email,
                'token' => $token
            ]);

            $actionLink = route('owner.verify', ['token' => $token]);
            $data['action_link'] = $actionLink;
            $data['owner_name'] = $request->name;
            $data['owner_email'] = $request->email;

            //Send Activation link to this owner email
            $mail_body = view('email-templates.owner-verify-template', $data)->render();

            $mailConfig = array(
                'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
                'mail_from_name' => env('EMAIL_FROM_NAME'),
                'mail_recipient_email' => $request->email,
                'mail_recipient_name' => $request->name,
                'mail_subject' => 'Verify Owner Account',
                'mail_body' => $mail_body
            );

            if (sendEmail($mailConfig)) {
                return redirect()->route('owner.register-success');
            } else {
                return redirect()->route('owner.register')->with('fail', 'Une erreur s\'est produite lors de l\'envoi du lien de vérification.');
            }
        } else {
            return redirect()->route('owner.register')->with('fail', 'Quelque chose s\'est mal passé.');
        }
    } //End Method

    public function verifyAccount(Request $requet, $token)
    {
        $verifyToken = VerificationToken::where('token', $token)->first();

        if (!is_null($verifyToken)) {
            $owner = Owner::where('email', $verifyToken->email)->first();

            if (!$owner->verified) {
                $owner->verified = 1;
                $owner->email_verified_at = Carbon::now();
                $owner->save();

                return redirect()->route('owner.login')->with('success', 'Bien !, Votre e-mail est vérifié. Connectez-vous avec vos informations d\'identification et terminez la configuration de votre compte propriétaire.');
            } else {
                return redirect()->route('owner.login')->with('info', 'Votre e-mail est déjà vérifié. Vous pouvez maintenant vous connecter.');
            }
        } else {
            return redirect()->route('owner.register')->with('fail', 'Jeton invalide.');
        }
    } //End Method

    public function registerSuccess(Request $request)
    {
        return view('back.pages.owner.register-success');
    } //End Method

    public function loginHandler(Request $request)
    {
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if ($fieldType == 'email') {
            $request->validate([
                'login_id' => 'required|email|exists:owners,email',
                'password' => 'required|min:5|max:45'
            ], [
                'login_id.required' => 'L\'e-mail ou le nom d\'utilisateur est requis.',
                'login_id.email' => 'Adresse e-mail invalide.',
                'login_id.exists' => 'L\'e-mail n\'existe pas dans le système.',
                'password.required' => 'Le mot de passe est requis'
            ]);
        } else {
            $request->validate([
                'login_id' => 'required|exists:owners,username',
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

        if (Auth::guard('owner')->attempt($creds)) {
            // return redirect()->route('owner.home');
            if (!auth('owner')->user()->verified) {
                auth('owner')->logout();
                return redirect()->route('owner.login')->with('fail', 'Votre compte n\'est pas vérifié. Vérifiez votre e-mail et cliquez sur le lien que nous vous avons envoyé afin de vérifier votre e-mail pour le compte propriétaire.');
            } else {
                return redirect()->route('owner.home');
            }
        } else {
            return redirect()->route('owner.login')->withInput()->with('fail', 'Mot de passe incorrect.');
        }
    } //End Method

    public function logoutHandler(Request $request)
    {
        Auth::guard('owner')->logout();
        return redirect()->route('home')->with('fail', 'Vous êtes déconnecté !');
    } //End Method

    public function forgotPassword(Request $request)
    {
        $data = [
            'pageTitle' => 'Forgot Password'
        ];
        return view('back.pages.owner.auth.forgot-password', $data);
    } //End Method

    public function sendPasswordResetLink(Request $request)
    {
        //Validate the form
        $request->validate([
            'email' => 'required|email|exists:owners,email'
        ], [
            'email.required' => 'L\'attribut :est obligatoire',
            'email.email' => 'Adresse e-mail invalide',
            'email.exists' => 'L\'attribut : n\'existe pas dans notre système'
        ]);

        //Get Owner details
        $owner = Owner::where('email', $request->email)->first();

        //Generate token
        $token = base64_encode(Str::random(64));

        //Check if there is an existing reset password token for this owner
        $oldToken = DB::table('password_reset_tokens')
            ->where(['email' => $owner->email, 'guard' => constGuards::OWNER])
            ->first();

        if ($oldToken) {
            //UPDATE EXISTING TOKEN
            DB::table('password_reset_tokens')
                ->where(['email' => $owner->email, 'guard' => constGuards::OWNER])
                ->update([
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
        } else {
            //INSERT NEW RESET PASSWORD TOKEN
            DB::table('password_reset_tokens')
                ->insert([
                    'email' => $owner->email,
                    'guard' => constGuards::OWNER,
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
        }

        $actionLink = route('owner.reset-password', ['token' => $token, 'email' => urlencode($owner->email)]);

        $data['actionLink'] = $actionLink;
        $data['owner'] = $owner;
        $mail_body = view('email-templates.owner-forgot-email-template', $data)->render();

        $mailConfig = array(
            'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
            'mail_from_name' => env('EMAIL_FROM_NAME'),
            'mail_recipient_email' => $owner->email,
            'mail_recipient_name' => $owner->name,
            'mail_subject' => 'Reset Password',
            'mail_body' => $mail_body
        );

        if (sendEmail($mailConfig)) {
            return redirect()->route('owner.forgot-password')->with('success', 'Nous avons envoyé par e-mail le lien de réinitialisation de votre mot de passe.');
        } else {
            return redirect()->route('owner.forgot-password')->with('fail', 'Quelque chose s\'est mal passé.');
        }
    } //End Method

    public function showResetForm(Request $request, $token = null)
    {
        //Check if token exists
        $get_token = DB::table('password_reset_tokens')
            ->where(['token' => $token, 'guard' => constGuards::OWNER])
            ->first();

        if ($get_token) {
            //Check if this token is not expired
            $diffMins = Carbon::createFromFormat('Y-m-d H:i:s', $get_token->created_at)->diffInMinutes(Carbon::now());

            if ($diffMins > constDefaults::tokenExpiredMinutes) {
                //When token is older that 15 minutes
                return redirect()->route('owner.forgot-password', ['token' => $token])->with('fail', 'Jeton expiré !. Demandez un autre lien de réinitialisation du mot de passe.');
            } else {
                return view('back.pages.owner.auth.reset-password')->with(['token' => $token]);
            }
        } else {
            return redirect()->route('owner.forgot-password', ['token' => $token])->with('fail', 'Jeton invalide !, demandez un autre lien de réinitialisation du mot de passe.');
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
            ->where(['token' => $request->token, 'guard' => constGuards::OWNER])
            ->first();

        //Get owner details
        $owner = Owner::where('email', $token->email)->first();

        //Update owner password
        Owner::where('email', $owner->email)->update([
            'password' => Hash::make($request->new_password)
        ]);

        //Delete token record
        DB::table('password_reset_tokens')->where([
            'email' => $owner->email,
            'token' => $request->token,
            'guard' => constGuards::OWNER
        ])->delete();

        //Send email to notify owner for new password
        $data['owner'] = $owner;
        $data['new_password'] = $request->new_password;

        $mail_body = view('email-templates.owner-reset-email-template', $data);

        $mailConfig = array(
            'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
            'mail_from_name' => env('EMAIL_FROM_NAME'),
            'mail_recipient_email' => $owner->email,
            'mail_recipient_name' => $owner->name,
            'mail_subject' => 'Password Changed',
            'mail_body' => $mail_body
        );

        sendEmail($mailConfig);
        return redirect()->route('owner.login')->with('success', 'Terminé !, Votre mot de passe a été modifié. Utilisez un nouveau mot de passe pour vous connecter au système.');
    } //End Method

    public function profileView(Request $request)
    {
        $data = [
            'pageTitle' => 'Profile'
        ];
        return view('back.pages.owner.profile', $data);
    }

    public function changeProfilePicture(Request $request)
    {
        $owner = Owner::findOrFail(auth('owner')->id());
        $path = 'images/users/owners/';
        $file = $request->file('ownerProfilePictureFile');
        $old_picture = $owner->getAttributes()['picture'];
        $filename = 'OWNER_IMG_' . $owner->id . '.jpg';

        $upload = UtilsKropify::getFile($file, $filename)->maxWoH(325)->save($path);
        $infos = $upload->getInfo();

        if ($upload) {
            if ($old_picture != null && File::exists(public_path($path . $old_picture))) {
                File::delete(public_path($path . $old_picture));
            }
            $owner->update(['picture' => $infos->getName]);

            return response()->json(['status' => 1, 'msg' => 'Votre photo de profil a été mise à jour avec succès.']);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Quelque chose s\'est mal passé.']);
        }
    }
}
