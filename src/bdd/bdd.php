<?php
    //Fonction de connexion à la base de données à partir de la racine
    function connectDB() {
        //Variables de connexion à la base de données dans bddData.php
        include_once('../bdd/bddData.php');

        //Connection à la base de données
        $mysqli = new mysqli($host, $username, $password, $database);

        //Affichage d'un message si erreur
        if ($mysqli->connect_errno) {
            throw new Exception("Erreur de connexion MySQLi: " . $mysqli->connect_error);
        }
        
        $mysqli->set_charset("utf8");

        return $mysqli;
    }

    //Fonction de connexion à la base de données à partir du dossier php
    function connectDB2() {
        //Variables de connexion à la base de données dans bddData.php
        include_once('../../bdd/bddData.php');

        //Connection à la base de données
        $mysqli = new mysqli($host, $username, $password, $database);

        //Affichage d'un message si erreur
        if ($mysqli->connect_errno) {
            throw new Exception("Erreur de connexion MySQLi: " . $mysqli->connect_error);
        }
        
        $mysqli->set_charset("utf8");

        return $mysqli;
    }

    //Fonction de déconnexion de la base de données
    function disconnectDB($mysqli) {
        $mysqli->close();
    }

    //Fonction pour récupérer les accessoires
    function getAccessories() {
        //Connexion à la base de données
        $mysqli = connectDB();

        //Récupération des données
        $accessories = 'SELECT product, link, alt, price, quantity, idAccessories FROM Products P, Accessories A, Stock S where P.idProducts = A.idAccessories and A.idAccessories = S.idProducts';
        
        $result = $mysqli->query($accessories);

        if (!$result) {
            throw new Exception("Erreur d'exécution de la requête : " . $mysqli->error);
        }

        //Initialisation de tableaux pour stocker les données
        $tabAccessories = array();

        while ($row = $result->fetch_assoc()) {
            $tabAccessories[] = $row;
        }

        $result->free();

        //Déconnexion de le base de données
        disconnectDB($mysqli);

        return $tabAccessories;
    }

    //Fonction pour récupérer les vêtements
    function getClothes() {
        //Connexion à la base de données
        $mysqli = connectDB();

        //Récupération des données
        $clothes = 'SELECT * FROM Products P, Clothes C where P.idProducts = C.idClothes';
        $stockClothes = 'SELECT * FROM Clothes C JOIN Stock S ON S.idProducts = C.idClothes ORDER BY S.idProducts ASC, FIELD(S.idSize, "XS", "S", "M", "L", "XL")';
        
        $resultClothes = $mysqli->query($clothes);
        $resultStockClothes = $mysqli->query($stockClothes);

        if (!$resultClothes || !$resultStockClothes) {
            throw new Exception("Erreur d'exécution de la requête : " . $mysqli->error);
        }

        //Initialisation de tableaux pour stocker les données
        $tabClothes = array();
        $tabStockClothes = array();

        while ($row = $resultClothes->fetch_assoc()) {
            $tabClothes[] = $row;
        }

        while ($row = $resultStockClothes->fetch_assoc()) {
            $tabStockClothes[] = $row;
        }

        // Retourner les deux éléments dans un tableau associatif
        $twoTab = array(
            "element1" => $tabClothes,
            "element2" => $tabStockClothes
        );

        $resultClothes->free();
        $resultStockClothes->free();

        //Déconnexion de le base de données
        disconnectDB($mysqli);

        return $twoTab;
    }

    //Fonction pour récupérer les customs
    function getCustoms() {
        //Connexion à la base de données
        $mysqli = connectDB();

        //Récupération des données
        $customs = 'SELECT * FROM Products P, Customs C where P.idProducts = C.idCustoms';
        $stockCustoms = 'SELECT * FROM Customs C JOIN Stock S ON S.idProducts = C.idCustoms ORDER BY S.idProducts ASC, FIELD(S.idSize, "40", "41", "42", "43", "44", "45")';
        
        $resultCustoms = $mysqli->query($customs);
        $resultStockCustoms = $mysqli->query($stockCustoms);

        if (!$resultCustoms || !$resultStockCustoms) {
            throw new Exception("Erreur d'exécution de la requête : " . $mysqli->error);
        }

        //Initialisation de tableaux pour stocker les données
        $tabCustoms = array();
        $tabStockCustoms = array();

        while ($row = $resultCustoms->fetch_assoc()) {
            $tabCustoms[] = $row;
        }

        while ($row = $resultStockCustoms->fetch_assoc()) {
            $tabStockCustoms[] = $row;
        }

        // Retourner les deux éléments dans un tableau associatif
        $twoTab = array(
            "element1" => $tabCustoms,
            "element2" => $tabStockCustoms
        );

        $resultCustoms->free();
        $resultStockCustoms->free();

        //Déconnexion de le base de données
        disconnectDB($mysqli);

        return $twoTab;
    }

    //Fonction pour récupérer les chaussures
    function getShoes() {
        //Connexion à la base de données
        $mysqli = connectDB();

        //Récupération des données
        $shoes = 'SELECT * FROM Products P, Shoes S where P.idProducts = S.idShoes';
        $stockShoes = 'SELECT * FROM Shoes Sh JOIN Stock S ON S.idProducts = Sh.idShoes ORDER BY S.idProducts ASC, FIELD(S.idSize, "40", "41", "42", "43", "44", "45")';
        
        $resultShoes = $mysqli->query($shoes);
        $resultStockShoes = $mysqli->query($stockShoes);

        if (!$resultShoes || !$resultStockShoes) {
            throw new Exception("Erreur d'exécution de la requête : " . $mysqli->error);
        }

        //Initialisation de tableaux pour stocker les données
        $tabShoes = array();
        $tabStockShoes = array();

        while ($row = $resultShoes->fetch_assoc()) {
            $tabShoes[] = $row;
        }

        while ($row = $resultStockShoes->fetch_assoc()) {
            $tabStockShoes[] = $row;
        }

        // Retourner les deux éléments dans un tableau associatif
        $twoTab = array(
            "element1" => $tabShoes,
            "element2" => $tabStockShoes
        );

        $resultShoes->free();
        $resultStockShoes->free();

        //Déconnexion de le base de données
        disconnectDB($mysqli);

        return $twoTab;
    }

    //Fonction pour récupérer l'ensemble des produits
    function getNew() {
        //Connexion à la base de données
        $mysqli = connectDB();

        //Récupération des données
        $products = 'SELECT * FROM Products';
        
        $resultProducts = $mysqli->query($products);

        if (!$resultProducts) {
            throw new Exception("Erreur d'exécution de la requête : " . $mysqli->error);
        }

        //Initialisation de tableaux pour stocker les données
        $tabProducts = array();

        while ($row = $resultProducts->fetch_assoc()) {
            $tabProducts[] = $row;
        }

        $resultProducts->free();

        //Déconnexion de le base de données
        disconnectDB($mysqli);

        return $tabProducts;
    }

    //Fonction pour déterminer ce qui sera affiché dans la page nouveautés
    function generateNew($alea){
        //Initialisation du tableau de produits et d'un tableau vide à retourner
        $products = getNew();
        $tab = array();

        //Itération du résultat sur le nombre de valeurs du tableau (Initialisé avec des valeurs aléatoires prises parmi tous les produits)
        for($i = 0 ; $i < count($alea) ; $i++){
            foreach ($products as $row){
                if($row['idProducts'] == $alea[$i]){
                    $tab[] = $row;
                }
            }
        }

        return $tab;
    }

    //Fonction pour récupérer l'ensemble des utilisateurs
    function signIn($mysqli){
        //Récupération des données
        $users = 'SELECT * FROM User';
        
        $result = $mysqli->query($users);

        if (!$result) {
            throw new Exception("Erreur d'exécution de la requête : " . $mysqli->error);
        }

        //Initialisation de tableaux pour stocker les données
        $tabUsers = array();

        while ($row = $result->fetch_assoc()) {
            $tabUsers[] = $row;
        }

        $result->free();

        return($tabUsers);
    }

    //Fonction pour créer un nouvel utilisateur
    function signUp($nameUser, $surname, $email, $birthday, $passwordUser, $mysqli){    
        //Préparer la requête SQL avec des paramètres liés
        $query = $mysqli->prepare("INSERT INTO User (email, nameUser, surnameUser, birthday, passwordUser) VALUES (?, ?, ?, ?, ?)");
        
        //Vérifier si la préparation de la requête a échoué
        if (!$query) {
            throw new Exception("Erreur de préparation de la requête : " . $mysqli->error);
        }
        
        //Lier les paramètres à la déclaration de la requête
        $query->bind_param("sssss", $email, $nameUser, $surname, $birthday, $passwordUser);

        //Requête à écrire dans le fichier 001-Fauget-data.sql
        $write_query = "INSERT INTO User VALUES ('" . $email . "', '" . $nameUser . "', '" . $surname . "', '" . $birthday . "', '" . $passwordUser . "');";
        
        //Exécuter la requête
        $result = $query->execute();
        
        //Vérifier si l'exécution de la requête a échoué
        if (!$result) {
            throw new Exception("Erreur d'exécution de la requête : " . $query->error);
        }

        //Ouverture du fichier en mode écriture
        $fichier = fopen("../../sql/001-Fauget-data.sql", "a");

        fwrite($fichier, $write_query . "\n");
        
        //Fermeture du fichier
        fclose($fichier);
        
        //Fermer la déclaration de la requête
        $query->close();
    }
    
    //Fonction pour mettre à jour les quantités dans le stock
    function order($idSize, $idProducts, $quantity, $mysqli){
        //Création de la requête préparée
        $query = $mysqli->prepare("UPDATE Stock SET quantity = quantity - ? WHERE idSize = ? AND idProducts = ?");
        
        //Liaison des paramètres
        $query->bind_param("isi", $quantity, $idSize, $idProducts);
        
        //Exécution de la requête
        $query->execute();
        
        //Fermeture du statement
        $query->close();
    }

    //Fonction pour générer un achat
    function reinitialize($idSize, $idProducts, $quantity, $mysqli){
        //Création de la requête préparée
        $query = $mysqli->prepare("UPDATE Stock SET quantity = quantity + ? WHERE idSize = ? AND idProducts = ?");
        
        //Liaison des paramètres
        $query->bind_param("isi", $quantity, $idSize, $idProducts);
        
        //Exécution de la requête
        $query->execute();
        
        //Fermeture du statement
        $query->close();
    }
?>