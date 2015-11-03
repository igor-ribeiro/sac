<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>SAC</title>

        <link rel="stylesheet" href="lib/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="lib/bootstrap/dist/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="lib/ladda/dist/ladda-themeless.min.css">
        <link rel="stylesheet" href="css/app.css">
        <script>var URL = '{{ url() }}';</script>
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

        @include ('chamado')

        <script src="lib/jquery/dist/jquery.min.js"></script>
        <script src="lib/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="lib/ladda/dist/spin.min.js"></script>
        <script src="lib/ladda/dist/ladda.min.js"></script>
        <script src="lib/ladda/dist/ladda.jquery.min.js"></script>
        <script src="js/cadastrar-chamado.js"></script>
        <script src="js/ver-chamado.js"></script>
    </body>
</html>
