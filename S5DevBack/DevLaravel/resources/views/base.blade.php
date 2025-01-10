<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Pour le menu burger et la barre de recherche -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ asset('js/header-searchbar.js') }}"></script>
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hamburgers/1.1.3/hamburgers.min.css">

    <!-- Pour les notifications -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
</head>
<body>

<div class="header container-fluid sticky-top">
  <nav class="nav row d-md-none">
    <div class="nav1 col-6">
        <div class="nav-tab d-flex align-items-center justify-content-between w-100">
            <button class="navbar-toggler navbar-toggler-left x collapsed" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
    </div>
    <div class="collapse navbar-collapse mr-md-5" id="navbarText">
        <ul class="navbar-nav ml-auto">
          <!-- Si on est déjà sur la page "home" afficher le lien en vert -->
            @if ((Route::current()->getName() == 'home')||(Route::current()->getName() == ''))
            <li class="nav-item active text-center animated fadeInDown">
              <a class="nav-link">HOME<span class="sr-only">(current)</span></a>
            </li>
            @else
            <li class="nav-item text-center animated fadeInDown">
                <a class="nav-link" href="{{ route('home') }}">HOME</a>
            </li>
            @endif

            @guest

            @if (Route::has('login'))
            <li class="nav-item text-center animated fadeInDown">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Log In') }}</a>
            </li>
            @endif
            @if (Route::has('register'))
            <li class="nav-item text-center animated fadeInDown">
                <a class="nav-link" href="{{ route('register.choose.account.type') }}">{{ __('Register') }}</a>
            </li>
            @endif

            @else

              @if (Route::current()->getName() == 'reservation.index')
              <li class="nav-item active text-center animated fadeInDown">
                <a class="nav-link">MY RDV<span class="sr-only">(current)</span></a>
              </li>
              @else
              <li class="nav-item text-center animated fadeInDown">
                <a class="nav-link" href="{{ route('reservation.index') }}">MY RDV</a>
              </li>
              @endif

            <li class="nav-item text-center animated fadeInDown">
                <a class="nav-link" href="profile.html">PROFILE</a>
            </li>
            
            @endguest

        </ul>
    </div>
    
    <div class="nav2 col-6">
        <div class="header-search-bar-display d-none" id="header-search-bar-display">
            <form action="index.html">
                <!-- Search icon -->
                <input type="text" id="header-search-bar"
                    placeholder="Rechercher un professionnel"
                    name="search">
            </form>
        </div>
        <button class="nav-tab header-search-bar-button" type="button" onclick="header_searchbar()">
            <!-- Search -->
            <span class="nav-icon" id="searchbar-icon">
                <svg width="20px" height="20px" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="6.5" cy="6.5" r="5.75" stroke="#FFFFFF" stroke-width="1.5"/>
                    <line x1="11.0607" y1="11" x2="15" y2="14.9393" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
            </span>
            <span class="nav-icon d-none" id="searchbar-cross">
                <svg width="20px" height="20px" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="2" y1="14" x2="14" y2="2" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round"/>
                    <line x1="2" y1="2" x2="14" y2="14" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
            </span>
        </button>
    </div>
</nav>
<nav class="nav row d-none d-md-flex">
    <div class="logo header-logo col-sm-2">
        <!-- Logo En-tête -->
        <img width="55px" height="55px" src="{{ asset('favicon.ico') }}" alt="Logo">
    </div>
    <div class="nav1 col-sm-7">

       <!-- Si on est sur la page "home" afficher le lien en vert -->
        @if ((Route::current()->getName() == 'home')||(Route::current()->getName() == ''))
        <a class="nav-tab current-nav-tab">
            <!-- Home icon -->
            <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"  width="20px" height="20px" stroke="#009951">
                <g>
                 <path fill-opacity="0" stroke-width="4" id="svg_1" d="m23.07227,5.2286l-14.21289,11.08146c-1.8039,1.40693 -2.85938,3.55681 -2.85938,5.82971l0,18.89242c0,1.34949 1.13641,2.47415 2.5,2.47415l8.64979,0c1.36359,0 2.41561,-1.12466 2.41561,-2.47415l0,-10.31852c0,-0.37638 -0.0482,-0.57922 0.58439,-0.57922l7.61603,0c0.37944,0 0.58439,0.20284 0.58439,0.66361l0.08439,10.14975c0,1.34949 1.05202,2.47415 2.41561,2.47415l8.64979,0.08439c1.36359,0 2.5,-1.12466 2.5,-2.47415l0,-18.89242c0,-2.2729 -1.05548,-4.42278 -2.85937,-5.82971l-14.2129,-11.08146c-0.61849,-0.59072 -1.23697,-0.59072 -1.85546,0z"/>
                </g>
            </svg>
        @else
        <a href="{{ route('login') }}" class="nav-tab">
          <!-- Home icon -->
          <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"  width="20px" height="20px" stroke="#ffffff">
              <g>
               <path fill-opacity="0" stroke-width="4" id="svg_1" d="m23.07227,5.2286l-14.21289,11.08146c-1.8039,1.40693 -2.85938,3.55681 -2.85938,5.82971l0,18.89242c0,1.34949 1.13641,2.47415 2.5,2.47415l8.64979,0c1.36359,0 2.41561,-1.12466 2.41561,-2.47415l0,-10.31852c0,-0.37638 -0.0482,-0.57922 0.58439,-0.57922l7.61603,0c0.37944,0 0.58439,0.20284 0.58439,0.66361l0.08439,10.14975c0,1.34949 1.05202,2.47415 2.41561,2.47415l8.64979,0.08439c1.36359,0 2.5,-1.12466 2.5,-2.47415l0,-18.89242c0,-2.2729 -1.05548,-4.42278 -2.85937,-5.82971l-14.2129,-11.08146c-0.61849,-0.59072 -1.23697,-0.59072 -1.85546,0z"/>
              </g>
          </svg>
        @endif
        Home
        </a>

        @if (Auth::check()) <!-- Si l'utilisateur est connecté -->
          @if (Route::current()->getName() == 'reservation.index')
          <a class="nav-tab current-nav-tab">
              <!-- MyRdv icon -->
              <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20px" height="20px" stroke="#009951">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                  <g id="SVGRepo_iconCarrier"> <path d="M3 10H21M7 3V5M17 3V5M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#009951" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> </g>    
              </svg>
          @else
          <a href="{{ route('reservation.index') }}" class="nav-tab">
            <!-- MyRdv icon -->
            <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20px" height="20px" stroke="#FFFFFF">
                <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                <g id="SVGRepo_iconCarrier"> <path d="M3 10H21M7 3V5M17 3V5M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> </g>    
            </svg>
          @endif
              
          My RDV
          </a>

        @endif
    </div>
    <div class="nav2 col-md-3">

      @guest
        @if (Route::has('login'))
                <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Log In') }}</a>
        @endif

        @if (Route::has('register'))
                <a class="btn btn-light" href="{{ route('register.choose.account.type') }}">{{ __('Register') }}</a>
        @endif
      @else

      <a class="nav-tab nameProfil" href="#">{{-- href="{{ route('profil.index') }}" --}}
        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 20" width="17px" height="17px" fill="#FFFFFF" version="1.1">
          <g id="SVGRepo_bgCarrier" stroke-width="0"/>     
          <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
          <g id="SVGRepo_iconCarrier"> <title>profile_round []</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-140.000000, -2159.000000)" fill="#ffffff"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M100.562548,2016.99998 L87.4381713,2016.99998 C86.7317804,2016.99998 86.2101535,2016.30298 86.4765813,2015.66198 C87.7127655,2012.69798 90.6169306,2010.99998 93.9998492,2010.99998 C97.3837885,2010.99998 100.287954,2012.69798 101.524138,2015.66198 C101.790566,2016.30298 101.268939,2016.99998 100.562548,2016.99998 M89.9166645,2004.99998 C89.9166645,2002.79398 91.7489936,2000.99998 93.9998492,2000.99998 C96.2517256,2000.99998 98.0830339,2002.79398 98.0830339,2004.99998 C98.0830339,2007.20598 96.2517256,2008.99998 93.9998492,2008.99998 C91.7489936,2008.99998 89.9166645,2007.20598 89.9166645,2004.99998 M103.955674,2016.63598 C103.213556,2013.27698 100.892265,2010.79798 97.837022,2009.67298 C99.4560048,2008.39598 100.400241,2006.33098 100.053171,2004.06998 C99.6509769,2001.44698 97.4235996,1999.34798 94.7348224,1999.04198 C91.0232075,1998.61898 87.8750721,2001.44898 87.8750721,2004.99998 C87.8750721,2006.88998 88.7692896,2008.57398 90.1636971,2009.67298 C87.1074334,2010.79798 84.7871636,2013.27698 84.044024,2016.63598 C83.7745338,2017.85698 84.7789973,2018.99998 86.0539717,2018.99998 L101.945727,2018.99998 C103.221722,2018.99998 104.226185,2017.85698 103.955674,2016.63598" id="profile_round-[]"> </path> </g> </g> </g> </g>        
        </svg>Profile
      </a>

      <!-- DECONNEXION -->
      <a class="btn btn-secondary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
      </form>

@endguest
    </div>
</nav>



<!-- <nav>
        <ul>
            <li><a href="/" class="@yield('home_active')">Accueil</a></li>
            <li><a href="{{ route('reservation.index') }}" class="@yield('catalogue_active')">Réservations</a></li>
            <li><a href="{{ route('entreprise.index') }}" class="@yield('entreprises_active')">Entreprises</a></li>
            <li><a href="{{ route('calendrier.index') }}" class="@yield('creneau_active')">Créneaux</a></li>
            @guest
            @else
              <li><a href="{{ route('parametrage.index') }}" class="@yield('parametrage_active')">Paramétrer vos plannings</a></li>
            @endguest
        </ul>
    </nav>
-->

    <!-- <div class="burger-menu">
        <button class="hamburger hamburger--collapse" type="button">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
        <nav class="menu">
            <ul>
                <li><a href="/" class="@yield('home_active')">Accueil</a></li>
                <li><a href="{{ route('reservation.index') }}" class="@yield('catalogue_active')">Réservations</a></li>
                <li><a href="{{ route('entreprise.index') }}" class="@yield('entreprises_active')">Entreprises</a></li>
                <li><a href="{{ route('calendrier.index') }}" class="@yield('creneau_active')">Créneaux</a></li>
            </ul>
        </nav>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var burger = document.querySelector('.hamburger');
            var menu = document.querySelector('.menu');

            burger.addEventListener('click', function() {
                burger.classList.toggle('is-active');
                menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
            });
        });
    </script> -->

    <!-- <div class="wrapper">
      <div class="item menu">
        <div class="linee linee1"></div>
        <div class="linee linee2"></div>
        <div class="linee linee3"></div>
      </div>
      <div class="item gallery">
        <div class="dot dot1"></div>
        <div class="dot dot2"></div>
        <div class="dot dot3"></div>
        <div class="dot dot4"></div>
        <div class="dot dot5"></div>
        <div class="dot dot6"></div>
      </div>
      <button class="item add">
        <div class="circle">
          <div class="close">
          <div class="line line1"></div>
          <div class="line line2"></div>
        </div>
        </div>
        <input type="search" placeholder="search" class="search" />
        
      </button>

      <div class="nav-items items1">
        <i class="fas fa-home"></i>
      </div>
      <div class="nav-items items2">
        <i class="fas fa-camera"></i>
      </div>
      <div class="nav-items items3">
        <i class="fas fa-folder"></i>
      </div>
      <div class="nav-items items4">
        <i class="fas fa-heart"></i>
      </div>
      <div class="box">
        <div class="box-line box-line1"></div>
        <div class="box-line box-line2"></div>
        <div class="box-line box-line3"></div>
        <div class="box-line box-line4"></div>
      </div>
    </div>

    <div class="effect"></div>

    <script>
    document.querySelector(".circle").addEventListener("click", () => {
        for (let i = 0; i <= 3; i++) {
          document
            .getElementsByClassName("nav-items")
            [i].classList.remove("show-menu");
          document
            .getElementsByClassName("box-line")
            [i].classList.remove("box-line-show");
        }
        document.querySelector(".box").classList.remove("box-show");
        document.querySelector(".add").classList.toggle("go");
        document.querySelector(".search").classList.toggle("search-focus");
        document.querySelector(".search").focus();
        document.querySelector(".circle").classList.toggle("color");
        document.querySelector(".line1").classList.toggle("move");
        document.querySelector(".line2").classList.toggle("mov");
        document.querySelector(".effect").classList.toggle("big");
      });
      /* menu */
      document.querySelector(".menu").addEventListener("click", () => {
        for (let i = 0; i <= 3; i++) {
          document.querySelector(".box").classList.remove("box-show");
          document
            .getElementsByClassName("nav-items")
            [i].classList.toggle("show-menu");
          document
            .getElementsByClassName("box-line")
            [i].classList.remove("box-line-show");
        }
      });
      /* box */
      document.querySelector(".gallery").addEventListener("click", () => {
        document.querySelector(".box").classList.toggle("box-show");
        for (let i = 0; i <= 3; i++) {
          document
            .getElementsByClassName("box-line")
            [i].classList.toggle("box-line-show");
          document
            .getElementsByClassName("nav-items")
            [i].classList.remove("show-menu");
        }
      });
    </script> -->


  <!-- 
    <div class="profileInfo">
    @guest
            @if (Route::has('login'))
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
            @endif

            @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register.choose.account.type') }}">{{ __('Register') }}</a>
            @endif
        @else
            <a class="nameProfil" href="#">{{-- href="{{ route('profil.index') }}" --}}
              {{ Auth::user()->nom }}
            </a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST">
              @csrf
            </form>
      @endguest
      <a href="/" class="logo">
        <img src="{{ asset('favicon.ico') }}" alt="Logo">
      </a>
      </div>
-->
    
</div>


{{-- <div class="card-header">{{ __('Dashboard') }}</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{ __('You are logged in!') }}
        </div> --}}

<script>
function displaySuccess(message) {
    toastr.options = {
        "closeButton": true,
        "newestOnTop": true,
        "progressBar": true
    }
    toastr.success(message, 'Succés !');
}

function displayError(message) {
    toastr.options = {
        "closeButton": true,
        "newestOnTop": true,
        "progressBar": true
    }
    toastr.error(message, '! Erreur !');
}

function displayMessage(message) {
    toastr.options = {
        "closeButton": true,
        "newestOnTop": true,
        "progressBar": true
    }
    toastr.info(message, 'Information :');
}

function displayWarning(message) {
    toastr.options = {
        "closeButton": true,
        "newestOnTop": true,
        "progressBar": true
    }
    toastr.warning(message, 'Attention...');
}

function displayErrorWithButton(message) {
    toastr.options = {
        "closeButton": true,
        "newestOnTop": true,
        "progressBar": true
    }
    toastr.error(message, '! Erreur !', {
        timeOut: 0,
        extendedTimeOut: 0
    });
}
</script>

@if (session('success'))
    <script>
        toastr.success("{{ session('success') }}");
    </script>
@elseif (session('error'))
    <script>
        toastr.error("{{ session('error') }}");
    </script>
@endif
{{-- 
<div class="container">   --}}
    @yield('content'){{-- 
</div> --}}

</body>
</html>
