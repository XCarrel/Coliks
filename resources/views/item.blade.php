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
    <table style="width:100%" class="table" id="inventoryTable">
        <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>#</th>
        </tr>
        </thead>
            <tr>
                <td>ID</td>
                <td>{{ $item->id }}</td>
            </tr>
            <tr>
                <td>Code</td>
                <td>{{ $item->itemnb }}</td>
            </tr>
            <tr>
                <td>Marque</td>
                <td>{{ $item->brand }}</td>
            </tr>
            <tr>
                <td>Modèle</td>
                <td>{{ $item->model }}</td>
            </tr>
            <tr>
                <td>Catégorie</td>
                <td>{{ $item->category->description }}</td>
            </tr>
            <tr>
                <td>Prix</td>
                <td>{{ $item->cost }}</td>
            </tr>
            <tr>
                <td>Retour</td>
                <td>{{ $item->return }}</td>
            </tr>
            <tr>
                <td>Type</td>
                <td>{{ $item->type }}</td>
            </tr>
            <tr>
                <td>Stock</td>
                <td>{{ $item->stock }}</td>
            </tr>
            <tr>
                <td>N° de série</td>
                <td>{{ $item->serial }}</td>
            </tr>
         </table>
@endsection
