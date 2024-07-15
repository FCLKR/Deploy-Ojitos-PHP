<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Incluye los archivos CSS de Bootstrap -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <!-- jQuery (necesario para DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <style>
        body {
            background-color: #0F1827;
            color: #ffffff;
        }
        .navbar {
            background-color: #ae7bce;
            padding: 1rem;
        }
        .navbar .navbar-brand,
        .navbar .nav-link {
            color: #0F1827;
            font-weight: bold;
        }
        .navbar .nav-link:hover {
            color: darkblue;
        }
        .dropdown-menu {
            background-color: #ae7bce;
        }
        .dropdown-item {
            color: #0F1827;
        }
        .dropdown-item:hover {
            background-color: #0F1827;
            color: #ffffff;
        }
        .container {
            background-color: #ffffff;
            color: #0F1827;
            padding: 2rem;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
        .logo {
            height: 50px;
            width: 130px;
        }
         h2 {
             font-size: 2rem;
             font-weight: bold;
             margin-top: 1.5rem;
             margin-bottom: 1rem;
         }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="http://localhost:8000/">
                <img src="{{ asset('images/logo.png') }}" alt="Logo de la empresa" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @auth
                        @if (Auth::user()->role->name == 'ADMIN')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboardAdmin') }}">{{ __('(Home)') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('AdopcionAdmin.index') }}">{{ __('Animales') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('AdopcionAdmin.solicitudesAdoption') }}">{{ __('Solicitudes') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('ProductAdmin.index') }}">{{ __('Productos') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('invoices.index') }}">{{ __('Facturas') }}</a>
                            </li>
                        @elseif (Auth::user()->role->name == 'USER')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboardUser') }}">{{ __('(Home)') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('AdopcionUser.index') }}">{{ __('¡Adopta!') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('AdopcionUser.misSolicitudes') }}">{{ __('Mis solicitudes') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('client.products') }}">{{ __('Productos') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('client.cart') }}">{{ __('Carrito') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.invoices') }}">{{ __('Mis Facturas') }}</a>
                            </li>
                        @endif
                    @endauth
                </ul>
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }} ({{ Auth::user()->role->name }})
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">{{ __('Log Out') }}</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>

<!-- Incluye los archivos JS de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
    $(document).ready(function() {
        $('table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
            }
        });
    });
</script>
@yield('scripts')
</body>
</html>
