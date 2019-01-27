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
            $('#user_update').hide(1);
            $('#nom').keyup(function() {
                $('#submit_user').show();
            });
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
        

        //Get the value input when a value is selected on dropdown from the autocomplete
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
                    // Event starts everytime a key is pressed in the input
                    $('#nom').keyup(function() {
                        var nom_test = $("#nom").val();
                        $.each(msg.value, function(index) {
                        // Check if value input is in the database
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
                            $('#user_update').hide(1);
                            $('#select_localite').show();
                            $('#localite_name').hide(1);
                        }else{
                            //$("#submit_user").hide(1);
                        }
                        });                                        
                    });
                    // Goes through scenario "lastnames with multiple firstnames"
                    if(msg.success == "firstname")  
                    {
                        $('#prenom').empty(); {
                            $('#prenom').hide(1);
                            $('#submit_user').hide(1);
                            $('#select').show();
                            $('.table').empty();
                            $(".message").show("slow", function(){
                                $(this).addClass( "alert alert-danger alert-block" ).append("<div>"+msg.flash_message+"</div>");
                            }) 
                            $('#localite').val('');
                            $('#adresse').val('');
                            $('#tel').val('');
                            $('#natel').val('');
                            $('#email').val('');
                            $('#select').val('');
                            $('#user_update').hide(1);
                            // Loop that gives the corect data
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
                                        $('.table').empty();
                                        $("#nom").val(msg.value[item].lastname);
                                        $("#prenom").val(msg.value[item].firstname);
                                        $("#adresse").val(msg.value[item].address);
                                        if (msg.value[item].cities != null){ $("#select_localite").val(msg.value[item].cities.id); }
                                        $("#tel").val(msg.value[item].phone);
                                        $("#natel").val(msg.value[item].mobile);
                                        $("#email").val(msg.value[item].email);
                                        $("#hidden_id").html(msg.value[item].id);
                                        $('#submit').show();
                                        $('#user_update').show();
                                        $('.table').append('<thead class="thead-dark"><tr><td>No contrat</td><td>Conclu le</td><td>Pos</td><td>Retour prévu</td><td>Retour effectif</td></tr></thead>');
                                            $.each(msg.value[item].contracts, function(id) {
                                                $('.table tr:first').append('<tbody');
                                                    $(".table tr:last").after("<tr><td>"+msg.value[item].contracts[id].ID_Contrat+"</td><td>"+msg.value[item].contracts[id].creationdate+"</td><td>"+msg.value[item].contracts[id]+"</td><td>"+msg.value[item].contracts[id].plannedreturn+"</td><td>"+msg.value[item].contracts[id].effectivereturn+"</td></tr>");

                                            });
                                            $('#submit').on('click', function(){
                                                $("#nom").val(msg.value[item].lastname);
                                            });                              
                                        $('#submit_user').on('click', function(){
                                          $("#nom").val(msg.value[item].lastname);
                                          var formData = {
                                                'id' : $("#hidden_id").html(),
                                                'lastname' : $("#nom").val(),
                                                'firstname' : $("#prenom").val(),
                                                'address' : $("#adresse").val(),
                                                'city_id' : $("#select_localite").val(),
                                                'phone' : $("#tel").val(),
                                                'mobile' : $("#natel").val(),
                                                'email' : $("#email").val(),
                                            };
                                          $.ajax({
                                            headers: {
                                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                            type: "POST",
                                            url: '{{route('create_user')}}',
                                            data: formData,
                                            datatype: "json",
                                            success: function(){
                                                // What to do if we succeed
                                                $('.alert alert-success li').text(value.success);
                                                location.reload(true)
                                            },
                                            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                                              console.log(JSON.stringify(jqXHR));
                                              console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                            }
                                            });

                                          });
                                          $('#user_update').on('click', function(){
                                            $("#nom").val(msg.value[item].lastname);
                                            var formData = {
                                                'id' : $("#hidden_id").html(),
                                                'lastname' : $("#nom").val(),
                                                'firstname' : $("#prenom").val(),
                                                'address' : $("#adresse").val(),
                                                'city_id' : $("#select_localite").val(),
                                                'phone' : $("#tel").val(),
                                                'mobile' : $("#natel").val(),
                                                'email' : $("#email").val(),
                                            };
                                            $.ajax({
                                                headers: {
                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                },
                                                type: "POST",
                                                url: '{{route('update')}}',
                                                data: formData,
                                                datatype: "json",
                                                success: function(value){
                                                    // What to do if we succeed
                                                    $('.alert alert-success li').text(value.success);
                                                    location.reload(true)
                                                    
                                                },
                                                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                                                    console.log(JSON.stringify(jqXHR));
                                                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                                }
                                            });

                                        });
                                    }
                                });
                                
                            
                        });
                        }
                    // Normal scenario
                    } else {
                        $('#prenom').empty();
                            $('.message').empty();
                            $('.table').empty();
                            $('.message').hide(1);
                            $('#prenom').show();
                            $('#submit').show();
                            $('#select').hide(1);
                            $("#submit_user").hide(1);
                            $('#user_update').show();
                            $("#prenom").val(msg.value[0].firstname);
                            $("#nom").val(msg.value[0].lastname);
                            $("#adresse").val(msg.value[0].address);
                            if (msg.value[0].cities != null) { $("#select_localite").val(msg.value[0].cities.id); }
                            $("#tel").val(msg.value[0].phone);
                            $("#natel").val(msg.value[0].mobile);
                            $("#email").val(msg.value[0].email);
                            $("#hidden_id").html(msg.value[0].id);
                            $('.table').append('<thead class="thead-dark"><tr><td>No contrat</td><td>Conclu le</td><td>Pos</td><td>Retour prévu</td><td>Retour effectif</td></tr></thead>');
                            $.each(msg.value[0].contracts, function(id) {
                                $('.table tr:first').append('<tbody');
                                    $(".table tr:last").after("<tr><td>"+msg.value[0].contracts[id].ID_Contrat+"</td><td>"+msg.value[0].contracts[id].creationdate+"</td><td>"+msg.value[0].contracts[id]+"</td><td>"+msg.value[0].contracts[id].plannedreturn+"</td><td>"+msg.value[0].contracts[id].effectivereturn+"</td></tr>");

                            });
                            $('#submit').on('click', function(){
                                $("#nom").val(msg.value[0].lastname);
                            });
                            // On click, send data of new customer to route and then controller create the new customer
                            $('#submit_user').on('click', function(){
                                $("#nom").val(msg.value[0].lastname);
                                var formData = {
                                'id' : $("#hidden_id").html(),
                                'lastname' : $("#nom").val(),
                                'firstname' : $("#prenom").val(),
                                'address' : $("#adresse").val(),
                                'city_id' : $("#select_localite").val(),
                                'phone' : $("#tel").val(),
                                'mobile' : $("#natel").val(),
                                'email' : $("#email").val(),
                                };
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    type: "POST",
                                    url: '{{route('create_user')}}',
                                    data: formData,
                                    datatype: "json",
                                    success: function(){
                                        // What to do if we succeed
                                        $('.alert alert-success li').text(value.success);
                                        location.reload(true)
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                                        console.log(JSON.stringify(jqXHR));
                                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                    }
                                });

                            });
                            // On click, send id to route and then the controller which update the customer info
                            $('#user_update').on('click', function(){
                                $("#nom").val(msg.value[0].lastname);
                                var formData = {
                                    'id' : $("#hidden_id").html(),
                                    'lastname' : $("#nom").val(),
                                    'firstname' : $("#prenom").val(),
                                    'address' : $("#adresse").val(),
                                    'city_id' : $("#select_localite").val(),
                                    'phone' : $("#tel").val(),
                                    'mobile' : $("#natel").val(),
                                    'email' : $("#email").val(),
                                };
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    type: "POST",
                                    url: '{{route('update')}}',
                                    data: formData,
                                    datatype: "json",
                                    success: function(value){
                                        console.log(value.success)
                                        $('.alert alert-success li').text(value.success);
                                        location.reload(true)
                                        
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                                        console.log(JSON.stringify(jqXHR));
                                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                    }
                                });

                            });
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