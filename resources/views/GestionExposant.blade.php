@extends('layouts.template')
@section('content')
<link defer rel="stylesheet" type="text/css" href="{{ asset('css/gestionExposant.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<section>
  <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <span class="close">&times;</span>
        <h1>Ajout exposant</h1>
        <form class="add-form" action="">
            <input type="text" placeholder="Ajouter exposant" name="search" class="recherche">
            <button type="submit">Ajouter</button>
        </form>
      </div>

  </div>
    <div class="container">
        <div class="wrapper-left wrapper">
            <h1>Gestion Exposant</h1>

            <form class="recherche-form" action="">
                <label for="search">Rechercher: </label>
                <input type="text"  name="search" class="recherche">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
            <div class="container-list">
              <form action="" class="form-utilisateurs">


                  <select name="color3" size="3">
                      <option value="1">Jean Michel Sardou - Jeanmichdu69</option>
                      <option value="2">Jean Michel Sardou - Jeanmichdu69</option>
                      <option value="3">Jean Michel Sardou - Jeanmichdu69</option>
                      <option value="4">Jean Michel Sardou - Jeanmichdu69</option>
                      <option value="5">Jean Michel Sardou - Jeanmichdu69</option>
                      <option value="5">Jean Michel Sardou - Jeanmichdu69</option>
                      <option value="5">Jean Michel Sardou - Jeanmichdu69</option>
                      <option value="5">Jean Michel Sardou - Jeanmichdu69</option>
                      <option value="5">Jean Michel Sardou - Jeanmichdu69</option>
                  </select>


              </form>
            </div>

        </div>
        <div class="wrapper-right wrapper">
          <a href="#" class="popup">Créer</a>
          <div class="container-details">
            <h2>Details Exposant</h2>
            <div class="wrapper-marque">
              <div class="titre">
                <p>Marque</p>
              </div>
              <div class="titre-texte">
                <p>SCOTT</p>
              </div>
            </div>
            <div class="wrapper-marque">
              <div class="titre">
                <p>Collaborateurs</p>
              </div>
              <div class="titre-texte">
                <p>Jean-Louis</p>
              </div>
            </div>
            <h3>Vélos associés</h3>
            <div class="wrapper-velos">
              <div class="vignette-test">
                  <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                  <p><strong>Titanium 370-X</strong></p>
                  <p>SCOTT</p>
              </div>
            </div>
          </div>
        </div>
    </div>
</section>
<script src="{{ asset('js/gestionExposant.js')}}" type="text/javascript" defer></script>
@endsection
