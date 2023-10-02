<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Novi igrac</title>
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
    .form-container {
        background-color: #333; 
        padding: 20px;
        border-radius: 10px;
        color: white;
    }

</style>
<body>
    <div class="mx-auto" style="width: 500px; position: relative;">
        <form action="novi_igrac" class="jumbotron mt-1 form-container" method="POST" enctype="multipart/form-data">
            @csrf
            <h2 style="font-weight: bold">Unos novih igrača</h2>
            <label for="ime" class="mt-3">Unesite ime:</label>
            <input type="text" class="form-control" name="ime" placeholder="Ime">
            <label for="prezime" class="mt-3">Unesite prezime:</label>
            <input type="text" class="form-control" name="prezime" placeholder="Prezime">
            <label for="godine" class="mt-3">Unesite godine:</label>
            <input type="number" class="form-control" name="godine" placeholder="Godine">
            <label for="pol" class="mt-3" required>Pol:</label>
            <select class="form-control" name="pol">
                <option value="M" selected>Muški</option>
                <option value="Z">Ženski</option>
            </select>
            <label for="pozicija" class="mt-3" required>Pozicija:</label>
            <select class="form-control" name="pozicija">
               @foreach ($pozicije as $pozicija)
                   <option value="{{$pozicija->id}}">{{$pozicija->naziv}}</option>
               @endforeach
            </select>
            <label for="visina" class="mt-3">Visina (cm):</label>
            <input type="number" class="form-control" name="visina" placeholder="Unesite visinu (cm)">
            <label for="tezina" class="mt-3">Tezina(kg):</label>
            <input type="number" class="form-control" name="tezina" placeholder="Unesite tezinu">
            <label for="brKartona" class="mt-3">Broj kartona:</label>
            <input type="text" class="form-control" name="brKartona" placeholder="Unesite broj kartona">
            <label for="dres" class="mt-3">Broj dresa:</label>
            <input type="text" class="form-control" name="brDresa" placeholder="Unesite broj dresa">
            <label for="s" class="mt-3">Slika(Nije obavezno):</label>
            <input type="file" class="form-control mt-3" name="slika" id="slika">
            <input type="submit" class="btn btn-primary btn-success mt-3" value="Unesi igrača">
        </form>
    </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
        @include('footer')
</body>
</html>
