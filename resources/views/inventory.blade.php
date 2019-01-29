
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
                {{ Form::open(array('url' => 'additem','method'=>'POST')) }}
                <div class="modal-body mx-3">

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="brand_input">Code</label>
                        {{ Form::Text('nb_input','',['class' => 'form-control validate']) }}
                    </div>

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="brand_input">Marque</label>
                        {{ Form::Text('brand_input','',['class' => 'form-control validate']) }}
                    </div>

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="model_input">Modèle</label>
                        {{ Form::Text('model_input','',['class' => 'form-control validate']) }}
                    </div>

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="size_input">Taille</label>
                        {{ Form::Text('size_input','',['class' => 'form-control validate']) }}
                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="category_input">Categorie</label>
                        <select name="category_input">
                            <option selected disabled>Séléctionner catégorie</option>
                            @foreach($cats as $cat)

                                <option value="{{$cat->id}}">{{ $cat->description  }}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="cost_input">Prix</label>
                        {{ Form::Text('price_input','',['class' => 'form-control validate']) }}
                    </div>

                    <div class="md-form">
                        <label data-error="wrong" data-success="right" for="return_input">Retour</label>
                        {{ Form::Text('return_input','',['class' => 'form-control validate']) }}
                    </div>
                    <div class="md-form">
                        <label data-error="wrong" data-success="right" for="type_input">Type</label>
                        {{ Form::Text('type_input','',['class' => 'form-control validate']) }}
                    </div>
                    <div class="md-form">
                        <label data-error="wrong" data-success="right" for="stock_input">Stock</label>
                        {{ Form::Text('stock_input','',['class' => 'form-control validate']) }}
                    </div>
                    <div class="md-form">
                        <label data-error="wrong" data-success="right" for="serial_input">N° de série</label>
                        {{ Form::Text('serial_input','',['class' => 'form-control validate']) }}
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    {{ Form::submit('Confirmer')}}
                </div>
                {{ Form::close() }}
           </div>
       </div>
   </div>

   <div class="text-center">
       <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm">Ajouter un objet à l'inventaire</a>
   </div>


   <table style="width:100%" class="table" id="inventoryTable">
       <thead class="thead-dark">
           <tr>
               <th>ID</th>
               <th>Code</th>
               <th>Marque</th>
               <th>Modèle</th>
               <th>Taille</th>
               <th>Categorie</th>
               <th>Couts</th>
               <th>Retour</th>
               <th>Type</th>
               <th>Stock</th>
               <th>N°série</th>
               <th>Voir</th>
               <th>Supprimer</th>
           </tr>
       </thead>
       @foreach($items as $item )

           <tr>
               <td>{{ $item->id }}</td>
                <td>{{ $item->itemnb }}</td>
                <td>{{ $item->brand }}</td>
                <td>{{ $item->model }}</td>
                <td>{{ $item->size }}</td>
                <td>{{ $item->category->description}}</td>
                <td>{{ $item->cost }}</td>
                <td>{{ $item->return }}</td>
                <td>{{ $item->type }}</td>
                <td>{{ $item->stock }}</td>
               <td>{{ $item->serialnumber }}</td>
               <td align="center"><a href="item/{{ $item->id }}"><img src="assets/images/preview_icon.png" class="icon"></a></td>
               <td align="center"><a href="deleteitem/{{ $item->id }}" onclick="return confirm('Etes-vous sûr ?')"><img src="assets/images/delete_icon.png" class="icon"></a></td>
            </tr>
        @endforeach
    </table>
</div>
<script>
    $(document).ready( function () {
        $('#inventoryTable').DataTable({
            "processing": true,
            "language": {
                "lengthMenu": "Afficher _MENU_ résultats par page",
                "zeroRecords": "Aucun résultat",
                "info": "Page _PAGE_/_PAGES_",
                "infoEmpty": "Aucun enregistrement",
                "infoFiltered": "(filté sur _MAX_ enregistrements)",
                "search": "Recherche",
                "paginate": {
                    "first":      "Première",
                    "last":       "Dernière",
                    "next":       "Suivante",
                    "previous":   "Précédente"
                }
            }
        });
    } );</script>
@endsection