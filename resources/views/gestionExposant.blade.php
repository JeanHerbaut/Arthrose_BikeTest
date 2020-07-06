@extends('layouts.template')
@section('content')
<link defer rel="stylesheet" type="text/css" href="{{ asset('css/gestionExposant.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<section>
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <h1>Ajout exposant</h1>
      <form class="add-form" action="{{url('/gestion-exposant/create')}}" method="POST">
        @csrf
        <input type="text" placeholder="Ajouter exposant" name="name">
        <button type="submit">Ajouter</button>
      </form>
    </div>

  </div>
  <div class="container">
    <div class="wrapper-left wrapper">
      <h1>Gestion Exposant</h1>
      <div class="container-list">
        <form action="" class="form-utilisateurs" method="POST">
          @csrf
          <select id="company-select" name="companyId" size="{{sizeOf($companies)}}">
            @foreach ($companies as $company)
            <option value="{{$company->id}}" class="select">{{$company->name}}</option>
            @endforeach
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
            <h3 id="company"></h3>
          </div>
          <div class="titre-texte" id="company">

          </div>
        </div>
        <div class="wrapper-company">
          <div class="titre">
            <p>Collaborateurs</p>
          </div>
          <div class="titre-texte collaborateurs">
          </div>
        </div>
        <h3>Vélos associés</h3>
        <div class="wrapper-velos">

        </div>
        <div class="nothing">

        </div>
      </div>
    </div>
  </div>
</section>
<script>
  let env_url = "{{url('')}}"
</script>
<script src="{{ asset('js/gestionExposant.js')}}" type="text/javascript" defer></script>
@endsection