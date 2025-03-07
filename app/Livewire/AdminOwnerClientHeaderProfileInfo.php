<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Admin;
use App\Models\Owner;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class AdminOwnerClientHeaderProfileInfo extends Component
{

    public $admin;
    public $owner;
    public $client;

    public $listeners = [
        'updateAdminOwnerClientHeaderInfo' => '$refresh'
    ];

    public function mount()
    {
        if (Auth::guard('admin')->check()) {
            $this->admin = Admin::findOrFail(auth()->id());
        }
        if (Auth::guard('owner')->check()) {
            $this->owner = Owner::findOrFail(auth()->id());
        }
        if (Auth::guard('client')->check()) {
            $this->client = Client::findOrFail(auth()->id());
        }
    }
    public function render()
    {
        return view('livewire.admin-owner-client-header-profile-info');
    }
}
