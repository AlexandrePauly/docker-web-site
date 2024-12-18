<?php
    // Variables de connexion à la base de données
    $host = 'db';
    $username = 'root';
    $password = 'pass';
    $database = 'Fauget';

    $retries = 5;
    while ($retries > 0) {
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            break;
        } catch (PDOException $exception) {
            sleep(5);
            $retries--;
        }
    }
?>