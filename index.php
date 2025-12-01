<?php
require 'database.php';

$query = $pdo->query("SELECT * FROM films ORDER BY idFilm;");
$films = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<table>
    <tr>
        <th>Titre</th>
        <th>Année de sortie</th>
        <th>Genres</th>
        <th>Pays</th>
    </tr>

    <?php

    if (count($films) > 0) {
        foreach ($films as $row) {
            echo "<tr><td>" . $row["titre"] . "</td><td>" . $row["annee"] . "</td><td>" . $row["genres"] . "</td><td>" . $row["pays"] . "</td></tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Aucune donnée</td></tr>";
    }
    ?>
</table>