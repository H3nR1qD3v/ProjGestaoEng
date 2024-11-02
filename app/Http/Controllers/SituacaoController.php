<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SituacaoProjeto;

class SituacaoController extends Controller
{
    // Exibe uma lista de todas as situações
    public function index()
    {
        $situacoes = SituacaoProjeto::all();
        return view('listaSituacao', compact('situacoes'));
    }

    // Criação de Situações
    public function create()
    {
        return view('cadastroSituacao');
    }

    // Armazena nova situação
    public function store(Request $request)
    {
        $situacao = new SituacaoProjeto();
        $situacao->descricao_situacao = $request->input('descricao_situacao');
        $situacao->save();

        return redirect('/situacoes')->with('success', 'Situação cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $situacao = SituacaoProjeto::findOrFail($id);
        return view('editaSituacao', ['situacao' => $situacao]);
    }

    // Atualiza um registro
    public function update(Request $request, $id)
    {
        SituacaoProjeto::findOrFail($id)->update($request->all());
        return redirect('/situacoes')->with('success', 'Situação atualizada com sucesso!');
    }

    // Exclui um registro
    public function destroy($id)
    {
        SituacaoProjeto::findOrFail($id)->delete();
        return redirect('/situacoes')->with('success', 'Situação excluída com sucesso!');
    }
}
