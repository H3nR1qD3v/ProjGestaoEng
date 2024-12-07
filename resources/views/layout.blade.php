<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Sistema de Gerenciamento de Projetos')</title>

    <!-- Favicon da web -->
    <link rel="icon" href="https://www.google.com/images/branding/product/ico/googleg_lodp.ico" type="image/x-icon">

    <!-- Fonte Google Roboto e Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos Customizados -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            padding-top: 60px; /* Aumenta o espaço acima devido ao navbar compacto */
            background-color: #f0f4f8; /* Cor mais suave para o background */
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: #6f42c1; /* Roxo para o cabeçalho */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            padding: 5px 10px; /* Compacta a altura */
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.2rem; /* Ajusta o tamanho da fonte */
            color: #fff;
        }
        .navbar-brand img {
            width: 25px; /* Ajusta o tamanho da imagem */
            height: auto;
            margin-right: 8px;
        }
        .navbar-nav .nav-link {
            color: #fff !important;
            font-weight: 600;
        }
        .navbar-nav .nav-link:hover {
            color: #ffdf00 !important; /* Amarelo para o hover */
        }
        .navbar-nav .nav-link.active, .navbar-nav .nav-link.bold {
            font-weight: 700; /* Negrito em links ativos ou "Home" */
        }
        footer {
            background-color: #343a40; /* Cinza escuro para o rodapé */
            color: #fff;
            padding: 10px 0; /* Aumenta o espaço no rodapé */
            margin-top: auto;
        }
        .footer-text {
            font-size: 0.8rem;
            color: #bbb; /* Cor mais suave para o texto */
        }
        .container {
            margin-top: 20px;
            padding-bottom: 50px;
        }
        .alert {
            border-radius: 0.25rem;
            margin-top: 20px;
            background-color: #e3f2fd; /* Azul claro para alertas */
            color: #1565c0; /* Azul escuro para texto */
        }
        .btn-logout {
            border: 2px solid #ff9800; /* Laranja para borda do botão */
            color: #ff9800;
            font-weight: bold;
            text-transform: uppercase;
            padding: 5px 12px;
            background-color: transparent;
            transition: all 0.3s ease;
        }
        .btn-logout:hover {
            background-color: #ff9800;
            color: white; /* Cor de fundo invertida no hover */
        }
        .card {
            border: none;
            border-radius: 12px; /* Bordas mais arredondadas */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            background-color: #ffffff;
        }
        .card-header {
            background-color: #6f42c1; /* Roxo para o cabeçalho */
            color: white;
            font-weight: 700;
        }
        .card-body {
            background-color: #f9f9f9; /* Fundo suave para o conteúdo */
        }
        .nav-item {
            margin-right: 20px;
        }
        @media (max-width: 768px) {
            .navbar-nav {
                text-align: center;
            }
            .navbar-nav .nav-item {
                margin-right: 0;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>

    <!-- Cabeçalho -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://via.placeholder.com/20" alt="Logo">
                EngFlow
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

                    <!-- Links de Funcionários e Finanças visíveis apenas para sócios -->
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

                    <!-- Botão de logout -->
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-logout">Sair</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo -->
    <div class="container mt-4">
        <!-- Flash message -->
        @if(session('msg'))
            <div class="alert alert-info">
                {{ session('msg') }}
            </div>
        @endif

        @yield('content')
    </div>

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
