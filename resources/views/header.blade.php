<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rugby Tim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
   nav {
    background-color: #12072d;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color: white;
    }

    .navbar-nav .nav-link {
        color: white !important; 
    }
    .navbar-nav .nav-link:hover {
        color: white !important; 
        
    }
    .nav-item.dropdown:hover .dropdown-menu {
        display: block;
        background-color:#12072d;
    }
    .navbar-nav .nav-item.dropdown:hover .dropdown-menu a.nav-link {
        color: white !important;
    }
    #tekst-drop .dropdown-item{
        background-color: black;
        color:#fff;
        text-shadow: none !important;
    }
</style>
<body>
    @auth
    <nav class="navbar navbar-expand-lg  navbar-dark fixed-header" >
        <div class="container">
            <a class="navbar-brand" href="{{route('pocetna')}}">
                <img src="{{ asset('slike/logo.png') }}" alt="Logo" width="100">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pocetna') }}"><strong>Početna</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('listaIgraca') }}"><strong>Igrači</strong></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <strong>Admin</strong>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="adminDropdown" id="tekst-drop">
                            <a class="dropdown-item" href="{{ route('noviIgrac') }}">Dodaj Igrača</a>
                            <a class="dropdown-item" href="{{ route('dodajNovost') }}">Dodaj Novost</a>
                            <a class="dropdown-item" href="{{ route('upravljajNovostima') }}">Upravljaj Novostima</a>
                        </div>
                    </li>
                </ul>
            </div>

            </div>
            <div class="navbar-text ml-auto">
                @if(isset(Auth::user()->name))
                <label for="korisnik" class="text-white">Korisnik: {{ Auth::user()->name }}</label>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger" type="submit">Logout</button>
                </form>
                @endif
            </div>
        </div>
    </nav>
    @else
        @include('guest_header')
    @endauth
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
