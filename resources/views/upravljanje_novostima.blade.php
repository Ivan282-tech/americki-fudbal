<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <title>Document</title>
    @include('header')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container  mt-5">
    @if (count($novosti) > 0)
    @foreach ($novosti as $novost)
    <div class="post mb-">
        <h3 class="text-primary font-weight-bold">{{$novost->naslov}}</h3>
        <p class="text-muted">{{$novost->vreme_objave}}</p>
        <p class="post-text">{{$novost->opis}}</p>
        <div class="post-images">
            @foreach ($novost->slike as $slika)
            <img src="{{ asset('slike_igraca/' . $slika->slika) }}" alt="Slika" />
            @endforeach
        </div>
        <div class="d-flex justify-content-between">
            <form action="{{ route('vrati_formu', ['novost' => $novost]) }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-primary btn-warning">Izmeni novost</button>
            </form>
            <form action="{{ route('obrisi_novost', ['id' => $novost->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Obriši novost</button>
            </form>
        </div>
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
    </div>
    @endif
</div>
<!-- <footer>
    @include('footer');
</footer> -->
</body>
</html>
