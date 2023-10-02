<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Igrači</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    @include('header')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
</head>
<style>
    body{
        background-image: url("slike/pozadina_igraci.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
    .player-card {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: transform 0.3s, box-shadow 0.3s;
        width: 100%;
        margin-bottom: 20px;
        opacity: 0.9;
        margin-left: 20px;
        background-color: transparent; 
    }
    .player-card.loaded {
        opacity: 1; 
        transform: scale(1);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 0.9;
        }
    }

    .animated-fade-in {
        animation: fadeIn 1s ease-in-out; 
    }

    .player-card:hover {
        transform: scale(1.05); 
        box-shadow: 0 12px 20px 0 rgba(0,0,0,0.2); 
    }

    .player-image {
        width: 100%;
        height: 300px; 
        object-fit: cover; 
    }


    #title{
        padding: 50px 100px 50px 100px;
        text-align: center;
        background-color: #12072d;
        margin-top: 30px;
        color: white;
    }
    #basic-info{
        background-color:#12072d;
        color: white;
        opacity: 1;
    }
    hr {
        border: 0; 
        border-top: 1px solid #ccc;
        margin: 10px 0; 
    }
    .footer{
        bottom: 0;
        position: fixed;
    }
</style>


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
                    <!-- <p><strong>Broj kartice:</strong> {{$igrac->broj_kartice}}</p>
                    <p><strong>Broj dresa:</strong> {{$igrac->broj_dresa}}</p>
                    <p><strong>Visina:</strong> {{$igrac->visina}} cm</p>
                    <p><strong>Težina:</strong> {{$igrac->tezina}} kg</p>
                    <p><strong>Pol:</strong> {{$igrac->pol}}</p>
                    <p>-->
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-center" style="font-size: larger">Trenutno nema igrača.</p>
        @endif
        <br>
    </div>
    <div class="footer">
        @include('footer')
    </div>
        
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
