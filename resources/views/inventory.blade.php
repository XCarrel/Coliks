
@extends('layout')

@section('content')

<div>

    id	nb	brand	model	size	category	cost	return	type	stock	serial
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
                <div class="modal-body mx-3">
                    <input id='_token' hidden value='<?php echo csrf_token() ?>'>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="brand_input">Marque</label>
                        <input type="text" id="brand_input" class="form-control validate">
                    </div>

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="model_input">Modèle</label>
                        <input type="text" id="model_input" class="form-control validate">
                    </div>

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="size_input">Taille</label>
                        <input type="text" id="size_input" class="form-control validate">
                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="category_input">Categorie</label>
                        <select id="category_input">
                            <option selected>Séléctionner catégorie</option>
                            @foreach($cats as $cat)

                                <option>{{ $cat->description  }}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="cost_input">Prix</label>
                        <input type="text" id="cost_input" class="form-control validate">
                    </div>

                    <div class="md-form">
                        <label data-error="wrong" data-success="right" for="return_input">Retour</label>
                        <input type="text" id="return_input" class="form-control validate">
                    </div>
                    <div class="md-form">
                        <label data-error="wrong" data-success="right" for="type_input">Type</label>
                        <input type="text" id="type_input" class="form-control validate">
                    </div>
                    <div class="md-form">
                        <label data-error="wrong" data-success="right" for="stock_input">Stock</label>
                        <input type="text" id="stock_input" class="form-control validate">
                    </div>
                    <div class="md-form">
                        <label data-error="wrong" data-success="right" for="serial_input">N° de série</label>
                        <input type="text" id="serial_input" class="form-control validate">
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-unique" id="confirmButton">Confirmer</button>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm">Ajouter un objet à l'inventaire</a>
    </div>


    <table style="width:100%">
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

        @foreach($items as $item )

            <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->itemnb }}</td>
            <td>{{ $item->brand }}</td>
            <td>{{ $item->model }}</td>
            <td>{{ $item->size }}</td>
            <td>{{ $item->category}}</td>
            <td>{{ $item->cost }}</td>
            <td>{{ $item->return }}</td>
            <td>{{ $item->type }}</td>
            <td>{{ $item->stock }}</td>
            <td>{{ $item->serialnumber }}</td>
            </tr>
        @endforeach
    </table>
</div>

<script>
    $(document).ready(function() {

        $('#confirmButton').click(function () {
            addItem();
            console.log('someone clicked !')
        })

        function addItem() {
            // Variable to hold request
            var request;
            // Let's select and cache all the fields
            var $confirm_button = $('#confirmButton');
            // Let's disable the inputs for the duration of the Ajax request.
            $confirm_button.prop("disabled", true);
            // Fire off the request to /form.php
            request = $.ajax({
                url: '/additem',
                type: 'POST',
                data: {


                    brand: $('#brand_input ').text(),
                    model: $('#model_input ').text(),
                    size: $('#size_input ').text(),
                    category: $('#category_input ').val(),
                    cost: $('#cost_input ').text(),
                    return: $('#return_input ').text(),
                    type: $('#type_input ').text(),
                    stock: $('#stock_input ').text(),
                    serialnumber: $('#serial_input ').text(),
                    _token: $('#_token').val()
                }
            });
            console.log('sent!')
            // Callback handler that will be called on success
            request.done(function () {


            });
            // Callback handler that will be called on failure
            request.fail(function (jqXHR, textStatus, errorThrown) {
                // Show error in a message box

                    //alert(message: jqXHR.responseText);
                });

            // Callback handler that will be called regardless
            // if the request failed or succeeded
            request.always(function () {
                // Reenable the inputs
                $confirm_button.prop("disabled", false);
            });
        }
    });
</script>
@endsection