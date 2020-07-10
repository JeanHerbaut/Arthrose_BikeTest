<html>


<head>
  <title>Bike Test - Gryon</title>
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <link defer rel="stylesheet" type="text/css" href="{{ asset('css/nav.css') }}">
  <!--   <link rel="stylesheet" type="text/css" href="{{ asset('css/billeterie.css') }}" > -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
  <link rel="icon" href="{{ asset('img/icon.ico') }}" />
</head>

<body>
  @section('nav')
  <nav>
    <div class="desktop">

      <div class="tkt" id="logo-container">
        <a href="{{url('/')}}"><img src="{{ asset('img/logoBikeTest.png') }}" alt=""></a>
      </div>
      <ul id="menu">
        <li><a href="{{url('/')}}">Infos</a> </li>
        <li><a href="{{url('/catalogue')}}">Catalogue</a> </li>
        @can('viewMyProducts', App\User::class)
        <li><a href="{{url('/mesvelos')}}">Mes vélos</a> </li>
        @endcan
        @can('manage', App\Test::class)
        <li><a href="{{url('/gestion-test')}}">Tests</a> </li>
        @endcan
        @guest
        <li><a href="{{url('/billeterie')}}">Billeterie</a> </li>
        @endguest
      </ul>
      @if(Auth::check())

      <div class="tkt user-icon online" id="tkt2">
        <p>{{Auth::user()->username}}</p>
        <a href="#"><img src="{{ asset('img/user-icon.svg') }}" alt=""></a>
      </div>
      @else
      <div class="user-icon tkt">
        <a href="{{url('/login')}}"><img src="{{ asset('img/user-icon.svg') }}" alt=""></a>
      </div>
      @endif

      <div class="profile-nav">


        <ul class="dropdown-menu">
          <li>
            <a href="{{url('/profil')}}">
              Mon profil
            </a>
          </li>
          @can('viewMyTicket', App\User::class)
          <li>
            <a href="#">
              Mon billet
            </a>
          </li>
          @endcan
          @can('manage', App\User::class)
          <li>
            <a href="{{url('/gestion-utilisateurs')}}">
              Gestion des utilisateurs
            </a>
          </li>
          @endcan
          @can('manage', App\User::class)
          <li>
            <a href="{{url('/gestion-exposant')}}">
              Gestion des exposants
            </a>
          </li>
          @endcan
          @can('manage', App\Test::class)
          <li>
            <a href="{{url('/gestion-test')}}">
              Gestion des tests
            </a>
          </li>
          @endcan
          @can('manage', App\Product::class)
          <li>
            <a href="{{url('/exposant/catalogue')}}">
              Gestion du catalogue
            </a>
          </li>
          @endcan
          <li>
            <form id="form-nav" method="post" action="{{url('/logout')}}">
              @csrf
              <input type="submit" value="Se déconnecter">
            </form>
          </li>
        </ul>

      </div>
    </div>
    <div class="mobile">
      <div class="profile-nav">


        <ul class="dropdown-menu">
          <li>
            <a href="{{url('/profil')}}">
              Mon profil
            </a>
          </li>
          @can('viewMyTicket', App\User::class)
          <li>
            <a href="#">
              Mon billet
            </a>
          </li>
          @endcan
          @can('manage', App\User::class)
          <li>
            <a href="{{url('/gestion-utilisateurs')}}">
              Gestion des utilisateurs
            </a>
          </li>
          @endcan
          @can('manage', App\User::class)
          <li>
            <a href="{{url('/gestion-exposant')}}">
              Gestion des exposants
            </a>
          </li>
          @endcan
          @can('manage', App\Test::class)
          <li>
            <a href="{{url('/gestion-test')}}">
              Gestion des tests
            </a>
          </li>
          @endcan
          @can('manage', App\Product::class)
          <li>
            <a href="{{url('/exposant/catalogue')}}">
              Gestion du catalogue
            </a>
          </li>
          @endcan
          <li>
            <form id="form-nav" method="post" action="{{url('/logout')}}">
              @csrf
              <input type="submit" value="Se déconnecter">
            </form>
          </li>
        </ul>

      </div>
      <div class="menu">
        <a href="{{url('/')}}"><img src="{{ asset('img/bicycle-01.png') }}" alt=""></a>
        <p>Infos</p>
      </div>
      <div class="menu">
        <a href="{{url('/catalogue')}}"><img src="{{ asset('img/bicycle-04.png') }}" alt=""></a>
        <p>Catalogue</p>
      </div>

      @can('viewMyProducts', App\User::class)
      <div class="menu">
        <a href="{{url('/mesvelos')}}"><img src="{{ asset('img/bicycle-03.png') }}" alt=""></a>
        <p>Mes vélos</p>
      </div>
      @endcan
      @can('manage', App\Test::class)
      <div class="menu">
        <a href="{{url('/gestion-test')}}"><img src="{{ asset('img/write.png') }}" alt=""></a>
        <p>Tests</p>
      </div>
      @endcan
      @guest
      <div class="menu">
        <a href="{{url('/billeterie')}}"><img src="{{ asset('img/coupon.png') }}" alt=""></a>
        <p>Billeterie</p>
      </div>
      @endguest

      @if(Auth::check())

      <div class="menu user-icon online">

        <a href="#">
          <img src="{{ asset('img/bicycle-02.png') }}" alt=""></a>

        <p>Mon compte</p>

      </div>
      @else
      <div class="menu user-icon online">

        <a href="{{url('/login')}}">
          <img src="{{ asset('img/bicycle-02.png') }}" alt=""></a>

        <p>Mon compte</p>

      </div>
      @endif

    </div>
  </nav>
  @show

  <script src="{{ asset('js/nav.js')}}" type="text/javascript" defer></script>


  <div class="wrapper-body">
    @yield('content')
  </div>
</body>
@section('script')

@endsection

</html>
