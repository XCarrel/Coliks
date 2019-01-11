<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="css/app.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="js/jquery/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap/bootstrap.js" type="text/javascript"></script>
    <script src="js/typeahead.bundle.js" type="text/javascript"></script>

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
    @yield('content')
</div>
<footer class="footer"><span class="version">Coliks v{{ config('app.version') }}</span></footer>
<script type="text/javascript">
        var countries = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        // url points to a json file that contains an array of country names, see
        prefetch: '{{route('autocomplete') }}'
        });

        // passing in `null` for the `options` arguments will result in the default
        // options being used
        $('#test .typeahead').typeahead(null, {
        name: 'countries',
        source: countries
        });
</script>
</body>
</html>