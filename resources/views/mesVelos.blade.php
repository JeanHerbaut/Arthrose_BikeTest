@extends('layouts.template')
@section('content')
<link defer rel="stylesheet" type="text/css" href="{{ asset('css/mesVelos.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="tab">

    <button class="tablink" onclick="openPage('test')" id="defaultOpen">Test</button>
    <button class="tablink" onclick="openPage('favoris')">Favoris</button>
</div>

<!-- Tab content -->
<div id="favoris" class="tabcontent">
    <h3>Favoris</h3>
    <div class="wrapper-velos">
    @foreach($favProducts as $product)
    <a class="test" href="{{url('/velo/'.$product->id)}}">
        <div class="svg-container">
            <div class="content-vignette">
              <img class="velo-img" src="{{url($product->image)}}" alt="">
              <p id="type">{{$product->category_name}}</p>
              <p id="dollar">{{formatPrice($product->price)}}</p>
              <div>
                  <p id="model">{{$product->shortDesc}}</p>
                  <p id="marque">{{$product->brand->name}}</p>
              </div>

                <div id="rating">
                    <div class="star">
                    @if($product->avgNote)
                        <img src="{{ asset('img/star.svg') }}" alt="">
                        <p><b>{{$product->avgNote}}</b>({{$product->tests_count}})</p>
                    @endif
                    </div>
                    @auth
                    <div class="heart" data-id="{{$product->id}}">
                        <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60.47 54.19">
                            <defs>
                                <style>
                                    .cls-1 {
                                        stroke: red;
                                        stroke-miterlimit: 10;
                                        stroke-width: 3px;
                                        fill: #fff;
                                    }
                                </style>
                            </defs>
                            <path class="cls-1 {{($product->isFavoriteOf->isNotEmpty()) ? 'filled' : ''}}"
                              d="M720.5,843.26v2.58a2.57,2.57,0,0,0-.08.38,20.24,20.24,0,0,1-3.39,9.34,39.87,39.87,0,0,1-7,8c-5.27,4.71-10.63,9.33-16,14a3.34,3.34,0,0,1-4.76-.12q-6.13-5.26-12.24-10.56a63.1,63.1,0,0,1-9.54-9.79,21,21,0,0,1-4.23-9.36c-.84-5.52.23-10.6,3.91-14.91a15,15,0,0,1,14.06-5.3,14.67,14.67,0,0,1,9,4.94c.52.56,1,1.16,1.51,1.78l.71-.92c.25-.3.51-.6.78-.88,4.45-4.69,9.82-6.26,16-4.32,5.77,1.83,9.15,6,10.66,11.81C720.2,841,720.31,842.14,720.5,843.26Z"
                              transform="translate(-661.53 -825.79)" />
                        </svg>
                    </div>
                    @endauth
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
                <path class="cls-2 {{($product->isFavoriteOf->isNotEmpty()) ? 'filled' : ''}}" d="M920,845H566a40,40,0,0,1-40-40V340.5a45,45,0,0,1,60.51-42.17L924,386.71a55.08,55.08,0,0,1,36,51.67V805A40,40,0,0,1,920,845Z"
                  transform="translate(-526 -295.51)" />
            </svg>
        </div>

    </a>
    @endforeach
  </div>
</div>

<div id="test" class="tabcontent">
    <h3>Test</h3>
    <div class="wrapper-velos">
    @foreach($tests_unrated as $test)
    <a class="test" href="{{url('/mesvelos/'.$test->id)}}">
      <div class="svg-container">
          <div class="content-vignette">
            <img class="velo-img" src="{{url($test->product->image)}}" alt="">
            <p id="type">{{$test->product->category_name}}</p>
            <p id="dollar">{{formatPrice($test->product->price)}}</p>
            <div>
                <p id="model">{{$test->product->shortDesc}}</p>
                <p id="marque">{{$test->product->brand->name}}</p>
            </div>

              <div id="rating">
                  <div class="star unrated">
                      À évaluer
                  </div>
                  @auth
                  <div class="heart" data-id="{{$test->product->id}}">
                      <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60.47 54.19">
                          <defs>
                              <style>
                                  .cls-1 {
                                      stroke: red;
                                      stroke-miterlimit: 10;
                                      stroke-width: 3px;
                                      fill: #fff;
                                  }
                              </style>
                          </defs>
                          <path class="cls-1 {{($test->product->isFavoriteOf->isNotEmpty()) ? 'filled' : ''}}"
                            d="M720.5,843.26v2.58a2.57,2.57,0,0,0-.08.38,20.24,20.24,0,0,1-3.39,9.34,39.87,39.87,0,0,1-7,8c-5.27,4.71-10.63,9.33-16,14a3.34,3.34,0,0,1-4.76-.12q-6.13-5.26-12.24-10.56a63.1,63.1,0,0,1-9.54-9.79,21,21,0,0,1-4.23-9.36c-.84-5.52.23-10.6,3.91-14.91a15,15,0,0,1,14.06-5.3,14.67,14.67,0,0,1,9,4.94c.52.56,1,1.16,1.51,1.78l.71-.92c.25-.3.51-.6.78-.88,4.45-4.69,9.82-6.26,16-4.32,5.77,1.83,9.15,6,10.66,11.81C720.2,841,720.31,842.14,720.5,843.26Z"
                            transform="translate(-661.53 -825.79)" />
                      </svg>
                  </div>
                  @endauth
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
              <path class="cls-2 {{($test->product->isFavoriteOf->isNotEmpty()) ? 'filled' : ''}}" d="M920,845H566a40,40,0,0,1-40-40V340.5a45,45,0,0,1,60.51-42.17L924,386.71a55.08,55.08,0,0,1,36,51.67V805A40,40,0,0,1,920,845Z"
                transform="translate(-526 -295.51)" />
          </svg>
      </div>
    </a>
    @endforeach


    @foreach($tests_rated as $test)
    <a class="test" href="{{url('/mesvelos/'.$test->id)}}">
      <div class="svg-container">
          <div class="content-vignette">
            <img class="velo-img" src="{{url($test->product->image)}}" alt="">
            <p id="type">{{$test->product->category_name}}</p>
            <p id="dollar">{{formatPrice($test->product->price)}}</p>
            <div>
                <p id="model">{{$test->product->shortDesc}}</p>
                <p id="marque">{{$test->product->brand->name}}</p>
            </div>

              <div id="rating">
                  <div class="star">
                      <img src="{{ asset('img/star.svg') }}" alt="">
                      <p><b>{{$test->rating}}</b></p>
                  </div>
                  @auth
                  <div class="heart" data-id="{{$test->product->id}}">
                      <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60.47 54.19">
                          <defs>
                              <style>
                                  .cls-1 {
                                      stroke: red;
                                      stroke-miterlimit: 10;
                                      stroke-width: 3px;
                                      fill: #fff;
                                  }
                              </style>
                          </defs>
                          <path class="cls-1 {{($test->product->isFavoriteOf->isNotEmpty()) ? 'filled' : ''}}"
                            d="M720.5,843.26v2.58a2.57,2.57,0,0,0-.08.38,20.24,20.24,0,0,1-3.39,9.34,39.87,39.87,0,0,1-7,8c-5.27,4.71-10.63,9.33-16,14a3.34,3.34,0,0,1-4.76-.12q-6.13-5.26-12.24-10.56a63.1,63.1,0,0,1-9.54-9.79,21,21,0,0,1-4.23-9.36c-.84-5.52.23-10.6,3.91-14.91a15,15,0,0,1,14.06-5.3,14.67,14.67,0,0,1,9,4.94c.52.56,1,1.16,1.51,1.78l.71-.92c.25-.3.51-.6.78-.88,4.45-4.69,9.82-6.26,16-4.32,5.77,1.83,9.15,6,10.66,11.81C720.2,841,720.31,842.14,720.5,843.26Z"
                            transform="translate(-661.53 -825.79)" />
                      </svg>
                  </div>
                  @endauth
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
              <path class="cls-2 {{($test->product->isFavoriteOf->isNotEmpty()) ? 'filled' : ''}}" d="M920,845H566a40,40,0,0,1-40-40V340.5a45,45,0,0,1,60.51-42.17L924,386.71a55.08,55.08,0,0,1,36,51.67V805A40,40,0,0,1,920,845Z"
                transform="translate(-526 -295.51)" />
          </svg>
      </div>
    </a>
    @endforeach
  </div>
</div>
<script>
        let env_url = "{{url('')}}"
    </script>
<script src="{{ asset('js/heartFav.js')}}" type="text/javascript" defer></script>
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
