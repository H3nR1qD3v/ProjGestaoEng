@extends('layout')

@section('title', 'EngFlow - Edição Cliente')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Editar Cliente</h1>

        <form action="/clientes/update/{{ $cliente->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" required value="{{ $cliente->nome }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" maxlength="11" required value="{{ $cliente->cpf }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="data_nascimento">Data de Nascimento</label>
                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required value="{{ $cliente->data_nascimento }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" maxlength="11" required value="{{ $cliente->telefone }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="numero_residencia">Número da Residência</label>
                        <input type="number" class="form-control" id="numero_residencia" name="numero_residencia" required value="{{ $cliente->numero_residencia }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="rua">Rua</label>
                        <input type="text" class="form-control" id="rua" name="rua" required value="{{ $cliente->rua }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="bairro">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" required value="{{ $cliente->bairro }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" required value="{{ $cliente->cidade }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="uf">UF</label>
                        <input type="text" class="form-control" id="uf" name="uf" required maxlength="2" value="{{ $cliente->uf }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cep">CEP</label>
                        <input type="text" class="form-control" id="cep" name="cep" maxlength="8" required value="{{ $cliente->cep }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="complemento">Complemento</label>
                        <input type="text" class="form-control" id="complemento" name="complemento" value="{{ $cliente->complemento }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="data_cadastro">Data de Cadastro</label>
                        <input type="date" class="form-control" id="data_cadastro" name="data_cadastro" required value="{{ $cliente->data_cadastro }}">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="/clientes" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success">Atualizar</button>
            </div>
        </form>
    </div>
@endsection
