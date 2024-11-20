<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Funcionario extends Authenticatable
{
    use Notifiable;

    protected $table = 'funcionario';

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',         // Ajuste os campos conforme sua tabela
        'email',
        'password',
        'cargo',
        'perfil_acesso',
    ];

    /**
     * Os atributos que devem ser ocultados na serialização.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Os atributos que devem ser convertidos em tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
