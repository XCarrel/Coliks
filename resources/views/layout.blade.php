<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>

    <link href="css/app.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap/typeaheadjs.css" rel="stylesheet">
    <script src="js/jquery/jquery.min.js" type="text/javascript"></script>
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
        var lastname = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        // url points to a json file that contains an array of last names, see
        prefetch: '{{route('autocomplete_lastname') }}'
        });

        var firstname = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        // url points to a json file that contains an array of first names, see
        prefetch: '{{route('autocomplete_firstname') }}'
        });


        // passing in `null` for the `options` arguments will result in the default
        // options being used
        $('#scrollable-dropdown-menu #nom').typeahead({
            highlight: true,
            hint: true,
        },
        {
            name: 'lastname',
            source: lastname
        });
        $('#scrollable-dropdown-menu #prenom').typeahead({
            highlight: true,
            hint: true,
        },
        {
            name: 'firstname',
            source: firstname
        });

        //Get the value input when a value is selected on dropdown
        $(document).ready(function(){
        $('#scrollable-dropdown-menu #nom').typeahead(/* pass in your datasets and initialize the typeahead */).on('typeahead:select', function(){
                var nom = $("#nom").val();       
                    $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: '{{route('ajax')}}',
                    data: {'nom': nom},
                    datatype: "json",
                    success: function(msg){ // What to do if we succeed
                        $('#prenom').empty(); {
                            $("#prenom").val(msg.value.nom);
                            console.log(msg.value.nom);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                        console.log(JSON.stringify(jqXHR));
                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                    }
                });
        }); 
        });
</script>
</body>
</html>