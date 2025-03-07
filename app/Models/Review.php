<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Review extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'establishment_id',
        'client_id',
        'comment',
        'rating',
    ];
    


    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function establishment()
    {
        return $this->belongsTo(Etablishment::class);
    }
}