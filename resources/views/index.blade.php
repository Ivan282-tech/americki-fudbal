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
    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
</head>
<style>
   body {
        background-image: url("slike/pozadina_igraci.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .post {
        background-color: rgba(255, 255, 255, 0.8);
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        margin-bottom: 10px; 
        padding: 0;
        width: 300px;
        transition: transform 0.2s;
    }
    .post:hover {
        transform: scale(1.05);
    }
    @keyframes animation {
        from {
            opacity: 0;
            transform: translateX(-20px); 
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    .animation {
        animation: animation 1s ease-in-out;
    }
    
    .post h3 {
        font-size: 24px;
        margin-top: 0;
        text-align: center; 
        height: 60px; 
        overflow: hidden; 
    }

    .post-text {
        margin: 10px;
        overflow: hidden; 
        text-overflow: ellipsis; 
        white-space: nowrap; 
    }

    .post-images {
        width: 100%;
        height: 150px;
        overflow: hidden;
    }

    .post-images img {
        width: 100%;
        height: 100%;
        object-fit: cover; 
    }

    .post-details {
        padding: 10px;
        text-align: left;
    }

    .post-date {
        font-size: 14px;
        margin-bottom: 5px;
        margin-top: -10px; /* Pomeri datum bliže slici */
    }

    .footer {
        position: fixed;
    }
    #title{
        padding: 50px 100px 50px 100px;
        text-align: center;
        background-color: #12072d;
        margin-top: 30px;
        color: white;
        opacity: 1;
        font-weight: bolder;
    }
</style>
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
    <div class="footer">
        @include('footer')
    </div>
</body>
</html>
