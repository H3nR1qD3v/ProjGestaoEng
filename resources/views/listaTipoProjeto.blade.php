@extends('layout')

@section('title', 'EngFlow - Tipos de Projeto')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Tipos de Projeto</h1>

    <!-- Botão para cadastrar um novo tipo de projeto -->
    <a href="/tipos-projeto/create" class="btn btn-success mb-3">Novo Tipo de Projeto</a>

    <!-- Tabela de tipos de projeto com filtros -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Descrição do Tipo</th>
                    <th>Ações</th>
                </tr>
                <tr>
                    <!-- Filtros de pesquisa -->
                    <form method="GET" action="{{ route('tipos-projeto.index') }}">
                        <th>
                            <input type="text" name="descricao_tipo" class="form-control" placeholder="Buscar descrição" value="{{ request('descricao_tipo') }}">
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
                @foreach ($tipos as $tipo)
                    <tr>
                        <td class="text-center">{{ $tipo->descricao_tipo }}</td>
                        <td class="text-center">
                            <a href="/tipos-projeto/edit/{{ $tipo->id }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="/tipos-projeto/{{ $tipo->id }}" method="POST" style="display:inline;" onsubmit="return confirmDeletion()">
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
        return confirm("Tem certeza que deseja excluir este tipo de projeto? Esta ação não pode ser desfeita.");
    }
</script>
@endsection
