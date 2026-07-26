<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    public function photocard (){
        return $this->belongsTo(Photocard::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
