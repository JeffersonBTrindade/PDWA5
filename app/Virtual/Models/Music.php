<?php

namespace App\Virtual\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    protected $table = 'musics';

    protected $fillable = [
        'nome',
        'artista',
        'descricao',
        'category_id'
    ];
}
