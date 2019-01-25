
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
                {{ Form::open(array('action' => 'inventoryController@create')) }}
                <div class="modal-body mx-3">


                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="brand_input">Marque</label>
                        {{ Form::Text('brand_input','',['class' => 'form-control validate']) }}
                        <input type="text" id="brand_input" class="form-control validate">
                    </div>

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="model_input">Modèle</label>
                        <input type="text" id="model_input" class="form-control validate">
                        {{ Form::Text('model_input','',['class' => 'form-control validate']) }}
                    </div>

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="size_input">Taille</label>
                        <input type="text" id="size_input" class="form-control validate">
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
                        <input type="text" id="cost_input" class="form-control validate">
                        {{ Form::Text('price_input','',['class' => 'form-control validate']) }}
                    </div>

                    <div class="md-form">
                        <label data-error="wrong" data-success="right" for="return_input">Retour</label>
                        <input type="text" id="return_input" class="form-control validate">
                        {{ Form::Text('return_input','',['class' => 'form-control validate']) }}
                    </div>
                    <div class="md-form">
                        <label data-error="wrong" data-success="right" for="type_input">Type</label>
                        <input type="text" id="type_input" class="form-control validate">
                        {{ Form::Text('type_input','',['class' => 'form-control validate']) }}
                    </div>
                    <div class="md-form">
                        <label data-error="wrong" data-success="right" for="stock_input">Stock</label>
                        <input type="text" id="stock_input" class="form-control validate">
                        {{ Form::Text('stock_input','',['class' => 'form-control validate']) }}
                    </div>
                    <div class="md-form">
                        <label data-error="wrong" data-success="right" for="serial_input">N° de série</label>
                        <input type="text" id="serial_input" class="form-control validate">
                        {{ Form::Text('serial_input','',['class' => 'form-control validate']) }}
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    {{Form::submit('Confirmer')}}
                    <button class="btn btn-unique" id="confirmButton">Confirmer</button>
                </div>
                {{ Form::close() }}
           </div>
       </div>
   </div>

   <div class="text-center">
       <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm">Ajouter un objet à l'inventaire</a>
   </div>


   <table style="width:100%" class="table">
       <thead class="thead-dark">
           <tr>
               <th>id</th>
               <th>nb</th>
               <th>brand</th>
               <th>model</th>
               <th>size</th>
               <th>category</th>
               <th>cost</th>
               <th>return</th>
               <th>type</th>
               <th>stock</th>
               <th>serial</th>
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
            </tr>
        @endforeach
    </table>
</div>

@endsection