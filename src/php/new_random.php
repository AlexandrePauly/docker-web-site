<?php
    include_once('bdd/bdd.php');

    //Initialisation d'un tableau vide
    $tab = array();

    //Génération des valeurs aléatoires uniques
    while (count($tab) < 15) {
        $alea = rand(0, 52);

        // Vérifier si la valeur aléatoire n'existe pas déjà dans le tableau
        if (!in_array($alea, $tab)) {
            $tab[] = $alea;
        }
    }

    //Appel de la fonction et récupérer un tableau des éléments à afficher
    $new = generateNew($tab);

    foreach($new as $produit){
        //Affichez les informations de chaque produit
        echo '<div class="article new">';
            echo '<div class="box">';
                echo '<img src="' . $produit['link'] . '" alt="' . $produit['alt'] . '">';
            echo '</div>';

            echo '<p>' . $produit['product'] . '</p>';
            echo '<p>' . $produit['price'] . '€</p>';
        echo '</div>';
    }
?>
