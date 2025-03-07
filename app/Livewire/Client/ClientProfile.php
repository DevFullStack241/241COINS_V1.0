<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;

class ClientProfile extends Component
{
    public $tab = null;
    public $tabname = 'personal_details';
    public $name, $email, $username, $phone, $date_naissance, $profession, $address;
    public $current_password, $new_password, $new_password_confirmation;

    protected $queryString = ['tab' => ['keep' => true]];

    protected $listeners = [
        'updateClientProfilePage' => '$refresh'
    ];
    public function selectTab($tab)
    {
        $this->tab = $tab;
    }

    public function mount()
    {
        $this->tab = request()->tab ? request()->tab : $this->tabname;

        //POPULATE
        $client = Client::findOrFail(auth('client')->id());
        $this->name = $client->name;
        $this->username = $client->username;
        $this->email = $client->email;
        $this->date_naissance = $client->date_naissance;
        $this->phone = $client->phone;
        $this->address = $client->address;
        $this->profession = $client->profession;
    }

    public function updateClientPersonalDetails()
    {
        //Validate the form
        $this->validate([
            'name' => 'required|min:5',
            'username' => 'nullable|min:5|unique:clients,username,' . auth('client')->id(),
        ]);
        $client = Client::findOrFail(auth('client')->id());
        $client->name = $this->name;
        $client->username = $this->username;
        $client->address = $this->address;
        $client->phone = $this->phone;
        $client->profession = $this->profession;
        $client->date_naissance = $this->date_naissance;
        $update = $client->save();

        if ($update) {
            $this->dispatch('updateAdminClientHeaderInfo');
            $this->showToastr('success', 'Personal Details have been successfully updated.');
        } else {
            $this->showToastr('error', 'Something went wrong.');
        }
    }

    public function updatePassword()
    {
        $client = Client::findOrFail(auth('client')->id());

        //Validate the form
        $this->validate([
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) use ($client) {
                    if (!Hash::check($value, $client->password)) {
                        return $fail(__('The current password is incorrect.'));
                    }
                }
            ],
            'new_password' => 'required|min:5|max:45|confirmed'
        ]);

        //Update password
        $update = $client->update([
            'password' => Hash::make($this->new_password)
        ]);

        if ($update) {
            //Send email notification to client that contains new password
            $data['client'] = $client;
            $data['new_password'] = $this->new_password;

            $mail_body = view('email-templates.client-reset-email-template', $data);

            $mailConfig = array(
                'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
                'mail_from_name' => env('EMAIL_FROM_NAME'),
                'mail_recipient_email' => $client->email,
                'mail_recipient_name' => $client->name,
                'mail_subject' => 'Password changed',
                'mail_body' => $mail_body
            );

            sendEmail($mailConfig);
            $this->current_password = null;
            $this->new_password = null;
            $this->new_password_confirmation = null;
            $this->showToastr('success', 'Password successfully updated.');
        } else {
            $this->showToastr('error', 'Something went wrong.');
        }
    }

    public function showToastr($type, $message)
    {
        return $this->dispatch('showToastr', [
            'type' => $type,
            'message' => $message
        ]);
    }

    public function render()
    {
        return view('livewire.client.client-profile', [
            'client' => Client::findOrFail(auth('client')->id())
        ]);
    }
}