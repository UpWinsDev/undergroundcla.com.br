<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerTimes extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     *@var array
     */
    protected $fillable = [
        'id_player',
        'id_time',
        'funcao',
        'status'
    ];


    public function times_player()
    {
        return $this->belongsTo(Players::class, 'id_player', 'id');
    }

    public function times_time()
    {
        return $this->belongsTo(Times::class, 'id_time', 'id');
    }

    public function player_time()
    {
        return $this->belongsTo(Players::class, 'id_player', 'id');
    }



    
}
