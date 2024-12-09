@extends('layout')

@section('title', 'EngFlow - Edição Projeto')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Editar Projeto</h1>

        <form action="/projetos/update/{{ $projeto->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="descricao_projeto">Descrição do Projeto</label>
                        <input type="text" class="form-control" id="descricao_projeto" name="descricao_projeto" value="{{ $projeto->descricao_projeto }}" required>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div class="form-group mb-0">
                        <label for="mcmv" class="mr-2">MCMV</label>
                        <input type="checkbox" id="mcmv" name="mcmv" value="1" {{ $projeto->mcmv ? 'checked' : '' }}>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tamanho">Tamanho</label>
                        <div class="input-group">
                            <input type="text" class="form-control mask-number" id="tamanho" name="tamanho" value="{{ $projeto->tamanho }}" required>
                            <div class="input-group-append">
                                <span class="input-group-text">m²</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">R$</span>
                            </div>
                            <input type="text" class="form-control mask-number" id="valor" name="valor" value="{{ $projeto->valor }}" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="data_inicial">Data Inicial</label>
                        <input type="date" class="form-control" id="data_inicial" name="data_inicial" value="{{ $projeto->data_inicial }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="data_previsao">Data Previsão</label>
                        <input type="date" class="form-control" id="data_previsao" name="data_previsao" value="{{ $projeto->data_previsao }}" required>
                    </div>
                </div>
            </div>

            <!-- Colocando Cliente, Situação e Tipo de Projeto na mesma linha -->
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_cliente">Cliente</label>
                        <div class="input-group">
                            <select id="id_cliente" name="id_cliente" class="form-control" required>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}" {{ $cliente->id == $projeto->id_cliente ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <a href="/clientes/create" class="btn btn-outline-primary" target="_blank">+</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_situacao">Situação</label>
                        <div class="input-group">
                            <select id="id_situacao" name="id_situacao" class="form-control" required>
                                @foreach($situacoes as $situacao)
                                    <option value="{{ $situacao->id }}" {{ $situacao->id == $projeto->id_situacao ? 'selected' : '' }}>{{ $situacao->descricao_situacao }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <a href="/situacoes/create" class="btn btn-outline-primary" target="_blank">+</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_tipo">Tipo de Projeto</label>
                        <div class="input-group">
                            <select id="id_tipo" name="id_tipo" class="form-control" required>
                                @foreach($tipos as $tipo)
                                    <option value="{{ $tipo->id }}" {{ $tipo->id == $projeto->id_tipo ? 'selected' : '' }}>{{ $tipo->descricao_tipo }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <a href="/tipos/create" class="btn btn-outline-primary" target="_blank">+</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="/projetos" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success">Atualizar</button>
            </div>
        </form>
    </div>

    <!-- Adicionando estilo e scripts para a máscara -->
    <style>
        .form-group {
            margin-bottom: 1.5rem;
        }
        .input-group-append .btn {
            height: 100%;
            padding: 0.375rem 0.75rem;
            border-left: none;
        }
        .btn-outline-primary {
            font-size: 1.25rem;
            background-color: #f8f9fa;
            color: #007bff;
        }
        .btn-outline-primary:hover {
            background-color: #e2e6ea;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .mask-number {
            text-align: right;
        }
    </style>

    <script>
        // Adicionando máscara para os campos de Tamanho e Valor
        document.addEventListener('DOMContentLoaded', function() {
            const mask = function(value) {
                return value.replace(/\D/g, '').replace(/(\d)(\d{2})$/, '$1,$2').replace(/(?=(\d{3})+(\D))\B/g, '.');
            };

            document.querySelectorAll('.mask-number').forEach(input => {
                input.addEventListener('input', function(e) {
                    e.target.value = mask(e.target.value);
                });
            });
        });
    </script>
@endsection
