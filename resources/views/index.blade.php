<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>DEMO Laravel</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <h1>Les millors pelis del segle XXI!!</h1>
    
    <!-- Formulari per cercar una pel·lícula -->
    <form method="POST" action="{{ route('films.search') }}">
        @csrf
        <input type="text" name="search" placeholder="Escriu aquí..." required>
        <button type="submit">Buscar</button>
    </form>

    <!-- Formulari per afegir una pel·lícula -->
    <form method="POST" action="{{ route('films.add') }}">
        @csrf
        <input type="text" name="name" placeholder="Nom de la pel·lícula" required>
        <input type="text" name="director" placeholder="Director" required>
        <input type="number" name="year" placeholder="Any" required>
        <button type="submit">Afegir</button>
    </form>

    <!-- Formulari per eliminar una pel·lícula -->
    <form method="POST" action="{{ route('films.delete') }}">
        @csrf
        <input type="text" name="name" placeholder="Nom de la pel·lícula a eliminar" required>
        <button type="submit">Borrar</button>
    </form>

    <!-- Mostrar les pel·lícules -->
    <h2>Totes les pel·lícules:</h2>
    <ul>
        @foreach($films as $film)
            <li>
                <strong>Nom:</strong> {{ $film['name'] }}<br>
                <strong>Director:</strong> {{ $film['director'] }}<br>
                <strong>Any:</strong> {{ $film['year'] }}
            </li>
        @endforeach
    </ul>
</body>
</html>
