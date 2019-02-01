$(document).ready(function() {
    $('.message').hide(1);
    $('#select').hide(1);
    $('#submit').hide(1);
    $('#localite_name').hide(1);
    $('#nom').keyup(function() {
        $('#submit_user').show();
    });

    
    if($('#nom').empty()) { $('#submit_user').hide(1); $('#user_update').hide(1); }
    // On click, send data of new customer to route and then controller create the new customer
    $('#submit_user').on('click', function(){
        var formData = {
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
            url: 'locations/client',
            data: formData,
            datatype: "json",
            success: function(value){
                // What to do if we succeed
                $('.alert alert-success li').text(value.success);
                //location.reload(true)
            },
            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });

    });

var lastname = new Bloodhound({
datumTokenizer: Bloodhound.tokenizers.whitespace,
queryTokenizer: Bloodhound.tokenizers.whitespace,
// url points to a json file that contains an array of last names, see
prefetch: 'locations/autocomplete_lastname'
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
$('#scrollable-dropdown-menu #nom').typeahead(/* pass in your datasets and initialize the typeahead */).on('typeahead:select', function(){
        var nom = $("#nom").val();       
            $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: 'locations',
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
                    $('#select').empty();
                    $('.table').empty();
                    $("#submit").hide(1);
                    $('#submit_user').show();
                    $('#user_update').hide(1);
                    $('#select_localite').show();
                    $('#select_localite').prop('selectedIndex',0);
                    $('#localite_name').hide(1);
                }
                });                                        
            });
            // Goes through scenario "lastnames with multiple firstnames"
            if(msg.success == "firstname")  
            {
                $('#prenom').empty();
                $('#prenom').hide(1);
                $('#submit_user').hide(1);
                $('#select').show();
                $('.table').empty();
                //Show message error for multiple firstnames
                $(".message").show("slow", function(){
                    $(this).addClass( "alert alert-danger alert-block" ).append("<div>"+msg.flash_message+"</div>");
                }); 
                $('#localite').val('');
                $('#adresse').val('');
                $('#tel').val('');
                $('#natel').val('');
                $('#email').val('');
                $('#select').val('');
                // Loop that gives the corect data
                $.each(msg.value, function(item) {
                    $("#nom").val(msg.value[item].lastname);
                    $('#select').append($('<option>', { 
                        value: msg.value[item].firstname,
                        text : msg.value[item].firstname
                    }));
                    $('#select_localite').append($('<input type="text" class="form-control" id="localite" name="localite" value='+msg.value[item].cities+'>'));
                    //Trigger event on change when firstname selected
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
                            $("#hidden_id").val(msg.value[item].id);
                            $('#submit').show();
                            $('#user_update').show();
                            //Check if array empty
                            if(msg.value[item].contracts == '')
                            {
                                $('.table').append('<h3><p class="text-warning">Pas de contrat...</p></h3>');
                            }else {
                                $('.table').append('<thead class="thead-dark"><tr><th>No contrat</th><th>Conclu le</th><th>Retour prévu</th><th>Retour effectif</th><th>Retourné ?</th></tr></thead>');
                            }
                            $.each(msg.value[item].contracts, function(id) {
                                //Format date with library moment.js (Day Month Year)
                                if (msg.value[item].contracts[id].creationdate != null) { var creationdate = moment(msg.value[item].contracts[id].creationdate, 'YYYY-MM-DD HH:mm:ss').format('DD MMM YYYY'); } else { var creationdate = ''; }
                                if (msg.value[item].contracts[id].plannedreturn != null) {var plannedreturn = moment(msg.value[item].contracts[id].plannedreturn, 'YYYY-MM-DD HH:mm:ss').format('DD MMM YYYY'); } else { var plannedreturn = ''; }
                                if (msg.value[item].contracts[id].effectivereturn != null) { var effectivereturn = moment(msg.value[item].contracts[id].plannedreturn, 'YYYY-MM-DD HH:mm:ss').format('DD MMM YYYY'); } else { var effectivereturn = '';}
                                
                                //Check if returned in time 
                                if (moment(plannedreturn).isBefore(moment().format('DD MMM YYYY')) || effectivereturn == '') {
                                    $(".table thead").after("<tbody><tr><td>"+msg.value[item].contracts[id].ID_Contrat+"</td><td>"+creationdate+"</td><td>"+plannedreturn+"</td><td></td><td><p class='text-warning'>Non</p></td><td><button class='btn btn-outline-dark' type='submit' id='showContrat' name='showContrat' value="+msg.value[item].contracts[id].ID_Contrat+">Voir contrat</button></td></tr></tbody>");
                                } else {
                                    $(".table thead").after("<tbody><tr><td>"+msg.value[item].contracts[id].ID_Contrat+"</td><td>"+creationdate+"</td><td>"+plannedreturn+"</td><td>"+effectivereturn+"</td><td><p class='text-primary'>Oui</p></td><td><button class='btn btn-outline-dark' type='submit' id='showContrat' name='showContrat' value="+msg.value[item].contracts[id].ID_Contrat+">Voir contrat</button></td></tr></tbody>");
                                }
                            });
                            $('#submit').on('click', function(){
                                $("#nom").val(msg.value[item].lastname);
                            });                              
                            // Ajax request with data to update in controller
                            $('#user_update').on('click', function(){
                                $("#nom").val(msg.value[item].lastname);
                                var formData = {
                                    'id' : $("#hidden_id").val(),
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
                                        url: 'locations/client/update',
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
                            // Ajax request with data to show in controller
                            $('#showContrat').on('click', function(){
                                
                                var idContrat = $('#showContrat').val();
                                    $.ajax({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        type: "POST",
                                        url: 'locations/contract/show',
                                        data: idContrat,
                                        datatype: "json",
                                        success: function(value){
                                            // What to do if we succeed
                                            $('.alert alert-success li').text(value.success);
                                            //location.reload(true)
                                                
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
            // Normal scenario
            } else {
                $('#prenom').empty();
                    $('.message').empty();
                    $('.table').empty();
                    $('.message').hide(1);
                    $('#prenom').show();
                    $('#submit').show();
                    $('#select').hide(1);
                    $('#submit_user').hide(1);
                    $('#user_update').show();
                    $("#prenom").val(msg.value[0].firstname);
                    $("#nom").val(msg.value[0].lastname);
                    $("#adresse").val(msg.value[0].address);
                    if (msg.value[0].cities != null) { $("#select_localite").val(msg.value[0].cities.id); }
                    $("#tel").val(msg.value[0].phone);
                    $("#natel").val(msg.value[0].mobile);
                    $("#email").val(msg.value[0].email);
                    $("#hidden_id").val(msg.value[0].id);
                    if(msg.value[0].contracts == '')
                    {
                        $('.table').append('<h3><p class="text-warning">Pas de contrat...</p></h3>');
                    }else {
                        $('.table').append('<thead class="thead-dark"><tr><th>No contrat</th><th>Conclu le</th><th>Retour prévu</th><th>Retour effectif</th><th>Retourné ?</tr></thead>');
                    }
                    $.each(msg.value[0].contracts, function(id) {

                        //Format date with library moment.js (Day Month Year)
                        if (msg.value[0].contracts[id].creationdate != null) { var creationdate = moment(msg.value[0].contracts[id].creationdate, 'YYYY-MM-DD HH:mm:ss').format('DD MMM YYYY'); } else { var creationdate = ''; }
                        if (msg.value[0].contracts[id].plannedreturn != null) { var plannedreturn = moment(msg.value[0].contracts[id].plannedreturn, 'YYYY-MM-DD HH:mm:ss').format('DD MMM YYYY'); } else { var plannedreturn = ''; }
                        if (msg.value[0].contracts[id].effectivereturn != null) { var effectivereturn = moment(msg.value[0].contracts[id].plannedreturn, 'YYYY-MM-DD HH:mm:ss').format('DD MMM YYYY'); } else { var effectivereturn = '';}

                        //Check if returned in time 
                        if (moment(plannedreturn).isBefore(moment().format('DD MMM YYYY')) || effectivereturn == '') {
                                $(".table thead").after("<tbody><tr><td>"+msg.value[0].contracts[id].ID_Contrat+"</td><td>"+creationdate+"</td><td>"+plannedreturn+"</td><td></td><td><p class='text-warning'>Non</p></td><td><button class='btn btn-outline-dark' type='submit' id='showContrat' name='showContrat' value="+msg.value[0].contracts[id].ID_Contrat+">Voir contrat</button></td></tr></tbody>");
                        } else {
                                $(".table thead").after("<tbody><tr><td>"+msg.value[0].contracts[id].ID_Contrat+"</td><td>"+creationdate+"</td><td>"+plannedreturn+"</td><td>"+effectivereturn+"</td><td><p class='text-primary'>Oui</p></td><td><button class='btn btn-outline-dark' type='submit' id='showContrat' name='showContrat' value="+msg.value[0].contracts[id].ID_Contrat+">Voir contrat</button></td></tr></tbody>");
                        }
                    
                    $('#submit').on('click', function(){
                        $("#nom").val(msg.value[0].lastname);
                    });
                    
                    // On click, send id to route and then the controller which update the customer info
                    $('#user_update').on('click', function(){
                        $("#nom").val(msg.value[0].lastname);
                        var formData = {
                            'id' : $("#hidden_id").val(),
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
                            url: 'locations/client/update',
                            data: formData,
                            datatype: "json",
                            success: function(value){

                                $('.alert alert-success li').text(value.success);
                                location.reload(true)
                                
                            },
                            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                                console.log(JSON.stringify(jqXHR));
                                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                            }
                        });

                    });
                     // Ajax request with data to show in controller
                     $('#showContrat').on('click', function(){
                            //$('#showContrat').text('');
                            var idContrat = $('#showContrat').val(msg.value[0].contracts[id].ID_Contrat);
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: "POST",
                                url: 'locations/contract/show',
                                data: idContrat,
                                datatype: "json",
                                success: function(value){
                                    // What to do if we succeed
                                    $('.alert alert-success li').text(value.success);
                                    //location.reload(true)
                                        
                                },
                                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                                    console.log(JSON.stringify(jqXHR));
                                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                }
                            });
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