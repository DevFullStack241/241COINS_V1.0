<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Etablishment extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'address',
        'owner_id',
        'category_id',
        'opening_hours',
        'status',
        'phone_whatsapp',
        'phone_service',
        'website',
        'email',
        'services',
        'cover_image',
        'latitude',
        'longitude'
    ];




    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id')->latest();
    }


    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(Etablishment_image::class);
    }
}
