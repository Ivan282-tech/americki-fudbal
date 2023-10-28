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
    <link rel="stylesheet" href="{{asset('css/app.css') }}">
</head>


<body>
    <div>
        <div class="row ml-3 justify-content-start">
            @if (count($novosti) > 0)
            <h1 id="title" class="animation">Novosti</h1>
                @foreach ($novosti as $novost)
                <div class="col-md-2 animation mt-5">
                <a href="{{ route('prikaz_posta', ['id' => $novost->id]) }}" target="_blank" class="post-link">
                    <div class="post">
                        <div class="post-images">
                            @if(isset($novost->slike[0]->slika))
                                <img src="{{ asset('slike_igraca/' . $novost->slike[0]->slika) }}" class="img-fluid" alt="Slika" />
                            @else
                            <img src="{{ asset('slike/no_image.png') }}" class="img-fluid" alt="No Image" />
                            @endif
                        </div>
                        <hr class="my-0">
                        <div class="post-details">
                            <p class="text-muted post-date"><strong>{{$novost->vreme_objave}}</strong></p>
                            <h3 class="text-primary font-weight-bold" >{{$novost->naslov}}</h3>
                        </div>
                    </div>
                </a>
                </div>
                @endforeach
            @else
                <p class="text-center" style="font-size: larger">Trenutno nema novih novosti</p>
            @endif
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- <footer>
        @include('footer')
    </footer> -->
   
   
</body>
</html>
