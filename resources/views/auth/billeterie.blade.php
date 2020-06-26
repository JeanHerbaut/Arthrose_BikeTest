@extends('layouts.template')

@section('content')
<div class="step">
    <h2>Plage horaire</h2>
    <p>Suivant: Informations</p>
</div>
<form method="post" action="/createUserWithTicket" id="schedule">
    @csrf
    <div id="choix-plage">
        <div class="description">
            <p>Veuillez sélectionner une seule plage horaire pour l’édition 2020</p>
            <p>Attention : vous ne pouvez sélectionner qu’une seule plage horaire.</p>
        </div>

        @foreach($days as $day)
        <div class="opt-plage">
            <h3>{{$day[0]['day']}}</h3>
            @foreach($day as $plage)
            <input type="radio" name="plage" id="ve{{$plage['id']}}" value="{{$plage['id']}}">
            <label for="ve{{$plage['id']}}">{{$plage['startTime']}} - {{$plage['endTime']}}</label>
            @endforeach
        </div>
        @endforeach
        @error('plage')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <div class="nav">
            <div class="button"><span>Retour</span></div>
            <div class="button">Suivant<span></span></div>
        </div>
    </div>

    <div id="identity">
        <div class="description">
            <p>Veuillez remplir vos informations personnelles</p>
        </div>
        <div class="full-input">
            <label for="name" class="form-control-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="full-input">
            <label for="firstname" class="form-control-label">Fistname</label>
            <input type="text" name="firstname" id="firstname" class="form-control" value="{{ old('firstname') }}">
        </div>
        @error('firstname')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="full-input">
            <label for="email" class="form-control-label">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
        </div>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="full-input">
            <label for="phone" class="form-control-label">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
        </div>
        @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div id="user-register">
        <div class="description">
            <p>Veuillez choisir un nom d’utilisateur ainsi qu’un mot de passe</p>
            <p>Attention : vous aurez besoin de ces informations pendant l’événement </p>
        </div>
        <div class="full-input">
            <label for="username" class="form-control-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}">
        </div>
        @error('username')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="full-input">
            <label for="password" class="form-control-label">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="full-input">
            <label for="password-confirm" class="form-control-label">Confirmez le mot de passe</label>
            <input type="password" name="password_confirmation" id="password-confirm" class="form-control">
        </div>
    </div>
    <input type="submit" value="Envoyer">
</form>
@endsection