<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    // Campos que Laravel permite guardar usando Listing::create().
    protected $fillable = [
        'user_id',
        'photocard_id',
        'price',
        'currency',
        'description',
        'is_sold',
    ];

    // Un anuncio pertenece a una photocard.
    public function photocard()
    {
        return $this->belongsTo(Photocard::class);
    }

    // Un anuncio pertenece a un usuario vendedor.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
