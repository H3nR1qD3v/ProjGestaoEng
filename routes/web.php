<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\MovimentacaoFinanceiraController;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\SituacaoController;
use App\Http\Controllers\TipoProjetoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

Route::get('/', function () {
    return view('index');
});

Route::get('/teste', [ClienteController::class, 'index']); // Usando o método index do controller

// ROTAS CLIENTE
Route::get('/clientes/create', [ClienteController::class, 'create']); // Rota para exibir o formulário de cadastro
Route::post('/clientes/store', [ClienteController::class, 'store']); // Executa a função de salvar os clientes no BD
Route::get('/clientes', [ClienteController::class, 'index']); // lista todos os clientes
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy']); // exclui cliente
Route::get('/clientes/edit/{id}', [ClienteController::class, 'edit']); //exibe tela de edição
Route::put('/clientes/update/{id}', [ClienteController::class, 'update']); // executa o update no bd


// ROTAS FUNCIONARIO
Route::get('/funcionarios/create', [FuncionarioController::class, 'create']); // Rota para exibir o formulário de cadastro
Route::post('/funcionarios/store', [FuncionarioController::class, 'store']); // Salvar funcionário no BD
Route::get('/funcionarios', [FuncionarioController::class, 'index']); // Listar todos os funcionários
Route::delete('/funcionarios/{id}', [FuncionarioController::class, 'destroy']); // Excluir funcionário
Route::get('/funcionarios/edit/{id}', [FuncionarioController::class, 'edit']); // Exibir tela de edição
Route::put('/funcionarios/update/{id}', [FuncionarioController::class, 'update']); // Atualizar funcionário


// ROTAS MOV. FINANC.
Route::get('/movimentacoes', [MovimentacaoFinanceiraController::class, 'index']);
Route::get('/movimentacoes/create', [MovimentacaoFinanceiraController::class, 'create']);
Route::post('/movimentacoes', [MovimentacaoFinanceiraController::class, 'store']);
Route::get('/movimentacoes/edit/{id}', [MovimentacaoFinanceiraController::class, 'edit']);
Route::put('/movimentacoes/update/{id}', [MovimentacaoFinanceiraController::class, 'update']);
Route::delete('/movimentacoes/{id}', [MovimentacaoFinanceiraController::class, 'destroy']);

// ROTAS PROJETO
Route::get('/projetos', [ProjetoController::class, 'index']);
Route::get('/projetos/create', [ProjetoController::class, 'create']);
Route::post('/projetos', [ProjetoController::class, 'store']);
Route::get('/projetos/edit/{id}', [ProjetoController::class, 'edit']);
Route::put('/projetos/update/{id}', [ProjetoController::class, 'update']);
Route::delete('/projetos/{id}', [ProjetoController::class, 'destroy']);


//ROTAS SITUACAO PROJETO

Route::get('/situacoes/create', [SituacaoController::class, 'create']); // Rota para exibir o formulário de cadastro
Route::post('/situacoes/store', [SituacaoController::class, 'store']); // Executa a função de salvar as situações no BD
Route::get('/situacoes', [SituacaoController::class, 'index']); // lista todas as situações
Route::delete('/situacoes/{id}', [SituacaoController::class, 'destroy']); // exclui situação
Route::get('/situacoes/edit/{id}', [SituacaoController::class, 'edit']); //exibe tela de edição
Route::put('/situacoes/update/{id}', [SituacaoController::class, 'update']); // executa o update no bd

// ROTAS TIPO PROJETO
Route::get('/tipos-projeto', [TipoProjetoController::class, 'index']);
Route::get('/tipos-projeto/create', [TipoProjetoController::class, 'create']);
Route::post('/tipos-projeto/store', [TipoProjetoController::class, 'store']);
Route::get('/tipos-projeto/edit/{id}', [TipoProjetoController::class, 'edit']);
Route::put('/tipos-projeto/update/{id}', [TipoProjetoController::class, 'update']);
Route::delete('/tipos-projeto/{id}', [TipoProjetoController::class, 'destroy']);


Route::get('/login', function() {
    return view('login');
});

