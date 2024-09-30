<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEMO Laravel</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <header>
        <nav>
            <ul>
        
            <h1>Pel·lícules:</h1>
            <form method="POST" action="{{ route('$filteredFilms') }}">
            <input type="text" name="search" placeholder="Escriu aquí..." required>
            <button type="submit">Buscar</button>
                <br>
                <br>
            </form>
        
    <h1>ÍNDEX: </h1>
                <li><a href="{{ url('/') }}">Inici</a></li>
                <li><a href="{{ url('/films') }}">Pel·lícules</a></li>
                <li><a href="{{ url('/contact') }}">Contacte</a></li>
            </ul>
        </nav>
    </header>
