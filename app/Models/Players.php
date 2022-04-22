<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    use HasFactory;

    protected $table = 'players';

    /**
     * The attributes that are mass assignable.
     *
     *@var array
     */
    protected $fillable = [
        'id_user',
        'nome',
        'email',
        'descricao',
        'nasc',
        'id_classe',
        'recrutado',
        'ativo',
        'arquivo',
        'patrocinar_streamer'
    ];

    /* ALTER TABLE players
ADD email VARCHAR(255) NOT NULL ; */


    public function player_classes()
    {
        return $this->belongsTo(Classes::class, 'id_classe', 'id');
    }

    public function player_users()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
