@extends('layouts.template')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="{{ asset('js/jquery.star-rating-svg.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/star-rating-svg.css') }}">
    <style>
        a {
            text-decoration: none;
            display: inline-block;
            padding: 8px 16px;
        }

        a:hover {
            background-color: #ddd;
            color: black;
        }

        .previous {
            background-color: #f1f1f1;
            color: black;
        }

        .round {
            border-radius: 50%;
        }

        .critere {
            display: flex;
            justify-content: space-between;
            font-size: 20px;
        }
    </style>

<a href="url('/mesvelos')" class="previous round">&laquo;</a>
    <p>Testé le <b>{{$test->startTime->format('d.m.Y')}}</b> à <b>{{$test->startTime->format('H:i')}}</b></p>
    <div class="vignette-test">
        <img class="velo-img" src="{{ url($test->product->image) }}" alt="" width="100px">
        <p><strong>Velo testé</strong></p>
        <p>{{ $test->product->brand->name }}</p>
        <p>{{ $test->product->shortDesc }}</p>
    </div>
    <form method="post" action="{{url('/rate')}}">
    @csrf
        @foreach($test->criterias as $criteria)
        <div class="critere">
            <div>{{$criteria->name}}</div>
            <div class="my-rating" id="{{$criteria->id}}" {{($test->rating)? "data-rating=".$criteria->pivot->note."" : '' }}></div>
            <input type="hidden" name="crit{{$criteria->id}}" value="{{($test->rating)? $criteria->pivot->note : '' }}">
        </div>
        @endforeach
        
        <div class="critere">
            <div>Note globale</div>
            <div class="my-rating global" id="global" {{($test->rating)? "data-rating=".$test->rating."" : '' }}></div>
            <input type="hidden" name="critglobal">
        </div>
        
        @if($errors->any())
            <span class="invalid-feedback" role="alert"><strong>Tous les critères doivent être notés</strong></span>
        @endif

        <input type="hidden" name="test_id" value="{{$test->id}}">
        <textarea id="comment" name="comment" rows="4" cols="50" maxlength="200" placeholder="Commentaire(max 200 caractères)">{{$test->comment}}</textarea>
        @if(!$test->rating)
        <button type="submit" id="submit">Envoyer</button>
        @endif
    </form>
    <script>
        if($('#global').data('rating')) rated = true
        else rated = false

        $(".my-rating").starRating({
            readOnly: rated,
            disableAfterRate: false,
            starSize: 20,
            useFullStars: true,
            callback: function(currentRating, $el){
                $(`[name='crit${$el.context.id}']`).val(currentRating)
            }
        });
    </script>
@endsection