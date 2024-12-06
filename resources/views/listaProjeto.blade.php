@extends('layout')

@section('title', 'Projetos')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Projetos</h1>

    <!-- Botão para cadastrar um novo projeto -->
    <a href="/projetos/create" class="btn btn-success mb-3">Novo Projeto</a>

    <!-- Tabela de projetos com filtros -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Descrição</th>
                    <th>Cliente</th>
                    <th>Situação</th>
                    <th>Tipo de Projeto</th>
                    <th>Valor</th>
                    <th>Data Inicial</th>
                    <th>Data Previsão</th>
                    <th>MCMV</th>
                    <th>Tamanho</th>
                    <th style="width: 150px;">Ações</th>
                </tr>
                <tr>
                    <!-- Filtros de pesquisa -->
                    <form method="GET" action="{{ route('projetos.index') }}">
                        <th>
                            <input type="text" name="descricao" class="form-control" placeholder="Buscar descrição"
                                value="{{ request('descricao') }}">
                        </th>
                        <th>
                            <input type="text" name="cliente" class="form-control" placeholder="Buscar cliente"
                                value="{{ request('cliente') }}">
                        </th>
                        <th>
                            <input type="text" name="situacao" class="form-control" placeholder="Buscar situação"
                                value="{{ request('situacao') }}">
                        </th>
                        <th>
                            <input type="text" name="tipo_projeto" class="form-control" placeholder="Buscar tipo"
                                value="{{ request('tipo_projeto') }}">
                        </th>
                        <th>
                            <input type="text" name="valor" class="form-control" placeholder="Buscar valor"
                                value="{{ request('valor') }}">
                        </th>
                        <th>
                            <input type="date" name="data_inicial" class="form-control"
                                value="{{ request('data_inicial') }}">
                        </th>
                        <th>
                            <input type="date" name="data_previsao" class="form-control"
                                value="{{ request('data_previsao') }}">
                        </th>
                        <th>
                            <select name="mcmv" class="form-control">
                                <option value="">Todos</option>
                                <option value="1" {{ request('mcmv') == '1' ? 'selected' : '' }}>Sim</option>
                                <option value="0" {{ request('mcmv') == '0' ? 'selected' : '' }}>Não</option>
                            </select>
                        </th>
                        <th>
                            <input type="text" name="tamanho" class="form-control" placeholder="Buscar tamanho"
                                value="{{ request('tamanho') }}">
                        </th>
                        <th>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-search"></i> Filtrar
                            </button>
                        </th>
                    </form>
                </tr>
            </thead>
            <tbody>
                @foreach ($projetos as $projeto)
                    <tr>
                        <td class="text-center">{{ $projeto->descricao_projeto }}</td>
                        <td class="text-center">{{ $projeto->cliente->nome }}</td>
                        <td class="text-center">{{ $projeto->situacao->descricao_situacao }}</td>
                        <td class="text-center">{{ $projeto->tipoProjeto->descricao_tipo }}</td>
                        <td class="text-center">R$ {{ number_format($projeto->valor, 2, ',', '.') }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($projeto->data_inicial)->format('d/m/Y') }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($projeto->data_previsao)->format('d/m/Y') }}</td>
                        <td class="text-center">
                            @if ($projeto->mcmv)
                                <span class="text-success">✔</span>
                            @else
                                <span class="text-danger">✖</span>
                            @endif
                        </td>
                        <td class="text-center">{{ $projeto->tamanho }} m²</td>
                        <td class="text-center">
                            <!-- Botões lado a lado com o mesmo tamanho -->
                            <div class="btn-group" role="group">
                                <a href="/projetos/edit/{{ $projeto->id }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="/projetos/{{ $projeto->id }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i> Excluir
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
