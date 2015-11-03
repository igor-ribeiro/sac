<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>SAC</title>

        <link rel="stylesheet" href="lib/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="lib/bootstrap/dist/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/app.css">
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <span class="navbar-brand">SAC</span>

                <ul class="nav navbar-nav navbar-right">
                    <li><a class="js-nav-link" href="{{ route('chamados') }}">Chamados</a></li>
                    <li><a class="js-nav-link" href="{{ route('cadastrar') }}">Cadastrar</a></li>
                </ul>
            </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
