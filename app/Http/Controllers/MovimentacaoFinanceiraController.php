<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovimentacaoFinanceira;

class MovimentacaoFinanceiraController extends Controller
{
    // Exibe todas as movimentações
    public function index(Request $request)
    {
        $query = MovimentacaoFinanceira::query();

        // Filtra por tipo
        if ($request->has('tipo') && $request->tipo != '') {
            $query->where('tipo', $request->tipo);
        }

        // Filtra por valor
        if ($request->has('valor') && $request->valor != '') {
            $query->where('valor', 'like', '%' . $request->valor . '%');
        }

        // Filtra por descrição
        if ($request->has('descricao') && $request->descricao != '') {
            $query->where('descricao', 'like', '%' . $request->descricao . '%');
        }

        // Filtra por data
        if ($request->has('data') && $request->data != '') {
            $query->whereDate('data', $request->data);
        }

        // Executa a consulta
        $movimentacoes = $query->get();

        // Retorna a view com os dados filtrados
        return view('listaMovimentacao', compact('movimentacoes'));
    }


    // Exibe o formulário para criar uma nova movimentação
    public function create()
    {
        return view('cadastroMovimentacao');
    }

    // Armazena uma nova movimentação
    public function store(Request $request)
    {
        MovimentacaoFinanceira::create($request->all());
        return redirect('/movimentacoes')->with('success', 'Movimentação cadastrada com sucesso!');
    }

    // Exibe o formulário de edição de uma movimentação
    public function edit($id)
    {
        $movimentacao = MovimentacaoFinanceira::findOrFail($id);
        return view('editaMovimentacao', compact('movimentacao'));
    }

    // Atualiza uma movimentação existente
    public function update(Request $request, $id)
    {
        MovimentacaoFinanceira::findOrFail($id)->update($request->all());
        return redirect('/movimentacoes')->with('success', 'Movimentação atualizada com sucesso!');
    }

    // Exclui uma movimentação
    public function destroy($id)
    {
        MovimentacaoFinanceira::findOrFail($id)->delete();
        return redirect('/movimentacoes')->with('success', 'Movimentação excluída com sucesso!');
    }
}
