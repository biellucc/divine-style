<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Laravel</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand" href='{{ route('site.dashboard') }}'>Divine Style</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('site.dashboard') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Produtos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Camiseta</a></li>
                            <li><a class="dropdown-item" href="#">Calça</a></li>
                            <li><a class="dropdown-item" href="#">Bermuda</a></li>
                            <li><a class="dropdown-item" href="#">Shorts</a></li>
                            <li><a class="dropdown-item" href="#">Vestido</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Usuário
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Perfil</a></li>
                            @if (Auth::check() && Auth::user()->juridico)
                                <li><a class="dropdown-item" href="{{ route('roupa.index') }}">Estoque</a></li>
                                <li><a class="dropdown-item" href="">Vendas</a></li>
                            @else
                                <li><a class="dropdown-item" href="{{ route('carrinho.index') }}">Carrinho</a></li>
                                <li><a class="dropdown-item" href="{{ route('cartao.index') }}">Cartões</a></li>
                                <li><a class="dropdown-item" href="{{ route('pedido.index') }}">Histórico de Pedidos</a></li>
                            @endif
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            @if (Auth::check())
                                <li><a href="{{ route('login.logout') }}" class="dropdown-item">Logout</a></li>
                            @else
                                <li><a class="dropdown-item" href="{{ route('login.index') }}">Login</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('usuario.formulario_registro') }}">Registrar</a></li>
                            @endif
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search">
                    <button class="btn btn-light" type="submit">Pesquisar</button>
                </form>
            </div>
        </div>
    </nav>

    @yield('conteudo')

    <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="{{ route('site.dashboard') }}" class="nav-link px-2 text-body-secondary">Home</a></li>
                <li class="nav-item"><a href="{{ route('site.perguntas_frequentes') }}" class="nav-link px-2 text-body-secondary">Perguntas
                        Frequentes</a></li>
                <li class="nav-item"><a href="{{ route('site.sobre') }}" class="nav-link px-2 text-body-secondary">Sobre</a></li>
                <li class="nav-item"><a href="{{ route('site.ajuda') }}" class="nav-link px-2 text-body-secondary">Ajuda</a></li>
            </ul>
            <p class="text-center text-body-secondary">© 2024 Divine Style</p>
        </footer>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
