<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Igrači</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    @include('header')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>


<body>
    <div class="container  justify-content-center" >
        @if (count($igraci) > 0)
        <h1 id="title" class="animated-fade-in">Juniorski tim</h1>
        <hr class="my-3">
        <div class="row justify-content-start" >
            @foreach ($igraci as $igrac)
            <div class="col-3 player-card animated-fade-in">
                <div>
                    @if($igrac->slika == null)
                        <img src="slike/no_image.png"  class="img-fluid player-image">
                    @else
                        <img src="{{$igrac->slika}}" alt="{{$igrac->ime}}" class="img-fluid player-image">
                    @endif
                </div>
                <div class="container" id="basic-info">
                    <h3>{{$igrac->ime}} {{$igrac->prezime}}</h3>
                    <hr>
                    <p><strong>Godina:</strong> {{$igrac->godina}}</p>
                    <hr>
                    <p><strong>Pozicija:</strong> {{$igrac->naziv}}</p>
                    
                    <hr>
                    <div class="more-info" hidden>
                        <p><strong>Broj kartice:</strong> {{$igrac->broj_kartice}}</p>
                        <p><strong>Broj dresa:</strong> {{$igrac->broj_dresa}}</p>
                        <p><strong>Visina:</strong> {{$igrac->visina}} cm</p>
                        <p><strong>Težina:</strong> {{$igrac->tezina}} kg</p>
                        <p><strong>Pol:</strong> {{$igrac->pol}}</p>
                    </div>
                   
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-center" style="font-size: larger">Trenutno nema igrača.</p>
        @endif
        <br>
    </div>
    <!-- <footer>
        @include('footer')
    </footer>
         -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>
