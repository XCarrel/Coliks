@extends('layout')

@section('content')

    @if(count($locations) > 0)
        <h3>Location{{ count($locations) > 1 ? 's' : ''   }} {{ $item->brand }} {{ $item->model }} </h3>
        <p>Bénéfices de ce produit : {{$benefit}}</p>

        @foreach($locations as $key => $location)

        <table style="width:100%" class="table" id="locationTable">
            <thead class="thead-dark">
            <tr>
                <th>Contrat #{{ $key+1 }}</th>
                <th>Infos</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>ID location</td>
                <td>{{ $location->id }}</td>

            </tr>
            <tr>
                <td>Description</td>
                <td>{{ $location->description  }}</td>
            </tr>
            <tr>
                <td>Notes du contrat</td>
                <td>{{ isset($location->contracts) && $location->contracts['notes'] != ''  ? $location->contracts['notes'] : 'Aucune' }}</td>
            </tr>
            <tr>
                <td>Prix</td>
                <td>{{  $location->price }}</td>
            </tr>
            <tr>
                <td>Date de location</td>
                <td>{{ isset($location->contracts) && $location->contracts['creationdate'] != ''? $location->contracts['creationdate']: "Non spécifié" }}</td>
            </tr>
            <tr>
                <td>Date de retour</td>
                <td>{{ isset($location->contracts) && $location->contracts['plannedreturn'] != '' ? $location->contracts['plannedreturn']: "Non spécifié" }}</td>
            </tr>
            <tr>
                <td>Durée initiale</td>
                <td>{{ $location->duration }}</td>
            </tr>
            <tr>
                <td>Client </td>
                <td>{{ isset($location->customer) ? $location->customer['lastname'].' '. $location->customer['firstname'] : 'Aucun' }}</td>
            </tr>
            </tbody>
        </table>
        @endforeach
    @else
        <h1>Aucun contrat n'a été trouvé</h1>
    @endif
@endsection
