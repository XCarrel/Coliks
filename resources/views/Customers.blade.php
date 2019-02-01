@extends('layout')

@section('content')

    <div>

        <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Ajouter</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   {{ Form::open(array('action' => 'CustomersController@create')) }}
                    <div class="modal-body mx-3">

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="lastname_input">lastname</label>
                            {{ Form::Text('lastname_input','',['class' => 'form-control validate']) }}

                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="firstname_input">firstname</label>

                            {{ Form::Text('firstname_input','',['class' => 'form-control validate']) }}
                        </div>
                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="address_input">address</label>

                            {{ Form::Text('address_input','',['class' => 'form-control validate']) }}
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="category_input">city</label>
                            <select name="city_input">
                                <option selected disabled>Select a city</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{ $city->name  }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="md-form">
                            <label data-error="wrong" data-success="right" for="return_input">phone</label>

                            {{ Form::Text('phone_input','',['class' => 'form-control validate']) }}
                        </div>
                        <div class="md-form">
                            <label data-error="wrong" data-success="right" for="type_input">email</label>

                            {{ Form::Text('email_input','',['class' => 'form-control validate']) }}
                        </div>
                        <div class="md-form">
                            <label data-error="wrong" data-success="right" for="stock_input">mobile</label>

                            {{ Form::Text('mobile_input','',['class' => 'form-control validate']) }}
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        {{Form::submit('Confirmer')}}

                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm">Ajouter un nouveau client</a>
        </div>


        <table style="width:100%" class="table">
            <thead class="thead-dark">
            <tr>
                <th>id</th>
                <th>lastname</th>
                <th>firstname</th>
                <th>address</th>
                <th>city_id</th>
                <th>phone</th>
                <th>email</th>
                <th>mobile</th>
            </tr>
            </thead>

            @foreach($customers as $customer )
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->lastname }}</td>
                    <td>{{ $customer->firstname }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->city_id }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->mobile }}</td>
                    <td><a href="Show/{{ $customer->id }}"><img src="public/assets/images/preview-icon.png" class="icon"></a></td>
                    <td><a href="deletecust/{{ $customer->id }}" onclick="return confirm('Are you sure?')"><img src="public/assets/images/delete_icon.png" class="icon"></a></td>
                </tr>
            @endforeach
        </table>
    </div>
    <script>
        $(document).ready( function () {
            $('#inventoryTable').DataTable({
                "sProcessing":     "Traitement en cours...",
                "sSearch":         "Rechercher&nbsp;:",
                "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
                "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                "sInfoPostFix":    "",
                "sLoadingRecords": "Chargement en cours...",
                "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
                "oPaginate": {
                    "sFirst":      "Premier",
                    "sPrevious":   "Pr&eacute;c&eacute;dent",
                    "sNext":       "Suivant",
                    "sLast":       "Dernier"
                },
                "oAria": {
                    "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                },
                "select": {
                    "rows": {
                        _: "%d lignes séléctionnées",
                        0: "Aucune ligne séléctionnée",
                        1: "1 ligne séléctionnée"
                    }
                }
            });
        } );</script>
@endsection