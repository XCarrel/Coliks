<?php
use App\Http\Controllers\inventoryController;
?>
@extends('layout')

@section('content')
<?php $cats =  inventoryController::testDB(); ?>
<div>
    <table style="width:100%">
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Age</th>
        </tr>
        @foreach($cats as $cat )
            <td>{{ $cat->description }}</td>
        @endforeach
    </table>
</div>

@endsection