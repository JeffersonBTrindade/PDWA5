<?php

namespace App\Virtual\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'comentario',
        'estrelas',
        'music_id'
    ];
}
