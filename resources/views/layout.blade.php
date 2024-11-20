<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Sistema de Gerenciamento de Projetos')</title>
    
    <!-- Fonte Google Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS atualizado -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Estilos customizados -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            padding-top: 56px;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }
        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
        }
        .footer-text {
            color: #6c757d;
            font-size: 0.9rem;
        }
        /* Ajuste para os itens da navbar */
        .navbar-nav .nav-item {
            margin-right: 15px;
        }

        .navbar-nav .nav-item:last-child {
            margin-right: 0;
        }
    </style>
</head>
<body>

    <!-- Cabeçalho -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">EngFlow</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/projetos">Projetos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/clientes">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/funcionarios">Funcionários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/movimentacoes">Finanças</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/situacoes">Situações</a>
                    </li>

                    <!-- Botão de logout -->
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">Sair</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Rodapé -->
    <footer class="text-center mt-auto">
        <div class="container">
            <p class="footer-text">&copy; 2024 EngFlow - Todos os direitos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap JS atualizado -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
