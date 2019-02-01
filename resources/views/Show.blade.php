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
            <th>Infos</th>
        </tr>
        </thead>
        <tbody>
        {{ Form::open(array('url' => 'updatecust','method'=>'POST')) }}
        <tr>
            <td>ID</td>
            <td>{{ $customer->id }}</td>
            <input hidden name="idcust" value="{{ $customer->id }}">
        </tr>
        <tr>
            <td>lastname</td>
            <td  class="data">{{ $customer->lastname }}</td>
            <td class="input">{{ Form::Text('lastname_input',$customer->lastname,['class' => 'form-control validate']) }}</td>
        </tr>
        <tr>
            <td>firstname</td>
            <td  class="data">{{ $customer->firstname }}</td>
            <td class="input">{{ Form::Text('firstname_input',$customer->firstname,['class' => 'form-control validate']) }}</td>
        </tr>
        <tr>
            <td>address</td>
            <td  class="data">{{ $customer->address }}</td>
            <td class="input">{{ Form::Text('address_input',$customer->address,['class' => 'form-control validate']) }}</td>
        </tr>


        <tr>
            <td>phone</td>
            <td  class="data">{{ $customer->phone }}</td>
            <td class="input">{{ Form::Text('phone_input',$customer->phone,['class' => 'form-control validate']) }}</td>
        </tr>
        <tr>
            <td>email</td>
            <td  class="data">{{ $customer->email }}</td>
            <td class="input">{{ Form::Text('email_input',$customer->email,['class' => 'form-control validate']) }}</td>
        </tr>
        <tr>
            <td>mobile</td>
            <td class="data">{{ $customer->mobile }}</td>
            <td class="input">{{ Form::Text('mobile_input',$customer->mobile,['class' => 'form-control validate']) }}</td>
        </tr>

        </tbody>
    </table>
    <button type="submit" class="input btn btn-primary">Confirmer</button>

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