<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EscaLab</title>

    @vite(
    [
    'node_modules/jquery/dist/jquery.js?commonjs-entry',
    'node_modules/bootstrap/dist/css/bootstrap.css',
    'node_modules/bootstrap/dist/js/bootstrap.bundle.js?commonjs-entry',
    'resources/css/app.css',
    'resources/js/app.js'
    ])

</head>


<body class="tudo">
    @if(Auth::check())
    <nav class="navbar navbar-expand-lg border-bottom mx-4 mb-4">
        <div class="container-fluid px-4">
            <a class="mx-2" href="{{route('home')}}">
                <img src="img/agenda.png" width="50" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                    </li>
                    @if(Gate::allows('isAdmin'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.index')}}">Usuários</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('laboratory.index')}}">Laboratórios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('appointment.index')}}">Agendamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Recursos</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <h4>Olá, <a href="{{route('user.show', ['user'=>auth()->user()])}}">{{auth()->user()->name}}</h4></a>
                    <a class="btn btn-danger mx-1" href="{{route('logout')}}">Sair</a>
                </div>
            </div>
        </div>
    </nav>

    @else
    <nav class="navbar navbar-expand-lg border-bottom mx-4 mb-4">
        <div class="container-fluid px-4">
            <a class="mx-2" href="{{route('home')}}">
                <img src="img/agenda.png" width="50" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('laboratory.index')}}">Laboratórios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('appointment.index')}}">Agendamentos</a>
                    </li>
                </ul>
                <div class="d-flex my-2" role="icon">
                    <a class="btn btn-primary mx-1" href="{{route('login')}}">Login</a>
                </div>
            </div>
        </div>
    </nav>

    @endif

    @yield('content')
</body>