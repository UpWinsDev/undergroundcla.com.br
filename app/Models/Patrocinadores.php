<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patrocinadores extends Model
{
    use HasFactory;

    protected $table = 'patrocinadores';

    /**
     * The attributes that are mass assignable.
     *
     *@var array
     */
    protected $fillable = [
        'nome',
        'descricao',
        'imagem'
    ];
}
