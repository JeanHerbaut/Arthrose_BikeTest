@extends('layouts.template')
@section('content')
<link defer rel="stylesheet" type="text/css" href="{{ asset('css/gestionTest.css') }}">
<link defer rel="stylesheet" type="text/css" href="{{ asset('css/vignette.css') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<section>

<div class="container-gestion">
    <h1>Gestion des tests</h1>
    <a id="historique" href="/gestion-test-historique">Historique</a>
        @foreach($availableBikes as $bike)
        <!-- The Modal -->
        <div class="modal hidden" data-id="{{$bike->id}}">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="wrapper-left">

                    <h2>Création Test</h2>





                    <div class="svg-container-3">

                            <div class="content-vignette">
                                <img style="top: 0;" class="velo-img" src="{{ $bike->product->image }}" alt="">
                                <p id="type">{{$bike->product->category_name}}</p>

                                <div style="margin-bottom: 15px;">
                                    <p id="model">{{$bike->product->shortDesc}}</p>
                                    <p id="marque">{{$bike->product->brand->name}}</p>
                                    <p>{{$bike->distinctive_sign}}</p>
                                </div>


                            </div>
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 434 549.49">
                                <defs>
                                    <style>
                                        .cls-2 {
                                            fill: #fff;
                                        }
                                    </style>
                                </defs>
                                <path class="cls-2" d="M920,845H566a40,40,0,0,1-40-40V340.5a45,45,0,0,1,60.51-42.17L924,386.71a55.08,55.08,0,0,1,36,51.67V805A40,40,0,0,1,920,845Z" transform="translate(-526 -295.51)" />
                            </svg>

                    </div>







                    <p>Le test commence à: </br>
                        <span class="startTime"></span></p>
                    <p>Le test se termine à: </br>
                        <span class="endTime"></span></p>
                </div>
                <div class="wrapper-right">
                    <span class="close">&times;</span>
                    <form class="recherche-form" action="" data-id="{{$bike->id}}">
                        <input style="margin-right: 10px;" type="text" placeholder="Rechercher.." name="search" class="recherche" data-id="{{$bike->id}}">
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
                            <input type="hidden" name="category" value="{{$bike->product->category_name}}">
                        </form>
                    </div>

                    <input class="myBtn" type="submit" name="submit" value="Commencer" form="mainForm{{$bike->id}}">
                </div>
            </div>
        </div>
        @endforeach


        <div class="container-test">
            <div class="header-test">
                <p>Disponibles</p>
            </div>
            <div class="wrapper-velos-test">





                @foreach($availableBikes as $bike)
                <div class="svg-container">
                  <div id="start">
                      <a href="#" class="popup begin" data-id="{{$bike->id}}">Commencer</a>
                  </div>
                        <div class="content-vignette">
                            <img class="velo-img" src="{{ $bike->product->image }}" alt="">
                            <p id="type">{{$bike->product->category_name}}</p>
                            <p></p>
                            <div style="margin-bottom: 15px;">
                                <p id="model">{{$bike->product->shortDesc}}</p>
                                <p id="marque">{{$bike->product->brand->name}}</p>
                            </div>


                        </div>
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 434 549.49">
                            <defs>
                                <style>
                                    .cls-2 {
                                        fill: #fff;
                                    }
                                </style>
                            </defs>
                            <path class="cls-2" d="M920,845H566a40,40,0,0,1-40-40V340.5a45,45,0,0,1,60.51-42.17L924,386.71a55.08,55.08,0,0,1,36,51.67V805A40,40,0,0,1,920,845Z" transform="translate(-526 -295.51)" />
                        </svg>

                </div>
                @endforeach
            </div>
        </div>


        <div id="container-cours" class="container-test">
            <div class="header-test">
                <p>En cours..</p>
            </div>
            <div class="wrapper-velos">
                @foreach($currentTests as $test)

                <div class="svg-container-2">
                  <div id="start">
                      <a href="#" class="popup end" data-id="{{$test->bike->id}}">Terminer</a>
                  </div>
                        <div class="content-vignette">
                            <img style="right: -15%; top: 5;" class="velo-img" src="{{ $test->product->image }}" alt="">
                            <p id="type">{{$test->product->category_name}}</p>
                            <p></p>
                            <div>
                                <p id="model">{{$test->product->shortDesc}}</p>
                                <p id="marque">{{$test->product->brand->name}}</p>
                                <p id="emprunt">Emprunté
                                par {{$test->user->username}}
                                à {{$test->startTime->format('H:i')}}</p>
                            </div>


                        </div>
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 434 549.49">
                            <defs>
                                <style>
                                    .cls-2 {
                                        fill: #fff;
                                    }
                                </style>
                            </defs>
                            <path class="cls-2" d="M920,845H566a40,40,0,0,1-40-40V340.5a45,45,0,0,1,60.51-42.17L924,386.71a55.08,55.08,0,0,1,36,51.67V805A40,40,0,0,1,920,845Z" transform="translate(-526 -295.51)" />
                        </svg>

                </div>




                @endforeach
            </div>
        </div>

        <!-- confirm Modal -->
        <div class="modal confirm-modal hidden">
            <!-- Modal content -->
            <div class="modal-content-2">
                <p><strong>Souhaitez-vous vraiment terminer le test?</strong></p>
                <form method="post" action="/endTest" id="endTest">
                    {{ csrf_field() }}
                    <input type="hidden" name="bike_id" id="bike_id">
                </form>
                <input class="myBtn" type="submit" form="endTest" value="Terminer">
                <input type="submit" class=" cancel" value="Annuler">

            </div>
        </div>


</div>
</section>
<script src="{{ asset('js/gestionTest.js')}}" type="text/javascript" defer></script>
@endsection
