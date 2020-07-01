@extends('layouts.template')
@section('content')
<link defer rel="stylesheet" type="text/css" href="{{ asset('css/mesVelos.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="tab">
    <button class="tablink" onclick="openPage('favoris')" id="defaultOpen">Favoris</button>
    <button class="tablink" onclick="openPage('test')" >Test</button>
</div>

<!-- Tab content -->
<div id="favoris" class="tabcontent">
    <h3>Favoris</h3>
    <div class="vignette-test">
        <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="" width="100px">
        <p><strong>Velo testé</strong></p>
        <p>SCOTT</p>
    </div>
    <div class="vignette-test">
        <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="" width="100px">
        <p><strong>Velo testé</strong></p>
        <p>SCOTT</p>
    </div>
    <div class="vignette-test">
        <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="" width="100px">
        <p><strong>Velo testé</strong></p>
        <p>SCOTT</p>
    </div>
    <div class="vignette-test">
        <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="" width="100px">
        <p><strong>Velo testé</strong></p>
        <p>SCOTT</p>
    </div>
</div>

<div id="test" class="tabcontent">
    <h3>Test</h3>
    <div class="vignette-test" onclick="location.href='/mesvelos/test';">
        <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="" width="100px">
        <p><strong>Titanium 370-X</strong></p>
        <p>SCOTT</p>
    </div>
    <div class="vignette-test">
        <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="" width="100px">
        <p><strong>Titanium 370-X</strong></p>
        <p>SCOTT</p>
    </div>
    <div class="vignette-test">
        <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="" width="100px">
        <p><strong>Titanium 370-X</strong></p>
        <p>SCOTT</p>
    </div>
    <div class="vignette-test">
        <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="" width="100px">
        <p><strong>Titanium 370-X</strong></p>
        <p>SCOTT</p>
    </div>
</div>
    <script>
        function openPage(pageName) {
            let i, tabcontent;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            document.getElementById(pageName).style.display = "block";
        }
        document.getElementById("defaultOpen").click();
    </script>

@endsection

@section('script')

@endsection