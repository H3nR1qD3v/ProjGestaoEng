<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projeto;
use App\Models\Cliente;
use App\Models\SituacaoProjeto;
use App\Models\TipoProjeto;

class ProjetoController extends Controller
{
    // Exibe todos os projetos
    public function index(Request $request)
    {
        $query = Projeto::with(['cliente', 'situacao', 'tipoProjeto']);

        // Aplicar os filtros conforme os campos preenchidos
        if ($request->filled('descricao')) {
            $query->where('descricao_projeto', 'LIKE', '%' . $request->descricao . '%');
        }

        if ($request->filled('cliente')) {
            $query->whereHas('cliente', function ($q) use ($request) {
                $q->where('nome', 'LIKE', '%' . $request->cliente . '%');
            });
        }

        if ($request->filled('situacao')) {
            $query->whereHas('situacao', function ($q) use ($request) {
                $q->where('descricao_situacao', 'LIKE', '%' . $request->situacao . '%');
            });
        }

        if ($request->filled('tipo_projeto')) {
            $query->whereHas('tipoProjeto', function ($q) use ($request) {
                $q->where('descricao_tipo', 'LIKE', '%' . $request->tipo_projeto . '%');
            });
        }

        if ($request->filled('valor')) {
            $query->where('valor', $request->valor);
        }

        if ($request->filled('data_inicial')) {
            $query->whereDate('data_inicial', $request->data_inicial);
        }

        if ($request->filled('data_previsao')) {
            $query->whereDate('data_previsao', $request->data_previsao);
        }

        if ($request->filled('mcmv')) {
            $query->where('mcmv', $request->mcmv);
        }

        if ($request->filled('tamanho')) {
            $query->where('tamanho', 'LIKE', '%' . $request->tamanho . '%');
        }

        // Executar a consulta
        $projetos = $query->get();

        return view('listaProjeto', compact('projetos'));
    }

    // Exibe o formulário para criar um novo projeto
    public function create()
    {
        $clientes = Cliente::all();
        $situacoes = SituacaoProjeto::all();
        $tipos = TipoProjeto::all();

        return view('cadastroProjeto', compact('clientes', 'situacoes', 'tipos'));
    }

    // Armazena um novo projeto
    public function store(Request $request)
    {
        // Garante que 'mcmv' será 0 se não estiver marcado
        $request->merge([
            'mcmv' => $request->has('mcmv') ? 1 : 0,
        ]);
        Projeto::create($request->all());
        return redirect('/projetos')->with('success', 'Projeto cadastrado com sucesso!');
    }

    // Exibe o formulário de edição de um projeto
    public function edit($id)
    {
        $projeto = Projeto::findOrFail($id);
        $clientes = Cliente::all();
        $situacoes = SituacaoProjeto::all();
        $tipos = TipoProjeto::all();
        return view('editaProjeto', compact('projeto', 'clientes', 'situacoes', 'tipos'));
    }

    // Atualiza um projeto existente
    public function update(Request $request, $id)
    {
        Projeto::findOrFail($id)->update($request->all());
        return redirect('/projetos')->with('success', 'Projeto atualizado com sucesso!');
    }

    // Exclui um projeto
    public function destroy($id)
    {
        Projeto::findOrFail($id)->delete();
        return redirect('/projetos')->with('success', 'Projeto excluído com sucesso!');
    }
}
