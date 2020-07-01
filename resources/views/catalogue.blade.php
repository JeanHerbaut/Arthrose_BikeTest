@extends('layouts.template')
@section('content')
<link defer rel="stylesheet" type="text/css" href="{{ asset('css/catalogue.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
<link href="nouislider.css" rel="stylesheet">
<script src="nouislider.js"></script>

<section>
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="header-filter">


                <span class="close"><i class="fas fa-arrow-left"></i></span>
                <h1>Filtre</h1>
            </div>

            <div class="wrapper-content-filter">
            <div class="marque-filter">
                <h2>Marque</h2>

                <form>
                    <SELECT name="marque" size="1">
                        <OPTION>SCOTT
                        <OPTION>BMC
                        <OPTION>Nike

                    </SELECT>
                </form>

            </div>

                <div class="type-filter">
                    <h2>Type</h2>
                    <ul>
                        <li>
                            <input type="checkbox" id="check_1" name="check_1" value="check_1">
                            <label for="check_1">VTT</label>
                        </li>
                        <li>
                            <input type="checkbox" id="check_2" name="check_2" value="check_2">
                            <label for="check_2">VTTAE</label>
                        </li>
                        <li>
                            <input type="checkbox" id="check_3" name="check_3" value="check_3">
                            <label for="check_3">E-BIKE</label>
                        </li>
                        <li>
                            <input type="checkbox" id="check_4" name="check_4" value="check_4">
                            <label for="check_4">ROADSTER</label>
                        </li>
                    </ul>
                </div>

                <div class="taille-filter">
                    <h2>Taille</h2>

                    <ul>
                        <li>
                            <input type="checkbox" id="check_5" name="check_"5" value="check_"5">
                            <label for="check_5">S</label>
                        </li>
                        <li>
                            <input type="checkbox" id="check_6" name="check_6" value="check_6">
                            <label for="check_6">M</label>
                        </li>
                        <li>
                            <input type="checkbox" id="check_7" name="check_7" value="check_7">
                            <label for="check_7">L</label>
                        </li>
                        <li>
                            <input type="checkbox" id="check_8" name="check_8" value="check_8">
                            <label for="check_8">XL</label>
                        </li>
                    </ul>
                </div>

                <div class="prix-filter">
                    <h2>Prix</h2>
                    <div class="wrapper-slider">


                    <div id="slider"></div>
                    <div class="prix-dollar">
                      <p>$</p>
                      <p>$$</p>
                      <p>$$$</p>
                    </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="wrapper-catalogue">
        <div class="wrapper-header">
            <h1>Catalogue</h1>
            <div class="icons-header">
                <a href="#">
                    <img src="{{ asset('img/icons-01.png') }}" alt="">
                </a>
                <a href="#" class="popup">
                    <img src="{{ asset('img/icons-02.png') }}" alt="">
                </a>
            </div>
        </div>

        <div class="wrapper-velos">

            <div class="vignette vignette-start">
                <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
                <a href="/velo">Commencer</a>
            </div>
            
        </div>
    </div>

</section>

<script src="{{ asset('js/gestionExposant.js')}}" type="text/javascript" defer></script>
@endsection
