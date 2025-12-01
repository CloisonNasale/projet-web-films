<?php
$host = '127.0.0.1'; // mettre le bon host qui correspond au conteneur docker
$port = '3307';       
$dbname = 'projet_web_film';
$user = 'projet_user'; //créer un user en amont, car mysql aime pas le root
$password = 'motdepasse';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

?>