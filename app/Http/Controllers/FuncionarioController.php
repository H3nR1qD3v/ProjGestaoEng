<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{
    // Exibe uma lista de todos os funcionários
    public function index(Request $request)
    {
        $query = Funcionario::query();
    
        // Aplicando filtro por nome, cargo e perfil de acesso
        if ($request->has('nome') && $request->input('nome') != '') {
            $query->where('nome', 'like', '%' . $request->input('nome') . '%');
        }
    
        if ($request->has('cargo') && $request->input('cargo') != '') {
            $query->where('cargo', 'like', '%' . $request->input('cargo') . '%');
        }
    
        if ($request->has('perfil_acesso') && $request->input('perfil_acesso') != '') {
            $query->where('perfil_acesso', $request->input('perfil_acesso'));
        }
    
        // Recupera os funcionários filtrados
        $funcionarios = $query->get();
    
        return view('listaFuncionario', compact('funcionarios'));
    }

    // Exibe o formulário de criação de funcionários
    public function create()
    {
        return view('cadastroFuncionario');
    }

    // Armazena um novo funcionário
    public function store(Request $request)
    {
        $funcionario = new Funcionario();

        $funcionario->nome = $request->input('nome');
        $funcionario->cargo = $request->input('cargo');
        $funcionario->email = $request->input('email');
        $funcionario->password = bcrypt($request->input('password'));
        $funcionario->perfil_acesso = $request->input('perfil_acesso');

        $funcionario->save();

        return redirect('/funcionarios');
    }

    // Exibe o formulário de edição de um funcionário específico
    public function edit($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return view('editaFuncionario', compact('funcionario'));
    }

    // Atualiza um funcionário específico
    public function update(Request $request, $id)
    {
        $funcionario = Funcionario::findOrFail($id);

        $funcionario->nome = $request->input('nome');
        $funcionario->cargo = $request->input('cargo');
        $funcionario->email = $request->input('email');
        if ($request->input('password')) {
            $funcionario->password = bcrypt($request->input('password'));
        }
        $funcionario->perfil_acesso = $request->input('perfil_acesso');

        $funcionario->save();

        return redirect('/funcionarios');
    }

    // Exclui um funcionário específico
    public function destroy($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->delete();
        
        return redirect('/funcionarios');
    }
}
