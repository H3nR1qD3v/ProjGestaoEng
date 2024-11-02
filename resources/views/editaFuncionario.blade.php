@extends('layout') <!-- Referência ao layout -->

@section('title', 'Editar Funcionário') <!-- Título da página -->

@section('content') <!-- Conteúdo da página -->
    <h1>Editar Funcionário</h1>

    <form action="/funcionarios/update/{{ $funcionario->id }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required value="{{ $funcionario->nome }}">
        </div>

        <div class="form-group">
            <label for="cargo">Cargo</label>
            <input type="text" class="form-control" id="cargo" name="cargo" required value="{{ $funcionario->cargo }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required value="{{ $funcionario->email }}">
        </div>

        <div class="form-group">
            <label for="perfil_acesso">Perfil de Acesso</label>
            <select class="form-control" id="perfil_acesso" name="perfil_acesso" required>
                <option value="socio" {{ $funcionario->perfil_acesso == 'socio' ? 'selected' : '' }}>Sócio</option>
                <option value="funcionario" {{ $funcionario->perfil_acesso == 'funcionario' ? 'selected' : '' }}>Funcionário</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Atualizar</button>
    </form>
@endsection
