@extends('layouts.template')
@section('content')
<link defer rel="stylesheet" type="text/css" href="{{ asset('css/vignetteGestionCata.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
{{-- <link href="nouislider.css" rel="stylesheet">
<script src="nouislider.js"></script> --}}

<section>

  <div class="wrapper-header">
      <h1>Gestion catalogue</h1>
      <div class="form-header">
          <input type="text" id="input" placeholder="Recherche">
          <button type="submit" id="search-bike"><i class="fa fa-search"></i></button>
          <button id="reset">Effacer le filtre</button>
          <form action="{{route('catalogue.create')}}">
              <button type="submit">Ajouter un vélo</button>
          </form>
      </div>
  </div>
    <div class="wrapper-catalogue">


        <div class="wrapper-velos">
            @foreach ($bikes as $bike)
            <div class="svg-container" data-desc="{{$bike['shortDesc']}}">
                <div class="content-vignette" >
                    <img class="velo-img" src="{{$bike['image']}}" alt="">
                    <p id="type">{{$bike['category']}}</p>
                    @if ($bike['price'] < 1000) <p id="dollar">$
                        </p>
                        @elseif($bike['price'] > 1000 && $bike['price'] < 3000) <p id="dollar">$$</p>
                            @else
                            <p id="dollar">$$$</p>
                            @endif
                            <div>
                                <p id="model">
                                    {{$bike['shortDesc']}}</p>
                                <p id="marque">{{$bike['brand']}}</p>
                            </div>

                            <div id="rating">
                                <div class="star">
                                    <img src="{{ asset('img/star.svg') }}" alt="">
                                    <p><b>{{$bike['rating']}}</b> ({{$bike['nbr_rating']}})</p>
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
                    <path class="cls-2"
                        d="M920,845H566a40,40,0,0,1-40-40V340.5a45,45,0,0,1,60.51-42.17L924,386.71a55.08,55.08,0,0,1,36,51.67V805A40,40,0,0,1,920,845Z"
                        transform="translate(-526 -295.51)" />
                </svg>
            </div>
            @endforeach
        </div>

    </div>
    </div>

</section>
{{-- <script src="{{ asset('js/noUISlider.js')}}" type="text/javascript" defer></script> --}}
<script>
let search = document.getElementById('search-bike')
let reset = document.getElementById('reset')
let elements = document.getElementsByClassName('svg-container')
    search.addEventListener('click', evt => {
    let input = document.getElementById('input').value.toUpperCase()
    if(input.length > 0) {
    for(var i=0; i<elements.length; i++) { if(elements[i].getAttribute('data-desc').toUpperCase() !=input) {
        elements[i].style.display="none" }
        }
    }
    document.getElementById('input').value = ""
})
reset.addEventListener('click', evt => {
    for(var i=0; i<elements.length; i++) {
        elements[i].style.display=null
    }
})

</script>

@endsection
