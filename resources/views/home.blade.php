@extends('layouts.template')
  <link defer rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
@section('content')



<video id="myVideo" loop class="video"  height="auto" autoplay muted>
    <source src="{{ asset('img/1748463785.mp4') }}" type="video/mp4">
</video>
<video id="myVideoMobile" loop class="video"  height="auto" autoplay muted>
    <source src="{{ asset('img/video-crop.mp4') }}" type="video/mp4">
</video>

<img id="imgHome" src="{{ asset('img/logoIcone_BTG.png') }}" alt="">

@endsection
