@extends('layout')

@section('title', 'EngFlow - Movimentações Financeiras')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Movimentações Financeiras</h1>

    <!-- Botão para cadastrar uma nova movimentação -->
    <a href="/movimentacoes/create" class="btn btn-success mb-3">Nova Movimentação</a>

    <!-- Tabela de movimentações com filtros -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Tipo</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
                <tr>
                    <!-- Filtros de pesquisa -->
                    <form method="GET" action="{{ route('movimentacoes.index') }}">
                        <th>
                            <select name="tipo" class="form-control">
                                <option value="">Todos</option>
                                <option value="entrada" {{ request('tipo') == 'entrada' ? 'selected' : '' }}>Entrada</option>
                                <option value="saida" {{ request('tipo') == 'saida' ? 'selected' : '' }}>Saída</option>
                            </select>
                        </th>
                        <th>
                            <input type="text" name="valor" class="form-control" placeholder="Buscar valor" value="{{ request('valor') }}">
                        </th>
                        <th>
                            <input type="text" name="descricao" class="form-control" placeholder="Buscar descrição" value="{{ request('descricao') }}">
                        </th>
                        <th>
                            <input type="date" name="data" class="form-control" value="{{ request('data') }}">
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
                @foreach ($movimentacoes as $movimentacao)
                    <tr>
                        <td class="text-center">{{ ucfirst($movimentacao->tipo) }}</td>
                        <td class="text-center">R$ {{ number_format($movimentacao->valor, 2, ',', '.') }}</td>
                        <td class="text-center">{{ $movimentacao->descricao }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($movimentacao->data)->format('d/m/Y') }}</td>
                        <td class="text-center">
                            <a href="/movimentacoes/edit/{{ $movimentacao->id }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="/movimentacoes/{{ $movimentacao->id }}" method="POST" style="display:inline;" onsubmit="return confirmDeletion()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    function confirmDeletion() {
        return confirm("Tem certeza que deseja excluir esta movimentação? Esta ação não pode ser desfeita.");
    }
</script>

@endsection
