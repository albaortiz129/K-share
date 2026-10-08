<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photocard extends Model
{
    // Campos que Laravel permite guardar usando Photocard::create().
    // Estos nombres deben coincidir con las columnas de la tabla photocards.
    protected $fillable = [
        'group_name',
        'idol_name',
        'rarity',
        'album_era',
        'image_url',
    ];
}
