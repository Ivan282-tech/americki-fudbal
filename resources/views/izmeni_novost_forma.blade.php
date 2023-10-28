<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nove vesti!</title>
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
    .form-container {
        background-color: #333; 
        padding: 20px;
        border-radius: 10px;
        color: white;
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
    <?php 
        // function slike($novost){
        //     foreach($novost->slike as $slika){
        //         print_r($slika);
        //     }
        // }
    ?>
<body>
    <div class="col-4 mt-5" style="margin: auto">
        <form action="{{ route('upisi_izmenu', ['id' => $novost->id]) }}" class="mt-3 form-container" enctype="multipart/form-data" method="POST">
            @csrf
            <label for="Naslov">Naslov</label>
            <input type="text" class="form-control" name="naslov" placeholder="Naslov" value="{{$novost->naslov}}" required>
            <label for="Opis" class="mt-3">Tekst vaše novosti:</label>
            <textarea class="form-control"  name="tekst" rows='10' placeholder="Tekst..." required>{{$novost->opis}}</textarea>
            <label for="slike" class="mt-3">Slike (Ako želite da zadržite slike morate ih uneti opet, a ukoliko želite da ih izbacite ostavite ovo polje prazno.   ):</label>
        
            <input type="file" name="slike[]"  class="form-control" rows='10' name="slike" multiple>  
        
            <button type="submit" class="btn btn-primary btn-warning mt-3" >Sačuvaj izmene</button>
        </form>
    </div>
    @if ($errors->any())
        <div class="custom-alert col-12">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- <footer>
        @include('footer')
    </footer> -->
</body>
</html>