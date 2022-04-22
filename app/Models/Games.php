<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    use HasFactory;

    protected $table = 'games';

    /**
     * The attributes that are mass assignable.
     *
     *@var array
     */
    protected $fillable = [
        'nome',
        'descricao',
        'ativo',
        'imagem'
    ];

    public function games_time()
    {
        return $this->hasMany(Times::class, 'id_game', 'id');
    }
}
