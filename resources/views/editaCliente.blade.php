@extends('layout') <!-- Referência ao layout -->

@section('title', 'Edita Cliente') <!-- Título da página -->

@section('content') <!-- Conteúdo da página -->
    <h1>Editar Cliente</h1>

    <form action="/clientes/update/{{$cliente->id}}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required value="{{$cliente->nome}}">
        </div>

        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" required value="{{$cliente->cpf}}">
        </div>

        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required value="{{$cliente->data_nascimento}}">
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" required value="{{$cliente->telefone}}">
        </div>

        <div class="form-group">
            <label for="numero_residencia">Número da Residência</label>
            <input type="number" class="form-control" id="numero_residencia" name="numero_residencia" required value="{{$cliente->numero_residencia}}">
        </div>

        <div class="form-group">
            <label for="rua">Rua</label>
            <input type="text" class="form-control" id="rua" name="rua" required value="{{$cliente->rua}}">
        </div>

        <div class="form-group">
            <label for="bairro">Bairro</label>
            <input type="text" class="form-control" id="bairro" name="bairro" required value="{{$cliente->bairro}}">
        </div>

        <div class="form-group">
            <label for="cidade">Cidade</label>
            <input type="text" class="form-control" id="cidade" name="cidade" required value="{{$cliente->cidade}}">
        </div>

        <div class="form-group">
            <label for="uf">UF</label>
            <input type="text" class="form-control" id="uf" name="uf" required maxlength="2" value="{{$cliente->uf}}">
        </div>

        <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" id="cep" name="cep" required value="{{$cliente->cep}}">
        </div>

        <div class="form-group">
            <label for="complemento">Complemento</label>
            <input type="text" class="form-control" id="complemento" name="complemento" value="{{$cliente->complemento}}">
        </div>

        <div class="form-group">
            <label for="data_cadastro">Data de Cadastro</label>
            <input type="date" class="form-control" id="data_cadastro" name="data_cadastro" required value="{{$cliente->data_cadastro}}">
        </div>

        <button type="submit" class="btn btn-success mt-3">Atualizar</button>
    </form>
@endsection
