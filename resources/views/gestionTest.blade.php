@extends('layouts.template')
@section('content')
<link defer rel="stylesheet" type="text/css" href="{{ asset('css/gestionTest.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<div class="container">
    <h1>Gestion des tests</h1>
    <button><a href="/gestion-test-historique">Historique</a></button>
    <section>

        @foreach($availableBikes as $bike)
        <!-- The Modal -->
        <div class="modal hidden" data-id="{{$bike->id}}">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="wrapper-left">

                    <h2>Création Test</h2>
                    <div class="vignette-test">
                        <img class="velo-img" src="{{ $bike->product->image }}" alt="">
                        <p><strong>{{$bike->product->shortDesc}}</strong></p>
                        <p>{{$bike->product->brand->name}}</p>
                    </div>
                    <p>Le test commence à: </br>
                        <span class="startTime"></span></p>
                    <p>Le test se termine à: </br>
                        <span class="endTime"></span></p>
                </div>
                <div class="wrapper-right">
                    <span class="close">&times;</span>
                    <form class="recherche-form" action="" data-id="{{$bike->id}}">
                        <input type="text" placeholder="Search.." name="search" class="recherche" data-id="{{$bike->id}}">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <div class="container-list">
                        <ul>
                            <li>Nom complet - Nom utilisateur</li>
                        </ul>
                        <form id="mainForm{{$bike->id}}" method="post" action="/addTest" class="form-utilisateurs">
                        {{ csrf_field() }}
                            <select class="resultsList" data-id="{{$bike->id}}" name="user_id" size="3" required></select>
                            <input type="hidden" name="bike_id" value="{{$bike->id}}">
                            <input type="hidden" name="product_id" value="{{$bike->product->id}}">
                        </form>
                    </div>
                    <button class="myBtn" type="submit" form="mainForm{{$bike->id}}">Commencer</button>
                </div>
            </div>
        </div>
        @endforeach


        <div class="container-test">
            <div class="header-test">
                <p>Disponibles</p>
            </div>
            @foreach($availableBikes as $bike)
            <div class="vignette vignette-start">
                <img class="velo-img" src="{{ $bike->product->image }}" alt="">
                {{$bike->product->shortDesc}}
                <a href="#" class="popup begin" data-id="{{$bike->id}}">Commencer {{$bike->id}}</a>
            </div>
            @endforeach
        </div>


        <div class="container-test">
            <div class="header-test">
                <p>En cours..</p>
            </div>
            @foreach($currentTests as $test)
            <div class="vignette vignette-end">
                <img class="velo-img" src="{{ $test->product->image }}" alt="">
                {{$test->product->shortDesc}}<br>
                Emprunté <br>
                par {{$test->user->username}}<br>
                à {{$test->startTime->format('H:i')}}
                <a href="#" class="popup end" data-id="{{$test->bike->id}}">Terminer</a>
            </div>
            @endforeach
        </div>

        <!-- confirm Modal -->
        <div class="modal confirm-modal hidden">
            <!-- Modal content -->
            <div class="modal-content">
                <p><strong>Souhaitez-vous vraiment terminer le test?</strong></p>
                <form method="post" action="/endTest" id="endTest">
                {{ csrf_field() }}
                    <input type="hidden" name="bike_id" id="bike_id">
                </form>
                <button class="myBtn cancel">Annuler</button>
                <button class="myBtn" type="submit" form="endTest">Terminer</button>
            </div>
        </div>

    </section>
</div>
<script src="{{ asset('js/gestionTest.js')}}" type="text/javascript" defer></script>
@endsection