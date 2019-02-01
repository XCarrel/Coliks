@extends('layout')

@section('content')


<h2 class="title">Contrat de location</h2>


<form method="POST">
{{ csrf_field() }}
  <div class="form-row">
    <div class="form-group col-md-6" id="scrollable-dropdown-menu">
      <label for="Nom">Nom :</label>
      <input type="text" class="form-control" id="nom" name="nom" value="" readonly>
    </div>
    <div class="form-group col-md-6" id="scrollable-dropdown-menu">   
        <label for="Prenom">Prénom :</label>
        <input type="text" class="form-control" id="prenom" name="prenom" value="" readonly>    
   </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="Adresse">Adresse :</label>
      <input type="text" class="form-control" id="adresse" name="adresse" value="" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="Localite">Localité :</label>
      <input type="text" class="form-control" id="localite" name="localite" value="" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="Tel">Tél (fixe) :</label>
      <input type="tel" class="form-control" id="tel" name="tel" value="" pattern="[0-9]{3} [0-9]{3} [0-9]{2} [0-9]{2}" readonly>
    </div>
    <div class="form-group col-md-3">
      <label for="Natel">Natel :</label>
      <input type="tel" class="form-control" id="natel" name="natel" value="" pattern="[0-9]{3} [0-9]{3} [0-9]{2} [0-9]{2}" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="Email">Email :</label>
      <input type="email" class="form-control" id="email" name="email" value="" readonly>
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

            <option value=""></option>

        </select>
    </td>
    <td></td>
    <td>
      <select class="custom-select" id="duration" name="duration">
        <option disabled selected value>Séléctionner une durée</option>

            <option value=""> | </option>

      </select>
    </tbody>
  </table>
</div> 
  </div>
  </form>
  

@endsection