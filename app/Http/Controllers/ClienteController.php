<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    // Exibe uma lista de todos os clientes
    public function index()
    {
        $clientes = Cliente::all();
        return view('listaCliente', compact('clientes'));
    }

    // Criação de Clientes
    public function create()
    {
        return view('cadastroCliente');
    }


    //Armazena novo cliente
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

        //return redirect()->route('listaCliente')->with('sucess', 'Cliente cadastrado com sucesso!');
        return redirect('/');

    }


    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('editaCliente', ['cliente'=> $cliente]);
    }

    //Atualiza um registro
    public function update(Request $request)
    {
        Cliente::findOrFail($request->id)->update($request->all());

            //return redirect()->route('listaCliente')->with('sucess','Cliente atualizado com sucesso!');
            return redirect('/');
    }

    //Exclui um registro
    public function destroy($id)
    {
        Cliente::findOrFail($id)->delete();
        return redirect('/clientes');
    }
}
