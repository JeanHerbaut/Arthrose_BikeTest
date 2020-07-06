@extends('layouts.template')
@section('content')
<link defer rel="stylesheet" type="text/css" href="{{ asset('css/mesVelos.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="tab">
    <button class="tablink" onclick="openPage('favoris')">Favoris</button>
    <button class="tablink" onclick="openPage('test')" id="defaultOpen">Test</button>
</div>

<!-- Tab content -->
<div id="favoris" class="tabcontent">
    <h3>Favoris</h3>
    @foreach($favProducts as $product)
    <a href="{{url('/velo/'.$product->id)}}">
        <div class="vignette-test">
            <img class="velo-img" src="{{ url($product->image) }}" alt="" width="100px">
            <p><strong>{{$product->shortDesc}}</strong></p>
            <p>{{$product->brand->name}}</p>
        </div>
    </a>
    @endforeach
</div>

<div id="test" class="tabcontent">
    <h3>Test</h3>
    @foreach($tests_unrated as $test)
    <a href="{{url('/mesvelos/'.$test->id)}}">
        <div class="vignette-test">
            <img class="velo-img" src="{{ url($test->product->image) }}" alt="" width="100px">
            <p><strong>{{$test->product->shortDesc}}</strong></p>
            <p>{{$test->product->shortDesc}}</p>
            <p>À évaluer</p>
        </div>
    </a>
    @endforeach

    @foreach($tests_rated as $test)
    <a href="{{url('/mesvelos/'.$test->id)}}">
        <div class="vignette-test">
            <img class="velo-img" src="{{ url($test->product->image) }}" alt="" width="100px">
            <p><strong>{{$test->product->shortDesc}}</strong></p>
            <p>{{$test->product->shortDesc}}</p>
            <div class="star">
                <img src="{{ asset('img/star.svg') }}" alt="" width="20px">
                <p>{{$test->rating}}</p>
            </div>
        </div>
    </a>
    @endforeach
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