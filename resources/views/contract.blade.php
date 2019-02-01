@extends('layout')

@section('content')


<h2 class="title">Nouveau contrat de location</h2>


<form method="POST">
{{ csrf_field() }}
  <div class="form-row">
    <div class="form-group col-md-6" id="scrollable-dropdown-menu">
      <label for="Nom">Nom :</label>
      <input type="text" class="form-control" id="nom" name="nom" value="{{$client[0]['lastname']}}" readonly>
    </div>
    <div class="form-group col-md-6" id="scrollable-dropdown-menu">   
        <label for="Prenom">Prénom :</label>
        <input type="text" class="form-control" id="prenom" name="prenom" value="{{$client[0]['firstname']}}" readonly>    
   </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="Adresse">Adresse :</label>
      <input type="text" class="form-control" id="adresse" name="adresse" value="{{$client[0]['address']}}" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="Localite">Localité :</label>
      <input type="text" class="form-control" id="localite" name="localite" value="{{$client[0]['cities']['name']}}" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="Tel">Tél (fixe) :</label>
      <input type="tel" class="form-control" id="tel" name="tel" value="{{$client[0]['phone']}}" pattern="[0-9]{3} [0-9]{3} [0-9]{2} [0-9]{2}" readonly>
    </div>
    <div class="form-group col-md-3">
      <label for="Natel">Natel :</label>
      <input type="tel" class="form-control" id="natel" name="natel" value="{{$client[0]['mobile']}}" pattern="[0-9]{3} [0-9]{3} [0-9]{2} [0-9]{2}" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="Email">Email :</label>
      <input type="email" class="form-control" id="email" name="email" value="{{$client[0]['email']}}" readonly>
    </div>
  </div>
  <div class="form-row">
  <div class="table-responsive">
  <table class="table">
    <thead>
      <th>Pos</th>
      <th>Objet</th>
      <th>Catégorie</th>
      <th>Durée</th>
      <th>Prix</th>
    </thead>
    <tbody>
      <td></td>
      <td>
        <select class="custom-select" id="itemnb" name="itemnb">
          <option disabled selected value>Séléctionner un objet</option>
          @foreach ($items as $item)
            <option value="{{$item->id}}">{{$item->itemnb}}</option>
          @endforeach
        </select>
    </td>
    <td>{{$items}}</td>
    <td>
      <select class="custom-select" id="duration" name="duration">
        <option disabled selected value>Séléctionner une durée</option>
          @foreach ($durations as $duration)
            <option value="{{$duration->id}}">{{$duration->code}} | {{$duration->details}}</option>
          @endforeach
      </select>
    </tbody>
  </table>
</div> 
  </div>
  </form>
  

@endsection