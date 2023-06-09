<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ 'Agence de Voyage' }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


  <!-- Scripts -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

  @vite(['resources/css/app.scss', 'resources/js/app.js'])

  <link rel="stylesheet" href=" {{ asset('css/style.css') }}">
</head>

<body>

  {{-- Navbar Du haut --}}

    <nav class="navbar navbar-expand-md navbar-light shadow-sm fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"> Agence de voyage</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>


          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Déconnexion</a>
            <form id="logout-form" action="#" method="POST" class="d-none">
              @csrf
            </form>
          </li>


        </ul>
      </div>
    </div>
  </nav>

  {{-- Navbar Latéral --}}

  <section class="container-fluid">

    <div class="row flex-nowrap mt-4">
      <div class="col-auto col-md-2 col-xl-2 px-sm-2 px-0 mt-4 menuGauche">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100 mt-4">
          <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
              <a href="{{ route('index')}}" class="nav-link align-middle px-0">
                <i class="fs-4 bi-speedometer2"></i>
                <span class="ms-1 d-none d-sm-inline">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('askeds.index')}}" class="nav-link align-middle px-0">
                <i class="bi bi-bookmarks"></i>
                <span class="ms-1 d-none d-sm-inline">Demandes</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('travels.index')}}" class="nav-link align-middle px-0">
                <i class="bi bi-airplane"></i>
                <span class="ms-1 d-none d-sm-inline">Voyages</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('themes.index')}}" class="nav-link align-middle px-0">
                <i class="bi bi-clipboard-heart"></i>
                <span class="ms-1 d-none d-sm-inline">Thèmes</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('types.index')}}" class="nav-link align-middle px-0">
                <i class="bi bi-house-heart"></i>
                <span class="ms-1 d-none d-sm-inline">Types</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('countries.index')}}" class="nav-link align-middle px-0">
                <i class="bi bi-globe-europe-africa"></i>
                <span class="ms-1 d-none d-sm-inline">Pays</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('cities.index')}}" class="nav-link align-middle px-0">
                <i class="bi bi-geo"></i>
                <span class="ms-1 d-none d-sm-inline">Villes</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('contacts.index')}}" class="nav-link align-middle px-0">
                <i class="bi bi-envelope-at"></i>
                <span class="ms-1 d-none d-sm-inline">Contacts</span>
              </a>
            </li>

            <li>
              <a href="{{ route('user.index')}}" class="nav-link px-0 align-middle ">
                <i class="fs-4 bi-people"></i>
                <span class="ms-1 d-none d-sm-inline">Utilisateur</span>
              </a>
            </li>
            <li>
              <a href="
                        {{ route('user.edit', $user = Auth::user())}}
                        " class="nav-link px-0 align-middle">
                <i class="fs-4 bi bi-person"></i>
                <span class="ms-1 d-none d-sm-inline">Mon Compte</span>
              </a>
            </li>
          </ul>

        </div>
      </div>
      @yield('content')
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>