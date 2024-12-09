<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    // Exibe uma lista de todos os clientes
    public function index(Request $request)
    {
        $clientes = Cliente::query();

        if ($request->filled('nome')) {
            $clientes->where('nome', 'like', '%' . $request->nome . '%');
        }

        if ($request->filled('cpf')) {
            $clientes->where('cpf', 'like', '%' . $request->cpf . '%');
        }

        if ($request->filled('telefone')) {
            $clientes->where('telefone', 'like', '%' . $request->telefone . '%');
        }

        if ($request->filled('data_nascimento')) {
            $clientes->whereDate('data_nascimento', '=', $request->data_nascimento);
        }

        if ($request->filled('data_cadastro')) {
            $clientes->whereDate('data_cadastro', '=', $request->data_cadastro);
        }

        $clientes = $clientes->get();

        return view('listaCliente', compact('clientes'));
    }

    // Criação de Clientes
    public function create()
    {
        return view('cadastroCliente');
    }

    // Armazena novo cliente
    public function store(Request $request)
    {
        $cliente = new Cliente();

        $cliente->nome = $request->input('nome');
        $cliente->cpf = $request->input('cpf');
        $cliente->data_nascimento = $request->input('data_nascimento');
        $cliente->telefone = $request->input('telefone');
        $cliente->numero_residencia = $request->input('numero_residencia');
        $cliente->rua = $request->input('rua');
        $cliente->bairro = $request->input('bairro');
        $cliente->cidade = $request->input('cidade');
        $cliente->uf = $request->input('uf');
        $cliente->cep = $request->input('cep');
        $cliente->complemento = $request->input('complemento');
        $cliente->data_cadastro = $request->input('data_cadastro');

        $cliente->save();

        // Adiciona uma flash message
        return redirect('/clientes')->with('success', 'Cliente cadastrado com sucesso!');
    }

    // Edita cliente existente
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('editaCliente', ['cliente' => $cliente]);
    }

    // Atualiza um registro
    public function update(Request $request)
    {
        Cliente::findOrFail($request->id)->update($request->all());

        // Adiciona uma flash message
        return redirect('/clientes')->with('success', 'Cliente atualizado com sucesso!');
    }

    // Exclui um registro
    public function destroy($id)
    {
        Cliente::findOrFail($id)->delete();

        // Adiciona uma flash message
        return redirect('/clientes')->with('success', 'Cliente excluído com sucesso!');
    }
}
