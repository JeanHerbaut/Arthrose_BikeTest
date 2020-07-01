@extends('layouts.template')

@section('content')


<link defer rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<div class="container">
    <section>
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <!-- Tabs Titles -->

                <!-- Icon -->
                <div class="fadeIn first">
                    <img src="{{ asset('img/user.png') }}" id="icon" alt="User Icon" />
                </div>

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                    <input type="email" id="email" class="fadeIn second" name="email" placeholder="Adresse mail">
                    @error('email')
                  </br>
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input type="password" id="password" class="fadeIn third" name="password" placeholder="Mot de passe">
                    @error('password')
                    </br>
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input type="submit" class="fadeIn fourth" value="Se connecter">
                </form>

                <!-- Remind Passowrd -->
                <div id="formFooter">
                    <a class="underlineHover" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                </div>

            </div>
        </div>
    </section>
</div>
<script src="{{ asset('js/gestionTest.js')}}" type="text/javascript" defer></script>


@endsection
