<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SituacaoProjeto extends Model
{
    use HasFactory;

    protected $table = 'situacao';

    public $timestamps = false;

    protected $fillable = [
        'descricao_situacao'
    ];
}
