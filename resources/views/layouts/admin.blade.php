@if (auth()->check())
    @if (auth()->user()->activo === 0)
        @php
            auth()->logout();
            header("Location: " . route('login'));
            exit;
        @endphp
    @elseif (auth()->user()->rol !== 'admin')
        @php
            header("Location: " . route('tienda'));
            exit;
        @endphp
    @endif
@endif


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
        }

        .sidebar {
            min-height: 100vh;
            background-color: #0d6efd;
            /* Azul Bootstrap */
            color: white;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #0b5ed7;
        }

        .sidebar .nav-link.active {
            background-color: #0b5ed7;
            font-weight: bold;
        }

        .content {
            margin-left: 250px;
            /* Ancho del sidebar */
            padding: 2rem;
        }

        .sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            padding: 2rem 1rem;
        }
    </style>
</head>

<body>
    <div class="sidebar d-flex flex-column">
        <h4 class="mb-4"><i class="bi bi-speedometer2"></i> Admin</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('carritos.index') }}" class="nav-link">
                    <i class="bi bi-house-door"></i> Carrito
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('productos.index') }}" class="nav-link">
                    <i class="bi bi-box-seam"></i> Productos
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('marcas-descuentos.index') }}" class="nav-link">
                    <i class="bi bi-box-seam"></i> marcas
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="bi bi-people"></i> Usuarios
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('tienda') }}" class="nav-link">
                    <i class="bi bi-cart-check"></i> Ir a Tienda
                </a>
            </li>
            <li class="nav-item mt-3">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-light w-100" type="submit">
                        <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <div class="content">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>