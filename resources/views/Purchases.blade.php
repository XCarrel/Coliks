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
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{{dd(Session::get('success'))}}</li>
            </ul>
        </div>
    @endif
    <div class="text-center">
        <a href="#" class="btn btn-default btn-rounded mb-4" onclick="revealform();">Modifier</a>
        <a href="#" class="btn btn-default btn-rounded mb-4 input" onclick="revealform();">Annuler</a>
    </div>
    <table style="width:100%" class="table" id="inventoryTable">
        <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Achat</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>ID</td>
            <td>{{ $purchase->id }}</td>
        </tr>
        <tr>
            <td>customer_id</td>
            <td  class="data">{{ $purchase->customer_id }}</td>

        </tr>
        <tr>
            <td>date</td>
            <td  class="data">{{ $purchase->date }}</td>

        </tr>
        <tr>
            <td>description</td>
            <td  class="data">{{ $purchase->description }}</td>

        </tr>


        <tr>
            <td>amount</td>
            <td  class="data">{{ $purchase->amount }}</td>

        </tr>


        </tr>

        </tbody>
    </table>


    {{ Form::close()  }}
    <script>
        $(document).ready( function () {
            $('.input').toggle();
        });
        function revealform()
        {
            $('.data').toggle();
            $('.input').toggle();
        }
    </script>
@endsection