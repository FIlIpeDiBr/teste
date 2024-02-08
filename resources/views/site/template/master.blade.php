<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Site Dahora</title>

    @vite(
    [
      'node_modules/jquery/dist/jquery.js',
      'node_modules/bootstrap/dist/js/bootstrap.js',
      'node_modules/bootstrap/dist/css/bootstrap.css',
      'resources/js/app.js',
      'resources/css/app.css'
    ])
    
</head>
<body class="tudo">

  <nav class="navbar navbar-expand-lg border-bottom mx-4 mb-4">
    <div class="container-fluid px-4">
      <a class="mx-2" href="/laravel/teste/public/">
        <svg height="40" preserveAspectRatio="xMidYMid" viewBox="0 .232 259.247 255.761" width="40" xmlns="http://www.w3.org/2000/svg"><path d="m245.235 153.524c14.012-14.012 14.011-36.811 0-50.823-6.787-6.788-15.812-10.525-25.411-10.525-2.28 0-4.523.208-6.712.617 9.538-6.524 15.72-17.495 15.72-29.694 0-19.816-16.122-35.937-35.938-35.937-12.223 0-23.213 6.205-29.733 15.776 2.157-11.377-1.226-23.537-9.87-32.18-6.785-6.788-15.811-10.526-25.409-10.526-9.6 0-18.624 3.738-25.412 10.526-8.643 8.643-12.026 20.803-9.87 32.18-6.519-9.57-17.509-15.776-29.733-15.776-19.815 0-35.936 16.12-35.936 35.937 0 12.2 6.18 23.17 15.718 29.694a36.487 36.487 0 0 0 -6.711-.617c-9.6 0-18.624 3.738-25.411 10.526-6.789 6.787-10.527 15.812-10.527 25.41 0 9.6 3.738 18.624 10.526 25.412 6.787 6.787 15.812 10.526 25.41 10.526 2.28 0 4.523-.208 6.712-.618-9.538 6.525-15.718 17.496-15.718 29.695 0 19.815 16.12 35.936 35.936 35.936 12.224 0 23.215-6.206 29.734-15.776-2.157 11.378 1.226 23.538 9.87 32.18 6.787 6.788 15.812 10.526 25.41 10.526 9.6 0 18.625-3.738 25.412-10.526 8.643-8.643 12.026-20.803 9.869-32.18 6.52 9.57 17.51 15.776 29.733 15.776 19.816 0 35.937-16.12 35.937-35.936 0-12.2-6.18-23.17-15.719-29.695 2.189.41 4.433.618 6.712.618 9.599 0 18.624-3.739 25.411-10.526"/><path d="m234.391 113.538c-8.049-8.048-21.099-8.048-29.148 0h-42.184l29.829-29.828c11.383 0 20.61-9.228 20.61-20.611s-9.227-20.612-20.61-20.612c-11.384 0-20.611 9.229-20.611 20.612l-29.829 29.829v-42.185c8.049-8.049 8.049-21.099 0-29.148-8.05-8.05-21.1-8.05-29.149 0s-8.049 21.1 0 29.148v42.185l-29.828-29.83c0-11.382-9.228-20.61-20.611-20.61s-20.611 9.228-20.611 20.61c0 11.384 9.228 20.612 20.61 20.612l29.83 29.828h-42.185c-8.05-8.049-21.1-8.048-29.15 0s-8.048 21.1 0 29.15c8.05 8.048 21.1 8.048 29.15 0h42.183l-29.827 29.827c-11.383 0-20.611 9.227-20.611 20.61 0 11.384 9.228 20.612 20.61 20.612 11.384 0 20.612-9.228 20.612-20.611l29.828-29.829v42.184c-8.049 8.049-8.049 21.1 0 29.149 8.05 8.049 21.1 8.049 29.15 0 8.048-8.05 8.048-21.1 0-29.15v-42.183l29.828 29.829c0 11.383 9.227 20.61 20.61 20.61 11.384 0 20.612-9.227 20.612-20.61 0-11.384-9.228-20.611-20.611-20.611l-29.83-29.829h42.185c8.05 8.05 21.1 8.05 29.148 0 8.05-8.049 8.05-21.1 0-29.149" fill="#ffb13b"/></svg>
      </a>
      <a class="navbar-brand" href="/laravel/teste/public/">EscaLab</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/laravel/teste/public/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('user.index')}}">Usuários</a>
          </li>
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
        <form class="d-flex" role="search">
          <h4 class="">Admin Pannel</h4>
        </form>
      </div>
    </div>
  </nav>
    
  @yield('content')
</body>