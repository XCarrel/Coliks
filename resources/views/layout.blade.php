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
<script type="text/javascript">
        $(document).ready(function() {
            $('.message').hide(1);
            $('#select').hide(1);
            $('#submit').hide(1);
            $('#submit_user').hide(1);
            $('#localite_name').hide(1);
        });
        var lastname = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        // url points to a json file that contains an array of last names, see
        prefetch: '{{route('autocomplete_lastname') }}'
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
        }
        );
        

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
                    $('#nom').keyup(function() {
                        var nom_test = $("#nom").val();
                        $.each(msg.value, function(index) {
                        if(msg.value[index].lastname != nom_test){
                            $('#localite').val('');
                            $('#prenom').val('');
                            $('#adresse').val('');
                            $('#tel').val('');
                            $('#natel').val('');
                            $('#email').val('');
                            $('#select').val('');
                            $("#submit").hide(1);
                            $('#submit_user').show();
                            $('#select_localite').show();
                            $('#localite_name').hide(1);
                        }else{
                            //$("#submit_user").hide(1);
                        }
                        });                                        
                    });  
                    if(msg.success == "firstname")  
                    {
                        $('#prenom').empty(); {
                            $('#prenom').hide(1);
                            $('#submit_user').hide(1);
                            $('#select').show();
                            $('#localite_name').show();
                            $(".message").show("slow", function(){
                                $(this).addClass( "alert alert-danger alert-block" ).append("<div>"+msg.flash_message+"</div>");
                            }) 
                            $('#localite').val('');
                            $('#adresse').val('');
                            $('#tel').val('');
                            $('#natel').val('');
                            $('#email').val('');
                            $('#select').val('');
                            $('#select_localite').hide(1);
                            $.each(msg.value, function(item) {
                                $("#nom").val(msg.value[item].lastname);
                                $('#select').append($('<option>', { 
                                    value: msg.value[item].firstname,
                                    text : msg.value[item].firstname
                                }));
                                $('#select_localite').append($('<input type="text" class="form-control" id="localite" name="localite" value='+msg.value[item].cities+'>'));
            
                                $('#select').on('change', function() {                                    
                                    var prenom = $(this).children("option:selected").val();
                                    if (msg.value[item].firstname == prenom) {
                                        $("#nom").val(msg.value[item].lastname);
                                        $("#adresse").val(msg.value[item].address);
                                        $("#localite").val(msg.value[item].cities);
                                        $("#tel").val(msg.value[item].phone);
                                        $("#natel").val(msg.value[item].mobile);
                                        $("#email").val(msg.value[item].email);
                                        $("#hidden_id").html(msg.value[item].id);
                                        $('#submit').show();
                                        $('#localite_name').show();
                                        ('#submit').on('click', function(){
                                            $("#nom").val(msg.value[0].lastname);
                                            var id_contrat = $("#hidden_id").html();
                                            var url = '{{route("new_contract", ":id_contrat")}}';
                                            url = url.replace(':id_contrat', id_contrat);
                                            window.location.href=url;
                                        });
                                    }
                                });
                                
                            
                        });
                        }

                    } else {
                        $('#prenom').empty(); {
                            
                            $('#prenom').show();
                            $('#submit').show();
                            $('#select').hide(1);
                            $('#select_localite').hide(1);
                            $("#submit_user").hide(1);
                            $('#localite_name').show();
                            $("#prenom").val(msg.value[0].firstname);
                            $("#adresse").val(msg.value[0].address);
                            $("#localite").val(msg.value[0].cities);
                            $("#tel").val(msg.value[0].phone);
                            $("#natel").val(msg.value[0].mobile);
                            $("#email").val(msg.value[0].email);
                            $("#hidden_id").html(msg.value[0].id);
                            $('#submit').on('click',function(){
                                $("#nom").val(msg.value[0].lastname);
                                var id_contrat = $("#hidden_id").html();
                                var url = '{{route("new_contract", ":id_contrat")}}';
                                url = url.replace(':id_contrat', id_contrat);
                                window.location.href=url;
                            });
                        }
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