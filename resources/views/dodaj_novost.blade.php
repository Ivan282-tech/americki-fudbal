<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nove vesti!</title>
    @include('header')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="mx-auto" style="width: 500px; position: relative;">
        <form action="dodaj_novost" class="mt-3 form-container" enctype="multipart/form-data" method="POST">
            @csrf
            <label for="Naslov">Naslov</label>
            <input type="text" class="form-control" name="naslov" placeholder="Unesite naslov vesti" required>
            <label for="Opis" class="mt-3">Tekst vaše novosti:</label>
            <textarea class="form-control"  name="tekst" rows='10' placeholder="Tekst..." required></textarea>
            <label for="slike" class="mt-3">Slike (Nije obavezno):</label>
            <input type="file" name="slike[]"  class="form-control" rows='10' name="slike" multiple>
            <button type="submit" class="btn btn-primary btn-success mt-3" >Dodaj novost</button>
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
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- <footer>
        @include('footer');
    </footer> -->
   
</body>
</html>