<?php
    $host = 'localhost';
    $dbname = 'api';
    $username = 'root';
    $password = '';

    // A FAIRE : utiliser .ENV pour les variables d'environnement

    try {
        $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }