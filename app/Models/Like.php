<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'etablishment_id', 'type'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function etablishment()
    {
        return $this->belongsTo(Etablishment::class);
    }
}
