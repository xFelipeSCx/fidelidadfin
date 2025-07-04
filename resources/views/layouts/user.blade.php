@php
    use Illuminate\Support\Facades\Auth;
@endphp
@if (auth()->check())
    @if (auth()->user()->activo === 0)
        @php
            auth()->logout();
            header("Location: " . route('login'));
            exit;
        @endphp
    @endif
@endif
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fidelidad') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->



    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Íconos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">


</head>



<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow-sm sticky-top" style="">
    <div class="container position-relative">
        <!-- Botón para abrir el offcanvas -->
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="navbar-toggler-icon"></i>
        </button>

        <a class="navbar-brand" href="{{ route('tienda') }}">Tienda con premios</a>

        <!-- Offcanvas -->
        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Tienda con premios</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tienda') }}"><i class="bi bi-bag"></i> Catalogo</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('carrito') }}"><i class="bi bi-cart-check"></i> Carrito</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('premios') }}"><i class="bi bi-cart-check"></i> Premios</a>
                    </li>
                </ul>
                @if (Auth::check())
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item text-white">

                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('perfil') }}"> <i class="bi bi-person-circle"> </i>
                                {{ Auth::user()->name }} {{ Auth::user()->lastname ?? '' }}</a>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right"> </i>
                                Iniciar
                                Sesión</a>
                        </li>
                    </ul>
                @endif
                @auth
                    @if (auth()->user()->rol === 'admin')
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">
                                    <i class="bi bi-speedometer2"></i> Admin
                                </a>
                            </li>
                        </ul>
                    @endif
                    <ul class="navbar-nav ms-auto">

                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="nav-link" style="text-decoration: none;">
                                    <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                                </button>
                            </form>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>

        <!-- Botón de información -->
        <div class="navbar-brand">
            <button class="btn" data-bs-toggle="modal" data-bs-target="#infoModal">
                <i class="bi bi-info-circle" style="color:white;"></i>
            </button>
        </div>
    </div>
</nav>



<!-- Modal de Información -->
<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoModalLabel">ℹ️ Información</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Una tienda dedicada a la venta de productos de comida, cortesia de : Felipe Alfonso Alcocer Cervantes
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Inicio del section -->

<body>
    <main class="py-4">
        @yield('content')
    </main>
</body>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"> </script>




</html>