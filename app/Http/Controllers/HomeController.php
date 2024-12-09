<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Quantidade de projetos por Tipo de Projeto
        $projetosPorTipo = Projeto::selectRaw('id_tipo, COUNT(*) as total')
            ->groupBy('id_tipo')
            ->with('tipoProjeto') // Relacionamento com TipoProjeto
            ->get()
            ->map(function ($projeto) {
                return [
                    'tipo' => $projeto->tipoProjeto->descricao_tipo ?? 'Outro', // Nome do Tipo de Projeto
                    'total' => $projeto->total, // Quantidade de projetos desse tipo
                ];
            });

        // Quantidade de projetos por Situação
        $projetosPorSituacao = Projeto::selectRaw('id_situacao, COUNT(*) as total')
            ->groupBy('id_situacao')
            ->with('situacao') // Relacionamento com SituacaoProjeto
            ->get()
            ->map(function ($projeto) {
                return [
                    'situacao' => $projeto->situacao->descricao_situacao ?? 'Desconhecida', // Nome da Situação
                    'total' => $projeto->total, // Quantidade de projetos dessa situação
                ];
            });

        // Passa os dados à view
        return view('index', [
            'projetosPorTipo' => $projetosPorTipo,
            'projetosPorSituacao' => $projetosPorSituacao,
        ]);
    }
}
