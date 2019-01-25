@extends('layout')

@section('content')

<form method="POST">
{{ csrf_field() }}
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
      <div class="alert alert-danger alert-block"></div>
  </div>
    <div class="form-group col-md-6" id="scrollable-dropdown-menu">
    
        <label for="Prenom">Prénom :</label>
        <input type="text" class="form-control" id="prenom" name="prenom">
 
    
    <select class="custom-select" id="select">
    </select>
   </div>
    <div class="form-group col-md-6">
      <label for="Localite">Localité :</label>
      <input type="text" class="form-control" id="localite" name="localite">
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
  </form>
  <button type="submit" class="btn btn-primary" id="submit" name="submit">Créér nouveau contrat</button>
  <button type="submit" class="btn btn-primary" id="submit_user" name="submit_user">Créer l'utilisateur</button>

@endsection