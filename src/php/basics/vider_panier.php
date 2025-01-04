<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    include_once('../../bdd/bdd.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Ouvrture de la connexion à la base de données
        $mysqli = connectDB2();

        //Modification des données dans la base de données
        foreach($_SESSION['panier'] as $panier){
            if($panier[5] == "Unique"){
                reinitialize("Acc", $panier[6], $panier[4], $mysqli);
            }
            else{
                reinitialize($panier[5], $panier[6], $panier[4], $mysqli);
            }
        }

        //Fermeture de la connexion à la base de données
        disconnectDB($mysqli);

        $_SESSION['panier'] = array(); //Initialiser $_SESSION['panier'] comme un tableau vide
        $_SESSION['giftCard'] = 0;

        //Redirection vers la page précédente
        if (isset($_SERVER['HTTP_REFERER'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            //Redirection vers une page par défaut si HTTP_REFERER n'est pas disponible
            header('Location: panier.php');
        }
        exit(); //Terminer le script pour éviter toute exécution supplémentaire
    }
?>