<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DVDtèque</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <h1>Ma DVDtèque</h1>
<?php
require 'database.php';

$query = $pdo->query("SELECT * FROM films ORDER BY idFilm;");
$films = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<table class="table table-striped">
    <tr>
        <th>Affiche</th>
        <th>Titre</th>
        <th>Année de sortie</th>
        <th>Genres</th>
        <th>Pays</th>
    </tr>

    <?php

    if (count($films) > 0) {
        foreach ($films as $row) {
            echo "<tr><td><img src=" . $row["affiche"] . "/> </td><td>" . $row["titre"] . "</td><td>" . $row["annee"] . "</td><td>" . $row["genres"] . "</td><td>" . $row["pays"] . "</td></tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Aucune donnée</td></tr>";
    }
    ?>
</table>

</body>

</html>