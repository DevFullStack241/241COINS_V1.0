<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtablishmentImage extends Model
{
    use HasFactory;

    protected $fillable = ['etablishment_id', 'image_path'];

    /**
     * Relation avec l'établissement
     */
    public function etablishment()
    {
        return $this->belongsTo(Etablishment::class);
    }
}
