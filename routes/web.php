<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

Route::get('/', function () {
    return view('index');
});

Route::get('/teste', [ClienteController::class, 'index']); // Usando o método index do controller
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create'); // Rota para exibir o formulário de cadastro

Route::get('/login', function() {
    return view('login');
});

Route::resource('clientes', ClienteController::class);