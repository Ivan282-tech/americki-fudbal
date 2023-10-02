<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <title>Post</title>
    @include('header')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
</head>
<style>
    body{
        overflow: hidden;
    }
    .footer {
        bottom: 0;
        position: fixed;
    }

    .post-content {
        padding: 20px;
    }

    .post-title {
        font-size: 36px; 
        font-weight: bold;
    }

    .post-date {
        font-size: 14px;
    }

    .post-description {
        font-size: 18px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .post-images img {
        width: 100%;
        height: auto;
        object-fit: cover;
        margin-bottom: 10px;
    }
    .footer{
        position: fixed;
    }
</style>
<body>
    <div class= " mt-5 ">
        <div class="row " >
            <div class="col-md-6 ">
                <div class="post-content">
                    <h1 class="post-title">{{$novost->naslov}}</h1>
                    <p class="post-date">{{$novost->vreme_objave}}</p>
                    <p class="post-description">{{$novost->opis}}</p>
                    @if(isset($novost->slike))
                        @foreach($novost->slike as $slika)
                            <a href="{{ asset('slike_igraca/' . $slika->slika) }}" data-lightbox="slike">
                                <img src="{{ asset('slike_igraca/' . $slika->slika) }}" class="img-fluid" alt="Slika" />
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="footer"> 
        @include("footer")
    </div>
</body>
</html>
