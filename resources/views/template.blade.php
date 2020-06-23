<html>

    <head>
        <title>Bike Test - Gryon</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/nav.css') }}" >
    </head>
    <body>
        @section('sidebar')
            <nav>
                      <div id="logo-container">
                <img src="{{ asset('img/logoBikeTest.png') }}" alt="">
              </div>
              <ul id="menu">
                <li><a href="#">Infos</a> </li>
                <li><a href="#">Catalogue</a> </li>
                <li><a href="#">Mes vélos</a> </li>
              </ul>
              <div id="user-icon">
              <a href="#"><img src="{{ asset('img/user-icon.svg') }}" alt=""></a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="#">
                      Drop Item 1
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Drop Item 2
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Drop Item 3
                    </a>
                  </li>
                </ul>
              </div>
            </nav>
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
