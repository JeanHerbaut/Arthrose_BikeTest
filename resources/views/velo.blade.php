@extends('layouts.template')
@section('content')
    <link defer rel="stylesheet" type="text/css" href="{{ asset('css/velo.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <div class="wrapper">
        <div class="header">
            <a href="/catalogue" class="previous round">&laquo;</a>
            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60.47 54.19"><defs><style>.cls-1{fill:red;stroke:red;stroke-miterlimit:10;stroke-width:3px;}</style></defs><path class="cls-1" d="M720.5,843.26v2.58a2.57,2.57,0,0,0-.08.38,20.24,20.24,0,0,1-3.39,9.34,39.87,39.87,0,0,1-7,8c-5.27,4.71-10.63,9.33-16,14a3.34,3.34,0,0,1-4.76-.12q-6.13-5.26-12.24-10.56a63.1,63.1,0,0,1-9.54-9.79,21,21,0,0,1-4.23-9.36c-.84-5.52.23-10.6,3.91-14.91a15,15,0,0,1,14.06-5.3,14.67,14.67,0,0,1,9,4.94c.52.56,1,1.16,1.51,1.78l.71-.92c.25-.3.51-.6.78-.88,4.45-4.69,9.82-6.26,16-4.32,5.77,1.83,9.15,6,10.66,11.81C720.2,841,720.31,842.14,720.5,843.26Z" transform="translate(-661.53 -825.79)"/></svg>
        </div>
        <div class="wrapper-info">
            <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="" width="300px">
            <div class="desc-wrapper">
                <p><strong>Velo testé</strong></p>
                <p>VTT</p>
            </div>
            <div class="desc-wrapper">
                <p>SCOTT</p>
                <p>$$</p>
            </div>
            <div class="desc-wrapper longdesc">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque bibendum sapien vitae odio venenatis aliquam. Nam malesuada sapien ac faucibus tincidunt.</p>
            </div>
        </div>
        <hr>
        <div class="wrapper-rating">
            <div class="rating-prin">
                <p><strong>★</strong>4.5 (45 avis)</p>
            </div>
            <div class="rating-sec">
                <label for="quality">Qualité/Prix</label>
                <progress id="quality" value="78" max="100"></progress>
            </div>
            <div class="rating-sec">
                <label for="weight">Poid</label>
                <progress id="weight" value="90" max="100"></progress>
            </div>
            <div class="rating-sec">
                <label for="confort">Comfort</label>
                <progress id="confort" value="30" max="100"></progress>
            </div>
            <div class="rating-sec">
                <label for="component">Composants</label>
                <progress id="component" value="59" max="100"></progress>
            </div>
        </div>
        <div class="wrapper-button">
            <input type="submit" value="VOIR LES 36 COMMENTAIRES">
        </div>
    </div>
@endsection
