<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentacaoFinanceira extends Model
{
    use HasFactory;

    protected $table = 'movimentacoes_financeiras';

    public $timestamps = false;


    protected $fillable = [
        'tipo',
        'valor',
        'descricao',
        'data'
    ];
}
