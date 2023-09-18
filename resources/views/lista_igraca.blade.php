<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista igrača</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('header')
    <div class="container mt-5">
        @if (count($igraci) > 0)
        <h1>Lista igrača</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Slika</th>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Godina</th>
                        <th>Pol</th>
                        <th>Broj kartice</th>
                        <th>Broj dresa</th>
                        <th>Visina</th>
                        <th>Težina</th>
                        <th>Pozicija</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($igraci as $igrac)
                    <tr>
                        <td><img src="{{ asset('public/slike_igraca' . $igrac->slika) }}" alt="{{$igrac->ime}}" width="100" height="100"></td>
                        <td>{{$igrac->ime}}</td>
                        <td>{{$igrac->prezime}}</td>
                        <td>{{$igrac->godina}}</td>
                        <td>{{$igrac->pol}}</td>
                        <td>{{$igrac->broj_kartice}}</td>
                        <td>{{$igrac->broj_dresa}}</td>
                        <td>{{$igrac->visina}} cm</td>
                        <td>{{$igrac->tezina}} kg</td>
                        <td>{{$igrac->naziv}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">Nema dostupnih igrača.</p>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
