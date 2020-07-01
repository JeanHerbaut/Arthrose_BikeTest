@extends('layouts.template')
@section('content')
<link defer rel="stylesheet" type="text/css" href="{{ asset('css/catalogue.css') }}">
<link defer rel="stylesheet" type="text/css" href="{{ asset('css/vignette.css') }}">
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
                            <input type="checkbox" id="check_5" name="check_" 5" value="check_" 5">
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

            @foreach($products as $product)

    <div class="svg-container">
      <a class="test" href="#">
        <div class="content-vignette">

            <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="">
            <p id="type">{{$product->category_name}}</p>
            <p id="dollar">{{$product->price}}</p>
            <div>
                <p id="model">{{$product->shortDesc}}</p>
                <p id="marque">{{$product->brand->name}}</p>
            </div>

            <div id="rating">
                <div class="star">
                    <img src="{{ asset('img/star.svg') }}" alt="">
                    <p><b>{{$product->avgNote}}</b> ({{$product->tests_count}})</p>
                </div>
                <div class="heart">
                    <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60.47 54.19">
                        <defs>
                            <style>
                                .cls-1 {
                                    fill: none;
                                    stroke: red;
                                    stroke-miterlimit: 10;
                                    stroke-width: 3px;
                                }
                            </style>
                        </defs>
                        <path class="cls-1"
                          d="M720.5,843.26v2.58a2.57,2.57,0,0,0-.08.38,20.24,20.24,0,0,1-3.39,9.34,39.87,39.87,0,0,1-7,8c-5.27,4.71-10.63,9.33-16,14a3.34,3.34,0,0,1-4.76-.12q-6.13-5.26-12.24-10.56a63.1,63.1,0,0,1-9.54-9.79,21,21,0,0,1-4.23-9.36c-.84-5.52.23-10.6,3.91-14.91a15,15,0,0,1,14.06-5.3,14.67,14.67,0,0,1,9,4.94c.52.56,1,1.16,1.51,1.78l.71-.92c.25-.3.51-.6.78-.88,4.45-4.69,9.82-6.26,16-4.32,5.77,1.83,9.15,6,10.66,11.81C720.2,841,720.31,842.14,720.5,843.26Z"
                          transform="translate(-661.53 -825.79)" />
                    </svg>
                </div>
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
        </a>
    </div>

            @endforeach

        </div>
    </div>

</section>

<script src="{{ asset('js/gestionExposant.js')}}" type="text/javascript" defer></script>
<script src="{{ asset('js/noUISlider.js')}}" type="text/javascript" defer></script>

@endsection
