<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>

    <link href="../css/app.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap/typeaheadjs.css" rel="stylesheet">
    <script src="../js/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap/bootstrap.js" type="text/javascript"></script>
    <script src="../js/typeahead.bundle.js" type="text/javascript"></script>
    <script src="../js/moment/moment.js" ></script>
    <script src="../js/moment/locale/fr-ch.js"></script>


    @yield('pagecss')
    @yield('pagejs')

</head>
<body class="container">
<div id="wrap">
    <div id="main" class="container clear-top">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img class="logo" src="/assets/images/logo-sports-time.png"></a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="#">Clients</a>
                    <a class="nav-item nav-link" href="#">Inventaire</a>
                    <a class="nav-item nav-link" href="/locations">Locations</a>
                </div>
            </div>
        </nav>
    </div>
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    @yield('content')
</div>
<footer class="footer"><span class="version">Coliks v{{ config('app.version') }}</span></footer>
<script src="../js/main.js" type="text/javascript"></script>
</body>
</html>