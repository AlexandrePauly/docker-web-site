<?php
    include_once('../../bdd/bdd.php');

    //Vérifier si l'utilisateur est déjà connecté
    if (isset($_SESSION['user'])) {
        session_destroy();
        header("Location: ../index.php");
        exit();
    }

    //Vérifier si l'action est "connexion"
    if (isset($_POST['action']) && $_POST['action'] == 'connexion') {
        //Ouvrture de la connexion à la base de données
        $mysqli = connectDB2();

        //Initialisation du tableau des utilisateurs
        $users = signIn($mysqli);
    
        //Vérifier si l'utilisateur existe dans le fichier JSON
        foreach ($users as $login) {
            if ($login['email'] == $_POST['email'] && $_POST['mdp'] == $login['passworduser']) {
                $_SESSION['user'] = $_POST['email'];            
                header("Location: ../index.php");
                exit();
            }
        }

        //Fermeture de la connexion à la base de données
        disconnectDB($mysqli);

        //Si les informations de connexion sont incorrectes, afficher un message d'erreur
        echo '<script>alert("Adresse e-mail ou mot de passe incorrect.");</script>';
    }
?>