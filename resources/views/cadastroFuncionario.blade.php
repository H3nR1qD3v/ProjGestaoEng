@extends('layout') <!-- Referência ao layout -->

@section('title', 'Cadastro de Funcionário') <!-- Título da página -->

@section('content') <!-- Conteúdo da página -->
    <div class="container mt-5">
        <h1 class="mb-4">Cadastrar Novo Funcionário</h1>

        <form action="/funcionarios/store" method="POST">
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
                        <label for="cargo">Cargo</label>
                        <input type="text" class="form-control" id="cargo" name="cargo" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="perfil_acesso">Perfil de Acesso</label>
                        <select class="form-control" id="perfil_acesso" name="perfil_acesso" required>
                            <option value="socio">Sócio</option>
                            <option value="funcionario">Funcionário</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="/funcionarios" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection
