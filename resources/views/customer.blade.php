@extends('layout')

@section('content')

<h2 class="title">Contrat de location</h2>

<div class="message form-group col-md-12"> </div>
<form method="POST" action="{{ route('contract') }}"">
{{ csrf_field() }}
  <input style="display:none" id="hidden_id" name="id">
  <div class="form-row">
    <div class="form-group col-md-6" id="scrollable-dropdown-menu">
      <label for="Nom">Nom :</label>
      <input type="text" class="form-control" id="nom" name="nom">
    </div>

      
     
        <div class="form-group col-md-6" id="scrollable-dropdown-menu">
        
            <label for="Prenom">Prénom :</label>
            <input type="text" class="form-control" id="prenom" name="prenom">
     
        
        <select style="display:none" class="custom-select" id="select">
        </select>
  </div>
  </div>
  <div class="form-row">
  
    <div class="form-group col-md-6">
      <label for="Adresse">Adresse :</label>
      <input type="text" class="form-control" id="adresse" name="adresse">
    </div>
   
    <div class="form-group col-md-6">
      <label for="Localite" id="localite_input">Localité :</label>
      <select class="custom-select" id="select_localite" name="localite_select">
      <option disabled selected value> -- Séléctionner une localité -- </option>
      @foreach ($cities as $cities)
        <option value="{{$cities->id}}">{{$cities->name}}</option>
      @endforeach
    </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="Tel">Tél (fixe) :</label>
      <input type="tel" class="form-control" id="tel" name="tel" pattern="[0-9]{3} [0-9]{3} [0-9]{2} [0-9]{2}">
    </div>
    <div class="form-group col-md-4">
      <label for="Natel">Natel :</label>
      <input type="tel" class="form-control" id="natel" name="natel" pattern="[0-9]{3} [0-9]{3} [0-9]{2} [0-9]{2}">
    </div>
    <div class="form-group col-md-4">
      <label for="Email">Email :</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>
  </div>
  <button style="display:none" class='btn btn-outline-dark' type='submit' id='submit' name='submit'>Créér nouveau contrat</button>
  </form>
  <div id="button_user" style="margin-bottom:10px;">
    <button style="display:none" class='btn btn-outline-dark' type='submit' id='submit_user' name='submit_user'>Créér un nouveau client</button>
  </div>
    <button style="display:none; float:right; margin-top:-50px" class='btn btn-outline-dark' type='submit' id='user_update' name='user_update'>Modifier le client</button>
    

    <div class="table-responsive">
      <table class="table" id="table" style="margin-top:150px;">


    </table>
    </div>
@endsection