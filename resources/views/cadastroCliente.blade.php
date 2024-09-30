@extends('layout') <!-- Referência ao layout -->

@section('title', 'Cadastro de Cliente') <!-- Título da página -->

@section('content') <!-- Conteúdo da página -->
    <h1>Cadastrar Novo Cliente</h1>

    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>

        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" required>
        </div>

        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" required>
        </div>

        <div class="form-group">
            <label for="numero_residencia">Número da Residência</label>
            <input type="number" class="form-control" id="numero_residencia" name="numero_residencia" required>
        </div>

        <div class="form-group">
            <label for="rua">Rua</label>
            <input type="text" class="form-control" id="rua" name="rua" required>
        </div>

        <div class="form-group">
            <label for="bairro">Bairro</label>
            <input type="text" class="form-control" id="bairro" name="bairro" required>
        </div>

        <div class="form-group">
            <label for="cidade">Cidade</label>
            <input type="text" class="form-control" id="cidade" name="cidade" required>
        </div>

        <div class="form-group">
            <label for="uf">UF</label>
            <input type="text" class="form-control" id="uf" name="uf" required maxlength="2">
        </div>

        <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" id="cep" name="cep" required>
        </div>

        <div class="form-group">
            <label for="complemento">Complemento</label>
            <input type="text" class="form-control" id="complemento" name="complemento">
        </div>

        <div class="form-group">
            <label for="data_cadastro">Data de Cadastro</label>
            <input type="date" class="form-control" id="data_cadastro" name="data_cadastro" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Cadastrar</button>
    </form>
@endsection
