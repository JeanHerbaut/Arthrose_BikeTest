@extends('layouts.template')
@section('content')
    <link defer rel="stylesheet" type="text/css" href="{{ asset('css/velo.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <div class="wrapper">
        <div class="header">
            <a href="#" class="previous round" onclick="history.back()">&laquo;</a>
            @auth
            <svg id="Layer_1" data-name="Layer 1" data-id="{{$product->id}}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60.47 54.19">
                <defs>
                    <style>.cls-1{stroke:red;stroke-miterlimit:10;stroke-width:3px;}</style>
                </defs>
                <path class="cls-1 {{($product->isFavoriteOf->isNotEmpty()) ? 'filled' : ''}}" d="M720.5,843.26v2.58a2.57,2.57,0,0,0-.08.38,20.24,20.24,0,0,1-3.39,9.34,39.87,39.87,0,0,1-7,8c-5.27,4.71-10.63,9.33-16,14a3.34,3.34,0,0,1-4.76-.12q-6.13-5.26-12.24-10.56a63.1,63.1,0,0,1-9.54-9.79,21,21,0,0,1-4.23-9.36c-.84-5.52.23-10.6,3.91-14.91a15,15,0,0,1,14.06-5.3,14.67,14.67,0,0,1,9,4.94c.52.56,1,1.16,1.51,1.78l.71-.92c.25-.3.51-.6.78-.88,4.45-4.69,9.82-6.26,16-4.32,5.77,1.83,9.15,6,10.66,11.81C720.2,841,720.31,842.14,720.5,843.26Z" transform="translate(-661.53 -825.79)"/></svg>
            @endauth
        </div>
        <div class="wrapper-info">
            <img class="velo-img" src="{{url($product->image)}}" alt="" width="300px">
            <div class="desc-wrapper">
                <p><strong>{{$product->shortDesc}}</strong></p>
                <p>{{$product->category->name}}</p>
            </div>
            <div class="desc-wrapper">
                <p>{{$product->brand->name}}</p>
                <p>{{formatPrice($product->price)}}</p>
            </div>
            <div class="desc-wrapper longdesc">
                <p>{{$product->longDesc}}</p>
            </div>
        </div>
        <hr>
        <div class="wrapper-rating">
            <div class="rating-prin">
                <p><strong>★</strong>{{roundAvg($product->avgNote)}} ({{$product->tests_count}} avis)</p>
            </div>
            @foreach($criterias as $criteria => $note)
            <div class="rating-sec">
                <label for="{{$criteria}}">{{$criteria}}</label>
                <progress id="{{$criteria}}" value="{{noteToPercent($note)}}" max="100"></progress>
            </div>
            @endforeach
        </div>


        <div class="comment-title">
            <p>Commentaires ({{count($product->tests)}})</p>
        </div>

        @foreach($product->tests as $test)
        @if($test->comment)
        <hr>
        <div class="comment-head">
            <div>{{$test->user->username}} {{$test->rating}}★</div>
            <div>{{$test->startTime->format('d.m.Y')}}</div>
        </div>
        <div class="comment-text">
            <p>{{$test->comment}}</p>
        </div>
        @endif
        @endforeach

        <div class="wrapper-button">
            <input type="submit" value="VOIR LES {{count($product->tests)}} COMMENTAIRES">
        </div>
    </div>
    <script>
        let env_url = "{{url('')}}"
    </script>
    <script src="{{ asset('js/velo.js')}}" type="text/javascript" defer></script>
@endsection
