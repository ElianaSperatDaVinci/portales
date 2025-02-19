<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/estilos.css') }}">
    <link rel="icon" href="{{ url('img/icon-ts.png') }}" type="image/x-icon">

    <title>{{ $title ?? 'Inicio'}} - Taylor Swift</title>
</head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-lg navbar-background">
                <div class="container-fluid">
                    
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <h1>Taylor Swift</h1>
                        <picture class="logo">
                            <img src="{{ url('img/logo-ts.png') }}" alt="Logo Taylor Swift">
                        </picture>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('discos.index') }}">Discos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('blog.index') }}">Blog</a>
                            </li>

                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('auth.login.form') }}">Iniciar Sesión</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('auth.register.form') }}">Registrarse</a>
                            </li>

                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.index') }}">Usuarios</a>
                            </li>

                            <li class="nav-item">
                                <form action="{{ route('auth.logout.process') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn nav-link">Cerrar Sesión</button>
                                </form>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.profile') }}">
                                    <strong>{{ auth()->user()->name }}</strong>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cart.index') }}">
                                    <picture class="cart">
                                        <img src="{{ url('img/cart.png') }}" alt="Carrito de Compras">
                                    </picture>
                                </a>
                            </li>                            
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="container">

            @if(session()->has('feedback.message'))
                <div class="alert alert-{{ session('feedback.type', 'info') }}">
                    {{ session()->get('feedback.message') }}
                </div>
            @endif


                {{ $slot }}
            </main>

            <footer class="footer">
                <p>Copyright &copy; 2025</p>
            </footer>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>