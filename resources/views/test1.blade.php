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

<a href="/mesvelos" class="previous round">&laquo;</a>
    <p>Testé le <b>30.07.2020</b> à <b>14h32</b></p>
    <div class="vignette-test">
        <img class="velo-img" src="{{ asset('img/bike.png') }}" alt="" width="100px">
        <p><strong>Velo testé</strong></p>
        <p>SCOTT</p>
    </div>

    <div class="critere">
        <div>Qualité/Prix</div>
        <div class="my-rating"></div>
    </div>
    <div class="critere">
        <div>Poid</div>
        <div class="my-rating"></div>
    </div>
    <div class="critere">
        <div>Comfort</div>
        <div class="my-rating"></div>
    </div>
    <div class="critere">
        <div>Composants</div>
        <div class="my-rating"></div>
    </div>
    <div class="critere">
        <div>Note finale</div>
        <div class="my-rating final"></div>
    </div>
    <textarea id="comment" name="comment" rows="4" cols="50" maxlength="200" placeholder="Commentaire(max 200 caractères)"></textarea>
    <button id="submit">Envoyer</button>
    <script>
        $(".my-rating").starRating({
            starSize: 20,
            useFullStars: true,
            callback: function(currentRating, $el){
                console.log(currentRating);
                console.log($el);
            }
        });
    </script>
@endsection