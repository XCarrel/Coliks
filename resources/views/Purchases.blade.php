@extends('layout')

@section('content')
    <?php
    //bar to show information if needed
    if (Session::get('status'))
    {
        echo '<div class="alert '.Session::get('class').'">';
        echo Session::get('status');
        echo '</div>';
    }
    ?>
    <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Nouveau bon de réduction</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(array('url' => 'addpurch','method'=>'POST')) }}
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        
                        <td>ID</td>
                        <td>{{ $purchase->id }}</td>

                    </div>

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="date_input">date</label>

                        {{ Form::Text('date_input','',['class' => 'form-control validate']) }}
                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="description_input">description</label>

                        {{ Form::Text('description_input','',['class' => 'form-control validate']) }}
                    </div>



                    <div class="md-form">
                        <label data-error="wrong" data-success="right" for="amount_input">amount</label>
                        {{ Form::Text('amount_input','',['class' => 'form-control validate']) }}
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
        <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm">Create a gift card</a>
    </div>
    <table style="width:100%" class="table" id=PurchasesTable"">
        <thead class="thead-dark">
        <tr>

            <th>date</th>
            <th>description</th>
            <th>amount</th>

        </tr>
        </thead>

        @foreach($purchases->sortByDesc('date') as $purchase )
            <tr data-entry-id ="{{$purchase->id }}">


                <td>{{ $purchase->date }}</td>
                <td>{{ $purchase->description }}</td>
                <td>{{ $purchase->amount }}</td>
            </tr>
        @endforeach
    </table>
    <script>
        $(document).ready( function () {
            $('#PurchasesTable').DataTable({
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