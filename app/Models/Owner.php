<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Owner extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = "owner";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'date_naissance',
        'address',
        'profession',
        'phone',
        'picture',
        'email_verified_at',
        'verified',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getPictureAttribute($value)
    {
        if ($value) {
            return asset('/images/users/owners/' . $value);
        } else {
            return asset('/images/users/default-avatar.png');
        }
    }

    public function establishments()
    {
        return $this->hasMany(Etablishment::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'owner_id');
    }
}
