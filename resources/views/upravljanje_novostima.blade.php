<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
    <title>Document</title>
    @include('header')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
</head>
<style>
    body{
        background-color: cadetblue;
    }
    .footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #333; 
        color: white; 
        padding: 10px; 
    }
</style>
<body>
    <div class="container mt-5">
        @if (count($novosti) > 0)
        @foreach ($novosti as $novost)
            <div class="post mb-4 bg-light text-dark p-4 rounded">
                <h3 class="text-primary font-weight-bold">{{$novost->naslov}}</h3>
                <p class="text-muted">{{$novost->vreme_objave}}</p>
                <p class="post-text">{{$novost->opis}}</p>
                <div class="post-images">
                    @foreach ($novost->slike as $slika)
                        <img src="{{ asset('slike_igraca/' . $slika->slika) }}"  width="200px" height="200px" class="img-fluid" alt="Slika" />
                    @endforeach
                </div>
                <!-- @if (Auth::user()->id == $novost->korisnik_id) -->
                    <div class="d-flex justify-content-between">
                        <form action="{{ route('vrati_formu', ['novost' => $novost]) }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-warning mt-3">Izmeni novost</button>
                        </form>
                        <form action="{{ route('obrisi_novost', ['id' => $novost->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Obriši novost</button>
                        </form>
                    </div>
                <!-- @endif -->

            </div>
        @endforeach
        @else
            <p class="text-center" style="font-size: larger">Trenutno ne postoje novosti koje ste objavili</p>
        @endif
        @if ($errors->any())
        <div class="custom-alert col-3">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
    </div>
    <!-- <footer class="footer">
        @include('footer');
    </footer> -->
</body>
</html>