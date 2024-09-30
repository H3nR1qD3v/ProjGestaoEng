<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    // Define a tabela associada ao model
    protected $table = 'cliente';

    // Desabilita timestamps (created_at, updated_at)
    public $timestamps = false;

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'telefone',
        'numero_residencia',
        'rua',
        'bairro',
        'cidade',
        'uf',
        'cep',
        'complemento',
        'data_cadastro'
    ];
}
