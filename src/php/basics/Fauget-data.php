<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    //Ouverture du fichier en mode écriture
    $fichier = fopen("sql/001-Fauget-data.sql", "a");

    //Récupération des données pour la table Products

    //Écriture de la ligne dans le fichier
    $requete = "INSERT INTO Products VALUES (NULL, '" . $produit['nom'] . "', '" . $produit['image'] . "', '" . $produit['alt'] . "', " . number_format(floatval($produit['prix']), 2, '.', '') . ");";
    fwrite($fichier, $requete . "\n");

    //Récupération des données pour les tables de chaque type de produit

    //Initialisation du compteur dans une variable de session
    if (!isset($_SESSION['id'])) {
        $_SESSION['id'] = 1;
    }

    $requete = "INSERT INTO Accessories VALUES (" . $_SESSION['id'] . ");";
    $requete = "INSERT INTO Clothes VALUES (" . $_SESSION['id'] . ");";
    $requete = "INSERT INTO Customs VALUES (" . $_SESSION['id'] . ");";
    $requete = "INSERT INTO Shoes VALUES (" . $_SESSION['id'] . ");";
    fwrite($fichier, $requete . "\n");

    //Incrémentation du compteur piur l'identifiant
    $_SESSION['id']++;

    //Récupération des données de stock pour chaque type de produit

    $requete = "INSERT INTO Stock VALUES ('Acc', " . $_SESSION['id'] . ", '" . $produit['stock'] . "');";
    $requete = "INSERT INTO Stock VALUES ('" . $produit['tailles'][$j] . "', " . $_SESSION['id'] . ", '" . $produit['stock'][$j] . "');";
    $requete = "INSERT INTO Stock VALUES ('" . $produit['tailles'][$j] . "', " . $_SESSION['id'] . ", '" . $produit['stock'][$j] . "');";
    $requete = "INSERT INTO Stock VALUES ('" . $produit['tailles'][$j] . "', " . $_SESSION['id'] . ", '" . $produit['stock'][$j] . "');";
    fwrite($fichier, $requete . "\n");

    //Incrémentation du compteur pour l'identifiant
    $_SESSION['id']++;

    //Fermeture du fichier
    fclose($fichier);
?>