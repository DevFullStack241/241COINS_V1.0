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
            $adminId = Auth::guard('admin')->id(); // Récupère l'ID de l'admin authentifié
            if ($adminId) {
                $this->admin = Admin::find($adminId); // Charge les infos de l'admin
            } else {
                dd("L'utilisateur n'est pas authentifié sous le garde 'admin'");
            }
        }

        if (Auth::guard('owner')->check()) {
            $ownerId = Auth::guard('owner')->id(); // Récupère l'ID du propriétaire authentifié
            if ($ownerId) {
                $this->owner = Owner::find($ownerId); // Charge les infos du propriétaire
            } else {
                dd("L'utilisateur n'est pas authentifié sous le garde 'owner'");
            }
        }


        if (Auth::guard('client')->check()) {
            $clientId = Auth::guard('client')->id(); // Récupère l'ID depuis le garde client

            if ($clientId) {
                $this->client = Client::find($clientId);
            } else {
                dd("L'utilisateur n'est pas authentifié sous le garde 'client'");
            }
        }
    }
    public function render()
    {
        return view('livewire.admin-owner-client-header-profile-info');
    }
}
