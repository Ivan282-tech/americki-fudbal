<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rugby Tim</title>
    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
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
</style>
<body>
    <nav class="navbar navbar-expand-lg  navbar-dark fixed-header">
        <div class="container">
            <a class="navbar-brand" href="{{route('pocetna')}}">
                <img src="{{ asset('slike/logo.png') }}" alt="Logo" width="100">
            </a>
            <ul class="navbar-nav mr-auto"> <!-- Dodao sam 'mr-auto' umesto 'ml-auto' -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('pocetna')}}"><strong>Početna</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('listaIgraca')}}"><strong>Igrači</strong></a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link btn btn-primary" href="login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary ml-3" href="register">Register</a>
                </li>
            </ul>
        </div>
    </nav>
</body>
</html>
