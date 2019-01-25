@extends('layout')

@section('content')

<h2>Contrat de location</h2>

-------------------

<form method="POST" action="{{ route('create_user') }}"">
{{ csrf_field() }}
  <div id="hidden_id" name="id"></div>
  <div class="form-row">
    <div class="form-group col-md-6" id="scrollable-dropdown-menu">
      <label for="Nom">Nom :</label>
      <input type="text" class="form-control" id="nom" name="nom">
    </div>
    <div class="form-group col-md-6">
      <label for="Adresse">Adresse :</label>
      <input type="text" class="form-control" id="adresse" name="adresse">
    </div>
  </div>
  <div class="form-row">
  <div class="message form-group col-md-12">
      
  </div>
    <div class="form-group col-md-6" id="scrollable-dropdown-menu">
    
        <label for="Prenom">Prénom :</label>
        <input type="text" class="form-control" id="prenom" name="prenom">
 
    
    <select class="custom-select" id="select">
    </select>
   </div>
    <div class="form-group col-md-6">
      <label for="Localite" id="localite_input">Localité :</label>
      <select class="custom-select" id="select_localite" name="localite_select">
      <option disabled selected value> -- Séléctionner une localité -- </option>
      @foreach ($cities as $cities)
        <option value="{{$cities->id}}">{{$cities->name}}</option>
      @endforeach
    </select>
    <div id="localite_name">
      <input type="text" class="form-control" id="localite" name="localite">
    </div>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="Tel">Tél (fixe) :</label>
      <input type="tel" class="form-control" id="tel" name="tel" pattern="[0-9]{3} [0-9]{3} [0-9]{2} [0-9]{2}">
    </div>
    <div class="form-group col-md-3">
      <label for="Natel">Natel :</label>
      <input type="tel" class="form-control" id="natel" name="natel" pattern="[0-9]{3} [0-9]{3} [0-9]{2} [0-9]{2}">
    </div>
    <div class="form-group col-md-6">
      <label for="Email">Email :</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>
  </div>
  <div id="button_user" style="margin-bottom:10px;">
    <button class='btn btn-primary' type='submit' id='submit_user' name='submit_user'>Créér un nouveau client</button>
  </div>
  <div id="button_update" style="margin-bottom:10px;">
    <button class='btn btn-primary' type='submit' id='user_update' name='user_update'>Modifier le client</button>
  </div>
  </form>
    <button class='btn btn-primary' type='submit' id='submit' name='submit'>Créér nouveau contrat</button>


@endsection
