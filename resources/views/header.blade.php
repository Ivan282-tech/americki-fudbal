<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rugby Tim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('slike/logo.png') }}" alt="Logo" width="100">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Početna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="noviIgrac">Dodaj Igrača</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listaIgraca">Lista Igrača</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
