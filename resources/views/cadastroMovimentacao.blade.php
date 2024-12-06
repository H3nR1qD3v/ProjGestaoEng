@extends('layout')

@section('title', 'Cadastrar Movimentação Financeira')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Cadastrar Movimentação Financeira</h1>

        <form action="/movimentacoes" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tipo">Tipo</label>
                        <select id="tipo" name="tipo" class="form-control" required>
                            <option value="entrada">Entrada</option>
                            <option value="saida">Saída</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input type="number" step="0.01" class="form-control" id="valor" name="valor" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="data">Data</label>
                        <input type="date" class="form-control" id="data" name="data" required>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="/movimentacoes" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection
