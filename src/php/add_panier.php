<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    include_once('../bdd/bdd.php');

    //Si l'utilisateur est connecté
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user'])) {
        //Vérifier si le formulaire d'ajout au panier a été soumis
        if (isset($_POST['link'], $_POST['alt'], $_POST['product'], $_POST['price'], $_POST['quantity'], $_POST['nameSize'], $_POST['idProduct']) && intval($_POST['quantity']) > 0) {
            //Récupérer les informations du formulaire
            $ajout = array();

            //Initialisation d'un tableau
            array_push($ajout, $_POST['link']);
            array_push($ajout, $_POST['alt']);
            array_push($ajout, $_POST['product']);
            array_push($ajout, $_POST['price']);
            array_push($ajout, $_POST['quantity']);
            array_push($ajout, $_POST['nameSize']);
            array_push($ajout, $_POST['idProduct']);

            //Ajout du tableau dans note panier
            array_push($_SESSION['panier'], $ajout);

            //Ouvrture de la connexion à la base de données
            $mysqli = connectDB2();

            //Mise à jour des quantités
            foreach($_SESSION['panier'] as $panier){
                if($panier[5] == "Unique"){
                    order("Acc", $panier[6], $panier[4], $mysqli);
                }
                else{
                    order($panier[5], $panier[6], $panier[4], $mysqli);
                }
            }

            //Fermeture de la connexion à la base de données
            disconnectDB($mysqli);

            //Redirection vers le panier
            header('Location: ../panier.php');
        }
        else{
            //Redirection vers la page de provenance
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    //Si l'utilisateur n'est pas connecté
    else if (isset($_SERVER['HTTP_REFERER'])) {
        //Affichage d'une alerte
        echo '<script>alert("Vous devez vous connecter ou créer un compte pour ajouter un article au panier.");</script>';
        
        //Redirection vers la page de provenance
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>