@extends('layouts.template')
@section('content')
<link defer rel="stylesheet" type="text/css" href="{{ asset('css/gestionTest.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
    <section>
        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="wrapper-left">

                    <p>Création test</p>
                    <div class="vignette-test">
                        <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                        <p><strong>Titanium 370-X</strong></p>
                        <p>SCOTT</p>
                    </div>
                    <p>Le test commence à: </br>
                        <span>14:36</span></p>
                    <p>Le test commence à: </br>
                        <span>15:06</span></p>
                </div>
                <div class="wrapper-right">
                    <span class="close">&times;</span>
                    <form class="recherche-form" action="">
                        <input type="text" placeholder="Search.." name="search" class="recherche">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <div class="container-list">
                      <ul>
                        <li>Nom complet - Nom utilisateur</li>
                      </ul>
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
                    <a class="myBtn" href="#">Commencer</a>
                </div>
            </div>

        </div>
        <div class="container-test">
            <div class="header-test">
                <p>Disponibles</p>
            </div>
            <div class="vignette vignette-start">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#" class="popup">Commencer</a>
            </div>
            <div class="vignette vignette-start">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Commencer</a>
            </div>
            <div class="vignette vignette-start">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Commencer</a>
            </div>
            <div class="vignette vignette-start">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Commencer</a>
            </div>
            <div class="vignette vignette-start">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Commencer</a>
            </div>
            <div class="vignette vignette-start">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Commencer</a>
            </div>
            <div class="vignette vignette-start">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Commencer</a>
            </div>
            <div class="vignette vignette-start">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Commencer</a>
            </div>
            <div class="vignette vignette-start">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Commencer</a>
            </div>
            <div class="vignette vignette-start">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Commencer</a>
            </div>
            <div class="vignette vignette-start">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Commencer</a>
            </div>
            <div class="vignette vignette-start">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Commencer</a>
            </div>
            <div class="vignette vignette-start">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Commencer</a>
            </div>
            <div class="vignette vignette-start">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Commencer</a>
            </div>
            <div class="vignette vignette-start">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Commencer</a>
            </div>
            <div class="vignette vignette-start">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Commencer</a>
            </div>
            <div class="vignette vignette-start">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Commencer</a>
            </div>
            <div class="vignette vignette-start">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Commencer</a>
            </div>
            <div class="vignette vignette-start">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Commencer</a>
            </div>
            <div class="vignette vignette-start">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Commencer</a>
            </div>
            <div class="vignette vignette-start">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Commencer</a>
            </div>
            <div class="vignette vignette-start">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Commencer</a>
            </div>
            <div class="vignette vignette-start">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Commencer</a>
            </div>


        </div>
        <div class="container-test">
            <div class="header-test">
                <p>En cours..</p>
            </div>
            <div class="vignette vignette-end">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#" class="myBtn">Terminer</a>
            </div>
            <div class="vignette vignette-end">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Terminer</a>
            </div>
            <div class="vignette vignette-end">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Terminer</a>
            </div>
            <div class="vignette vignette-end">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Terminer</a>
            </div>
            <div class="vignette vignette-end">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Terminer</a>
            </div>
            <div class="vignette vignette-end">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Terminer</a>
            </div>
            <div class="vignette vignette-end">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Terminer</a>
            </div>
            <div class="vignette vignette-end">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Terminer</a>
            </div>
            <div class="vignette vignette-end">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Terminer</a>
            </div>
            <div class="vignette vignette-end">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Terminer</a>
            </div>
            <div class="vignette vignette-end">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Terminer</a>
            </div>
            <div class="vignette vignette-end">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Terminer</a>
            </div>
            <div class="vignette vignette-end">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Terminer</a>
            </div>
            <div class="vignette vignette-end">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Terminer</a>
            </div>
            <div class="vignette vignette-end">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Terminer</a>
            </div>
            <div class="vignette vignette-end">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Terminer</a>
            </div>
            <div class="vignette vignette-end">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="#">Terminer</a>
            </div>
        </div>
    </section>
</div>
<script src="{{ asset('js/gestionTest.js')}}" type="text/javascript" defer></script>
@endsection
