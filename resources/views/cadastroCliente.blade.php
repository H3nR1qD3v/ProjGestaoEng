@extends('layout')

@section('title', 'EngFlow - Cadastro Cliente')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Cadastrar Cliente</h1>

        <form action="/clientes/store" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" maxlength="11" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="data_nascimento">Data de Nascimento</label>
                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" maxlength="11" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="numero_residencia">Número da Residência</label>
                        <input type="number" class="form-control" id="numero_residencia" name="numero_residencia" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="rua">Rua</label>
                        <input type="text" class="form-control" id="rua" name="rua" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="bairro">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="uf">UF</label>
                        <input type="text" class="form-control" id="uf" name="uf" required maxlength="2">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cep">CEP</label>
                        <input type="text" class="form-control" id="cep" name="cep" maxlength="8" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="complemento">Complemento</label>
                        <input type="text" class="form-control" id="complemento" name="complemento">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="data_cadastro">Data de Cadastro</label>
                        <input type="date" class="form-control" id="data_cadastro" name="data_cadastro" required>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="/clientes" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection
