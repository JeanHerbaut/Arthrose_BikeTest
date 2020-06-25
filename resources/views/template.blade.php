<html>

    <head>
        <title>Bike Test - Gryon</title>
        <link defer rel="stylesheet" type="text/css" href="{{ asset('css/nav.css') }}" >
        <script
			  src="https://code.jquery.com/jquery-3.5.1.min.js"
			  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
			  crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    </head>
    <body>
        @section('nav')
            <nav>
              <div class="desktop">


                      <div id="logo-container">
                <img src="{{ asset('img/logoBikeTest.png') }}" alt="">
              </div>
              <ul id="menu">
                <li><a href="#">Infos</a> </li>
                <li><a href="#">Catalogue</a> </li>
                <li><a href="#">Mes vélos</a> </li>
              </ul>
              <div class="user-icon">
              <a href="#"><img src="{{ asset('img/user-icon.svg') }}" alt=""></a>

              </div>
              <div class="profile-nav">


                  <ul class="dropdown-menu">
                    <li>
                      <a href="#">
                        Mon profil
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        Mon billet
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        Se connecter
                      </a>
                    </li>
                  </ul>

              </div>
              </div>
              <div class="mobile">
                <div class="menu">
                  <a href="#"><img src="{{ asset('img/bicycle-01.png') }}" alt=""></a>
                  <p>Infos</p>
                </div>
                <div class="menu">
<a href="#"><img src="{{ asset('img/bicycle-04.png') }}" alt=""></a> <p>Catalogue</p>               </div>
                <div class="menu">
<a href="#"><img src="{{ asset('img/bicycle-03.png') }}" alt=""></a>    <p>Mes vélos</p>            </div>
<div class="profile-nav">


    <ul class="dropdown-menu">
      <li>
        <a href="#">
          Mon profil
        </a>
      </li>
      <li>
        <a href="#">
          Mon billet
        </a>
      </li>
      <li>
        <a href="#">
          Se connecter
        </a>
      </li>
    </ul>

</div>

                <div class="menu user-icon">
<img src="{{ asset('img/bicycle-02.png') }}" alt="">

       <p>Mon compte</p>

     </div>
              </div>
            </nav>
        @show

        <div class="container">
            <section>

            </section>
            <section>

            </section>
        </div>
        <script src="{{ asset('js/nav.js')}}" type="text/javascript" defer></script>
@stop
    </body>
</html>
