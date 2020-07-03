@extends('layouts.template')

@section('content')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/register.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
            <h1>Créer mon compte</h1>
        <form method="POST" action="{{url('/register')}}">
            @csrf
            <div class="nameField group">
                
            <label for="username">Nom d'utilisateur</label>
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                    name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            
            
            <div class="nameField">
                <label for="name">Nom</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label for="firstname">Prénom</label>
                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror"
                    name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                @error('firstname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="nameField group">
            <label for="email">Adresse email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            
            
            
            <div class="nameField group">
                <label for="password">Mot de passe</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label for="password-confirm">Confirmer le mot de passe</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>

            <button type="submit">
                {{ __('Créer un utilisateur') }}
            </button>
        </form>
@endsection