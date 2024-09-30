<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;

    protected $table = 'projeto';

    public $timestamps = false;

    protected $fillable = [
        'descricao_projeto',
        'mcmv',
        'tamanho',
        'data_inicial',
        'data_previsao',
        'valor',
        'id_cliente',
        'id_situacao',
        'id_tipo'
    ];

    // Relacionamento com Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    // Relacionamento com Situacao
    public function situacao()
    {
        return $this->belongsTo(SituacaoProjeto::class, 'id_situacao');
    }

    // Relacionamento com TipoProjeto
    public function tipoProjeto()
    {
        return $this->belongsTo(TipoProjeto::class, 'id_tipo');
    }
}
