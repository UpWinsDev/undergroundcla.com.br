<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContribuicaoEqps extends Model
{
    use HasFactory;

    protected $table = 'contribuicao_eqps';

    /**
     * The attributes that are mass assignable.
     *
     *@var array
     */
    protected $fillable = [
        'id_user', 
        'titulo', 
        'email', 
        'descricao',
        'imagem',
        'status'
    ];

    public function contribuir_user()
    {
        //return $this->hasMany(User::class,'id', 'id_user');
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
