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
        <a href="#" class="btn btn-default btn-rounded mb-4 data" onclick="revealform();">Modifier</a>
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
        {{ Form::open(array('url' => 'updateitem','method'=>'POST')) }}
            <tr>
                <td>ID</td>
                <td>{{ $item->id }}</td>
                <input hidden name="iditem" value="{{ $item->id }}">
            </tr>
            <tr>
                <td>Code</td>
                <td  class="data">{{ $item->itemnb }}</td>
                <td class="input">{{ Form::Text('nb_input',$item->itemnb,['class' => 'form-control validate']) }}</td>
            </tr>
            <tr>
                <td>Marque</td>
                <td  class="data">{{ $item->brand }}</td>
                <td class="input">{{ Form::Text('brand_input',$item->brand,['class' => 'form-control validate']) }}</td>
            </tr>
            <tr>
                <td>Modèle</td>
                <td  class="data">{{ $item->model }}</td>
                <td class="input">{{ Form::Text('model_input',$item->model,['class' => 'form-control validate']) }}</td>
            </tr>
            <tr>
                <td>Catégorie</td>
                <td  class="data">{{ $item->category->description }}</td>
                <td class="input">
                    <select name="category_input">
                        @foreach($cats as $cat)

                            <option {{ $item->category->id == $cat->id ? 'selected' : '' }} value="{{$cat->id}}">{{ $cat->description  }}</option>

                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Prix</td>
                <td  class="data">{{ $item->cost }}</td>
                <td class="input">{{ Form::Text('cost_input',$item->cost,['class' => 'form-control validate']) }}</td>
            </tr>
            <tr>
                <td>Retour</td>
                <td  class="data">{{ $item->return }}</td>
                <td class="input">{{ Form::Text('return_input',$item->return,['class' => 'form-control validate']) }}</td>
            </tr>
            <tr>
                <td>Type</td>
                <td  class="data">{{ $item->type }}</td>
                <td class="input">{{ Form::Text('type_input',$item->type,['class' => 'form-control validate']) }}</td>
            </tr>
            <tr>
                <td>Stock</td>
                <td class="data">{{ $item->stock }}</td>
                <td class="input">{{ Form::Text('stock_input',$item->stock,['class' => 'form-control validate']) }}</td>
            </tr>
            <tr>
                <td>N° de série</td>
                <td class="data">{{ $item->serialnumber }}</td>
                <td class="input">{{ Form::Text('serial_input',$item->serialnumber,['class' => 'form-control validate']) }}</td>
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
