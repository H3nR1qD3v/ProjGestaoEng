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
    public function index()
    {
        $projetos = Projeto::with(['cliente', 'situacao', 'tipoProjeto'])->get();
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
