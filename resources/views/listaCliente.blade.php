@extends('layout') <!-- Referência ao layout -->

@section('title', 'Lista de Clientes') <!-- Título da página -->

@section('content') <!-- Conteúdo da página -->
    <h1>Lista de Clientes</h1>

    <div class="mt-4">
        <a href="/clientes/create" class="btn btn-primary">Cadastrar Novo Cliente</a> <!-- Botão para cadastrar cliente -->
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Data Nascimento</th>
                    <th>Telefone</th>
                    <th>Nº Residência</th>
                    <th>Rua</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>UF</th>
                    <th>CEP</th>
                    <th>Complemento</th>
                    <th>Data Cadastro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->cpf }}</td>
                        <td>{{ \Carbon\Carbon::parse($cliente->data_nascimento)->format('d/m/Y') }}</td>
                        <td>{{ $cliente->telefone }}</td>
                        <td>{{ $cliente->numero_residencia }}</td>
                        <td>{{ $cliente->rua }}</td>
                        <td>{{ $cliente->bairro }}</td>
                        <td>{{ $cliente->cidade }}</td>
                        <td>{{ $cliente->uf }}</td>
                        <td>{{ $cliente->cep }}</td>
                        <td>{{ $cliente->complemento }}</td>
                        <td>{{ \Carbon\Carbon::parse($cliente->data_cadastro)->format('d/m/Y') }}</td>
                        <td>
                            <!-- Ações, como editar ou excluir -->
                            <a href="/clientes/edit/{{$cliente->id}}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="/clientes/{{ $cliente->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
