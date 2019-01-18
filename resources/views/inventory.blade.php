<?php
use App\Http\Controllers\inventoryController;
?>
@extends('layout')

@section('content')
<?php $items =  inventoryController::testDB(); ?>
<div>
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
            {{dd($item)}}
            <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->itemnb }}</td>
            <td>{{ $item->brand }}</td>
            <td>{{ $item->model }}</td>
            <td>{{ $item->size }}</td>
            <td>{{ $item->categories['description']}}</td>
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