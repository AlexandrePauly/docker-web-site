<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    //Si l'utilisateur est connecté
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user'])) {
        //Vérifier si le formulaire d'ajout au panier a été soumis
        if (isset($_POST['value'])) {
            $_SESSION['giftCard'] = floatval($_POST['value']);

            //Redirection vers le panier
            header('Location: ../panier.php');
        }
    }
    //Si l'utilisateur n'est pas connecté
    else if (isset($_SERVER['HTTP_REFERER'])) {
        //Affichage d'une alerte
        echo '<script>alert("Vous devez vous connecter ou créer un compte pour ajouter une carte cadeau au panier.");</script>';

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>