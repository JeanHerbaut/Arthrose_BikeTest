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
            flex-direction: column;
            justify-content: space-between;
            font-size: 1.5rem;
            margin: 1rem auto;
            padding-left: 6.4rem;
        }

        .svg-container{
          position: relative;
          width: min(14rem,40vw);
          height: min(17rem);
          margin: 0rem 3rem 0rem 1rem;
        }
        #layer_1{
          filter: drop-shadow( 0 0 15px rgba(0, 0, 0, .2));
          width: 100%;
          position: absolute;
          bottom: 0;
          left: 0;
        }


        .content-vignette{
          position: relative;
          z-index: 1;
          height: 100%;
          width: 100%;
          display: flex;
          flex-direction: column;
          justify-content: center;
          padding: 0 5px 5px 10px;
        }

        #model{
          font-size: 1.3rem;
          font-weight: 500;
          margin-top: 3rem;
        }

        #marque{
          font-size: 1.3rem;
        }

        .velo-img{
          position: absolute;
          top: 0;
          right: -25%;
          width: 12rem;
        }

        .wrapper-rating{
          width: 90%;
          margin: auto;
          height: 85vh;
          margin-top: 2rem;
          margin-bottom: 10rem;
          overflow: scroll;
        }

        .wrapper-bike{
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
        }

        .svg-container{
          margin-top: 3rem;
        }

        .text{
          display: flex;
          flex-direction: column;
        }

        .text button{
          background-color: #1b9837;
          border: none;
          color: white;
          padding: 1rem 2rem;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          text-transform: uppercase;
          font-size: 13px;
          p
          -webkit-border-radius: 24px;
          border-radius: 24px;
          -webkit-transition: all 0.3s ease-in-out;
          -moz-transition: all 0.3s ease-in-out;
          -ms-transition: all 0.3s ease-in-out;
          -o-transition: all 0.3s ease-in-out;
          transition: all 0.3s ease-in-out;
          margin-top: 1rem;
          width: 10rem;
        }

        textarea{
            background-color: #ffffff;
            color: #0d0d0d;
            padding: 1rem 2rem;
            text-align: left;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-bottom: 10px;
            border: 2px solid #f6f6f6;
            -webkit-transition: all 0.5s ease-in-out;
            -moz-transition: all 0.5s ease-in-out;
            -ms-transition: all 0.5s ease-in-out;
            -o-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
            -webkit-border-radius: 5px 5px 5px 5px;
            border-radius: 5px 5px 5px 5px;
            font-family: "Montserrat";
            height: 150px;
        }
        #final{
          display: flex;
          justify-content: center;
        }
    </style>
<div class="wrapper-rating">


<a href="#" class="previous round" onclick="history.back()">&laquo;</a>
      <div class="wrapper-bike">


    <p>Testé le <b>{{$test->startTime->format('d.m.Y')}}</b> à <b>{{$test->startTime->format('H:i')}}</b></p>

    <div class="svg-container">
        <div class="content-vignette">
          <img class="velo-img" src="{{url($test->product->image) }}" alt="">
          <p id="type"></p>
          <p id="dollar"></p>
          <div>
              <p id="model">{{ $test->product->brand->name }}</p>
              <p id="marque">{{ $test->product->shortDesc }}</p>
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
            <path class="cls-2 " d="M920,845H566a40,40,0,0,1-40-40V340.5a45,45,0,0,1,60.51-42.17L924,386.71a55.08,55.08,0,0,1,36,51.67V805A40,40,0,0,1,920,845Z"
              transform="translate(-526 -295.51)" />
        </svg>
    </div>

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

        <div class="text">


        <input type="hidden" name="test_id" value="{{$test->id}}">
        <textarea id="comment" name="comment" rows="4" cols="50" maxlength="200" placeholder="Commentaire(max 200 caractères)">{{$test->comment}}</textarea>
        @if(!$test->rating)
        <div id="final">


        <button type="submit" id="submit">Envoyer</button>
        </div>
        @endif

        </div>
    </form>

    </div>
    <script>
        if($('#global').data('rating')) rated = true
        else rated = false

        $(".my-rating").starRating({
            readOnly: rated,
            disableAfterRate: false,
            starSize: 40,
            useFullStars: true,
            callback: function(currentRating, $el){
                $(`[name='crit${$el.context.id}']`).val(currentRating)
            }
        });
    </script>
@endsection
