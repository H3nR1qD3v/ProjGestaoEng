<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'EngFlow')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Fontes Google -->
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Poppins:wght@300;400;500&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos customizados -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            padding-top: 60px;
            background-color: #f0f4f8;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: #004085;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            padding: 5px 10px;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.2rem;
            color: #fff;
        }

        .navbar-brand img {
            width: 50px;
            height: auto;
            margin-right: 8px;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            font-weight: 600;
        }

        .navbar-nav .nav-link:hover {
            color: #ffd700 !important;
        }

        .navbar-nav .nav-link.active,
        .navbar-nav .nav-link.bold {
            font-weight: 700;
        }

        .btn-logout {
            background-color: transparent;
            border: 2px solid #fff;
            color: #fff;
            font-weight: 600;
            border-radius: 4px;
            padding: 5px 10px;
            transition: background-color 0.3s ease, color 0.3s ease;
            text-align: center;
        }

        .btn-logout:hover {
            background-color: #ffd700;
            color: #004085;
        }

        footer {
            background-color: #004085;
            color: #fff;
            padding: 15px 0;
            margin-top: auto;
        }

        .footer-text {
            font-size: 0.9rem;
            color: #ccc;
        }

        .flash-message {
            margin-top: 80px;
            border-radius: 10px;
            padding: 15px;
            font-size: 1.1rem;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-logout-align {
            display: flex;
            align-items: center;
            justify-content: center;


        }
    </style>
</head>

<body>
    <!-- Cabeçalho -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/engenharia (2).png') }}" alt="Logo">
                EngFlow
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link bold" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/projetos">Projetos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/clientes">Clientes</a>
                    </li>

                    @if(auth()->user()->perfil_acesso === 'socio')
                        <li class="nav-item">
                            <a class="nav-link" href="/funcionarios">Funcionários</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/movimentacoes">Finanças</a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" href="/situacoes">Situações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tipos-projeto">Tipos de Projeto</a>
                    </li>

                    <li class="nav-item btn-logout-align">
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-logout">Sair</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Flash Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 80px;">
            <strong>{{ session('success') }}</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Conteúdo dinâmico -->
    <main class="container mt-4">
        @yield('content')
    </main>

    <!-- Rodapé -->
    <footer class="text-center">
        <div class="container">
            <p class="footer-text">&copy; 2024 EngFlow - Todos os direitos reservados.</p>
        </div>
    </footer>

    


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>