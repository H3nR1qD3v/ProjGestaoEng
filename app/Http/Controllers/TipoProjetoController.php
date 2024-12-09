<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoProjeto;

class TipoProjetoController extends Controller
{
    // Exibe uma lista de todos os tipos de projeto
    public function index(Request $request)
    {
        $query = TipoProjeto::query();

        // Aplicando filtros, se houver
        if ($request->filled('descricao_tipo')) {
            $query->where('descricao_tipo', 'like', '%' . $request->input('descricao_tipo') . '%');
        }

        $tipos = $query->get();

        return view('listaTipoProjeto', compact('tipos'));
    }

    // Criação de Tipo de Projeto
    public function create()
    {
        return view('cadastroTipoProjeto');
    }

    // Armazena novo tipo de projeto
    public function store(Request $request)
    {
        $tipo = new TipoProjeto();

        $tipo->descricao_tipo = $request->input('descricao_tipo');
        $tipo->save();

        return redirect('/tipos-projeto')->with('success', 'Tipo de projeto cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $tipo = TipoProjeto::findOrFail($id);
        return view('editaTipoProjeto', ['tipo' => $tipo]);
    }

    // Atualiza um registro
    public function update(Request $request)
    {
        TipoProjeto::findOrFail($request->id)->update($request->all());
        return redirect('/tipos-projeto')->with('success', 'Tipo de projeto atualizado com sucesso!');
    }

    // Exclui um registro
    public function destroy($id)
    {
        TipoProjeto::findOrFail($id)->delete();
        return redirect('/tipos-projeto')->with('success', 'Tipo de projeto excluído com sucesso!');
    }
}
