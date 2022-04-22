<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneios extends Model
{
    use HasFactory;

    protected $table = 'torneios';

    /**
     * The attributes that are mass assignable.
     *
     *@var array
     */
    protected $fillable = [
        'titulo',
        'qtd_players',
        'premicacao',
        'id_game',
        'duracao_media',
        'valor_inscricao',
        'data_evento',
        'descricao',
        'imagem'
    ];

    public function torneio_game()
    {
        //dd(($this->belongsTo(Games::class, 'id_game', 'id')));
        return $this->belongsTo(Games::class, 'id_game', 'id');
    }
}
