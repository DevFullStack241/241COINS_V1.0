<?php

namespace App\Livewire\Owner;

use Livewire\Component;
use App\Models\Owner;
use Illuminate\Support\Facades\Hash;

class OwnerProfile extends Component
{
    public $tab = null;
    public $tabname = 'personal_details';
    public $name, $email, $username, $phone, $date_naissance, $profession, $address;
    public $current_password, $new_password, $new_password_confirmation;

    protected $queryString = ['tab' => ['keep' => true]];

    protected $listeners = [
        'updateOwnerProfilePage' => '$refresh'
    ];
    public function selectTab($tab)
    {
        $this->tab = $tab;
    }

    public function mount()
    {
        $this->tab = request()->tab ? request()->tab : $this->tabname;

        //POPULATE
        $owner = Owner::findOrFail(auth('owner')->id());
        $this->name = $owner->name;
        $this->username = $owner->username;
        $this->email = $owner->email;
        $this->date_naissance = $owner->date_naissance;
        $this->phone = $owner->phone;
        $this->address = $owner->address;
        $this->profession = $owner->profession;
    }

    public function updateOwnerPersonalDetails()
    {
        //Validate the form
        $this->validate([
            'name' => 'required|min:5',
            'username' => 'nullable|min:5|unique:owners,username,' . auth('owner')->id(),
        ]);
        $owner = Owner::findOrFail(auth('owner')->id());
        $owner->name = $this->name;
        $owner->username = $this->username;
        $owner->address = $this->address;
        $owner->phone = $this->phone;
        $owner->profession = $this->profession;
        $owner->date_naissance = $this->date_naissance;
        $update = $owner->save();

        if ($update) {
            $this->dispatch('updateAdminOwnerHeaderInfo');
            $this->showToastr('success', 'Personal Details have been successfully updated.');
        } else {
            $this->showToastr('error', 'Something went wrong.');
        }
    }

    public function updatePassword()
    {
        $owner = Owner::findOrFail(auth('owner')->id());

        //Validate the form
        $this->validate([
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) use ($owner) {
                    if (!Hash::check($value, $owner->password)) {
                        return $fail(__('The current password is incorrect.'));
                    }
                }
            ],
            'new_password' => 'required|min:5|max:45|confirmed'
        ]);

        //Update password
        $update = $owner->update([
            'password' => Hash::make($this->new_password)
        ]);

        if ($update) {
            //Send email notification to owner that contains new password
            $data['owner'] = $owner;
            $data['new_password'] = $this->new_password;

            $mail_body = view('email-templates.owner-reset-email-template', $data);

            $mailConfig = array(
                'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
                'mail_from_name' => env('EMAIL_FROM_NAME'),
                'mail_recipient_email' => $owner->email,
                'mail_recipient_name' => $owner->name,
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
        return view('livewire.owner.owner-profile', [
            'owner' => Owner::findOrFail(auth('owner')->id())
        ]);
    }
}