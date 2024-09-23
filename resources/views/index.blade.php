@extends('layout') <!-- Referência ao layout -->

@section('title', 'Página Inicial') <!-- Título da página -->

@section('content') <!-- Conteúdo da página -->
    <h1>Bem-vindo ao EngFlow!</h1>

    <div class="mt-4">
        <h2>Projetos Recentes</h2>
        <ul class="list-group">
            <li class="list-group-item">Projeto 1</li>
            <li class="list-group-item">Projeto 2</li>
            <li class="list-group-item">Projeto 3</li>
        </ul>
    </div>
@endsection
