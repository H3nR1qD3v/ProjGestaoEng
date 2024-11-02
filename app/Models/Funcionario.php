<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Funcionario extends Authenticatable
{
    use HasFactory;

    protected $table = 'funcionario';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'cargo',
        'email',
        'password',
        'perfil_acesso'
    ];

    // Esconde campos sensíveis 
    protected $hidden = [
        'password'
    ];

    // Definir o tipo de dados dos campos
    protected $casts = [
        'perfil_acesso' => 'string',
    ];
}

