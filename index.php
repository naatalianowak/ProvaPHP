<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <title>DEMO PHP</title>
</head>
<body>
    <h1>
        <?php
        echo "Les millors pelis del segle XXI!!";
        ?>
    </h1>
    
    <form method="POST">
        <input type="text" name="search" placeholder="Buscar pel·lícula..." required>
        <button type="submit">Buscar</button>
    </form>

    <?php
    $films = [
        [
            "name" => "Dune",
            "director" => "George Miller",
            "year" => "2015"
        ],
        [
            "name" => "Blade Runner 2049",
            "director" => "Denis Villeneuve",
            "year" => "2017"
        ],
        [
            "name" => "Mad Max: Fury Road",
            "director" => "George Miller",
            "year" => "2015"
        ],
        [
            "name" => "Avatar",
            "director" => "James Cameron",
            "year" => "2009"
        ],
        [
            "name" => "The Dark Knight",
            "director" => "Christopher Nolan",
            "year" => "2008"
        ]
    ];
    
    function displayFilms($films, $title) {
        echo "<h2>$title</h2>";
        echo '<ul>';
        foreach ($films as $film) {
            echo '<li>';
            echo '<strong>Nombre:</strong> ' . htmlspecialchars($film['name']) . '<br>';
            echo '<strong>Director:</strong> ' . htmlspecialchars($film['director']) . '<br>';
            echo '<strong>Año:</strong> ' . htmlspecialchars($film['year']);
            echo '</li>';
        }
        echo '</ul>';
    }

    // Mostrar todas las películas inicialmente
    displayFilms($films, "Totes les pel·lícules:");

    // Filtrar películas según búsqueda
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['search'])) {
        $searchTerm = strtolower(trim($_POST['search']));
        $filteredFilms = array_filter($films, function($film) use ($searchTerm) {
            return strpos(strtolower($film['name']), $searchTerm) !== false;
        });
        
        if (!empty($filteredFilms)) {
            displayFilms($filteredFilms, "Resultats de la cerca:");
        } else {
            echo "<h2>No s'han trobat pel·lícules per a '$searchTerm'</h2>";
        }
    }

    // Películas anteriores al 2010
    $filmsBefore2010 = array_filter($films, function($film) {
        return $film['year'] < 2010;
    });

    displayFilms($filmsBefore2010, "Pel·lícules anteriors al 2010");
    ?>
</body>
</html>
