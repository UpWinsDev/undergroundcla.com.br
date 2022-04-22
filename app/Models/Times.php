<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Times extends Model
{
    use HasFactory;

    protected $table = 'times';

    /**
     * The attributes that are mass assignable.
     *
     *@var array
     */
    protected $fillable = [
        'nome',
        'descricao',
        'id_game'
        
    ];

    public function time_game()
    {
        return $this->belongsTo(Games::class, 'id_game', 'id');
    }

    public function time_playes()
    {
        //return $this->belongsTo(PlayerTimes::class, 'id', 'id_time');
        return $this->hasMany(PlayerTimes::class, 'id_time', 'id');
    }
}
