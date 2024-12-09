<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\MovimentacaoFinanceiraController;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\SituacaoController;
use App\Http\Controllers\TipoProjetoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/teste', function () {
    return view('teste');  // Retorna a view "teste.blade.php"
});

// Rotas acessíveis apenas após autenticação
Route::middleware(['auth'])->group(function () {
    // ROTAS CLIENTE
    Route::get('/clientes/create', [ClienteController::class, 'create']);
    Route::post('/clientes/store', [ClienteController::class, 'store']);
    Route::get('/clientes', [ClienteController::class, 'index']);
    Route::delete('/clientes/{id}', [ClienteController::class, 'destroy']);
    Route::get('/clientes/edit/{id}', [ClienteController::class, 'edit']);
    Route::put('/clientes/update/{id}', [ClienteController::class, 'update']);

    // ROTAS FUNCIONARIO
    Route::get('/funcionarios/create', [FuncionarioController::class, 'create']);
    Route::post('/funcionarios/store', [FuncionarioController::class, 'store']);
    Route::get('/funcionarios', [FuncionarioController::class, 'index']);
    Route::delete('/funcionarios/{id}', [FuncionarioController::class, 'destroy']);
    Route::get('/funcionarios/edit/{id}', [FuncionarioController::class, 'edit']);
    Route::put('/funcionarios/update/{id}', [FuncionarioController::class, 'update']);

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

    // ROTAS SITUACAO PROJETO
    Route::get('/situacoes/create', [SituacaoController::class, 'create']);
    Route::post('/situacoes/store', [SituacaoController::class, 'store']);
    Route::get('/situacoes', [SituacaoController::class, 'index']);
    Route::delete('/situacoes/{id}', [SituacaoController::class, 'destroy']);
    Route::get('/situacoes/edit/{id}', [SituacaoController::class, 'edit']);
    Route::put('/situacoes/update/{id}', [SituacaoController::class, 'update']);

    // ROTAS TIPO PROJETO
    Route::get('/tipos-projeto', [TipoProjetoController::class, 'index']);
    Route::get('/tipos-projeto/create', [TipoProjetoController::class, 'create']);
    Route::post('/tipos-projeto/store', [TipoProjetoController::class, 'store']);
    Route::get('/tipos-projeto/edit/{id}', [TipoProjetoController::class, 'edit']);
    Route::put('/tipos-projeto/update/{id}', [TipoProjetoController::class, 'update']);
    Route::delete('/tipos-projeto/{id}', [TipoProjetoController::class, 'destroy']);

    // ROTAS PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // DASHBOARD
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/'); // Redireciona para a página inicial após o logout
    })->name('logout');

    Route::get('/', [HomeController::class, 'index']);

    //FILTROS

    Route::get('/projetos', [ProjetoController::class, 'index'])->name('projetos.index');
    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/funcionarios', [FuncionarioController::class, 'index'])->name('funcionarios.index');
    Route::get('/movimentacoes', [MovimentacaoFinanceiraController::class, 'index'])->name('movimentacoes.index');
    Route::get('/situacoes', [SituacaoController::class, 'index'])->name('situacoes.index');
    Route::get('/tipos-projeto', [TipoProjetoController::class, 'index'])->name('tipos-projeto.index');
});

// Rotas de autenticação geradas pelo Breeze
require __DIR__ . '/auth.php';
