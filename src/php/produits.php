<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    include("basics/head.php");
    include_once('../bdd/bdd.php');

    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array(); //Initialiser $_SESSION['panier'] comme un tableau vide
    }
?>

<body>
<?php
include("basics/header.php");
?>

<!-- Contenu de page -->
<section id="pageContent">
<?php
include("basics/main.php");
?>

<!-- Partie droite - Contenu de la page -->
<aside id="rightCol">
<div id="rightCol-top">
<?php 
    //Récupération de la catégorie sélectionnée
    if (isset($_GET['cat'])) {
        $selectedCategory = $_GET['cat'];
    }
    else {
        $selectedCategory = null;
    }

    // Si la catégorie est sélectionnée, afficher les produits de cette catégorie
    if ($selectedCategory == 'accessories') {
        echo '<h1 id="title">Accessoires</h1>';
    }
    else if($selectedCategory == 'clothes'){
        echo '<h1 id="title">Vêtements</h1>';
    }
    else if($selectedCategory == 'customs'){
        echo '<h1 id="title">Customs</h1>';
    }
    else if($selectedCategory == 'shoes'){
        echo '<h1 id="title">Chaussures</h1>';
    }
    else if($selectedCategory == 'new'){
        echo '<h1 id="title">Nouveautés</h1>';
    }
              

if ($selectedCategory != 'new') {
    echo '<button id="afficherStock" onclick="afficherStock()">Afficher le stock</button>';
}
echo '</div>';

echo '<div id="plot-box">';

    //Si la catégorie est sélectionnée, afficher les produits de cette catégorie
    if ($selectedCategory == 'accessories') {
        //Initialisation d'une variable de boucle
        $i = 1;

        //Initialisation du tableau de produits
        $tabAccessories = getAccessories();

        //Parcourez les produits de la catégorie Accessoires
        foreach ($tabAccessories as $produit) {
            //Affichez les informations de chaque produit
            echo '<div class="article accessories">';
                echo '<div class="box">';
                    echo '<img src="' . $produit['link'] . '" alt="' . $produit['alt'] . '">';
                echo '</div>';

                echo '<p>' . $produit['product'] . '</p>';
                echo '<p>' . $produit['price'] . '€</p>';

                echo '<div>';
                    //Bouton +
                    echo '<button class="addQty" onclick="addToCart(' . $i . ', ' . $produit['quantity'] . ')">+</button>';
                    
                    //Bouton -
                    echo '<button class="addQty" onclick="removeFromCart(' . $i . ')">-</button>';

                    echo '<form method="POST" action="basics/add_panier.php">';
                        //Champ de quantité
                        echo '<input type="number" name="quantity" class="quantity" value="0" readonly>';

                        echo '<div class="stock-panier">';
                            //Champ de stock
                            echo '<input class="stock stockQuantity" type="number" value="' . $produit['quantity'] . '" readonly>';                                            
                            
                            //Ajoutez des champs cachés pour stocker les valeurs               
                            echo '<input type="hidden" name="link" value="' . $produit['link'] . '">';
                            echo '<input type="hidden" name="alt" value="' . $produit['alt'] . '">';
                            echo '<input type="hidden" name="product" value="' . $produit['product'] . '">';
                            echo '<input type="hidden" name="price" value="' . $produit['price'] . '">';
                            echo '<input type="hidden" name="selectedCategory" value="' . $selectedCategory . '">';
                            echo '<input type="hidden" name="nameSize" value="Unique">';
                            echo '<input type="hidden" name="idProduct" value="' . $produit['idAccessories'] . '">';
                            
                            //Ajouter au panier
                            if (isset($_SESSION['user'])) {
                                echo '<button class="addPanier">Ajouter au panier</button>';
                            }
                            else {
                                echo '<button class="addPanier" disabled>Ajouter au panier</button>';
                            }
                        echo '</div>';
                    echo '</form>';
                echo '</div>';
            echo '</div>';

            //Incrémenter la variable $i
            $i++;
        }
    }
    else if ($selectedCategory == 'clothes') {
        //Initialisation d'une variable de boucle
        $i = 1;

        //Initialisation des tableaux de produits et de stock
        $elements = getClothes();
        $tabClothes = $elements['element1'];
        $tabStockClothes = $elements['element2'];

        // Parcourez les produits de la catégorie sélectionnée
        foreach ($tabClothes as $produit) {
            //Affichage des informations de chaque produit
            echo '<div class="article">';
                echo '<div class="box">';
                    echo '<img src="' . $produit['link'] . '" alt="' . $produit['alt'] . '">';
                echo '</div>';

                echo '<p>' . $produit['product'] . '</p>';
                echo '<p>' . $produit['price'] . '€</p>';

                echo '<div>';
                    //Bouton +
                    echo '<button class="addQty" onclick="addToCart(' . $i . ')">+</button>';

                    //Bouton -
                    echo '<button class="addQty" onclick="removeFromCart(' . $i . ')">-</button>';

                    echo '<form method="POST" action="basics/add_panier.php">';
                        //Champ de quantité
                        echo '<input type="number" name="quantity" class="quantity" value="0" readonly>';

                        //Tailles
                        echo '<label for="size">Taille :</label>';
                        echo '<select name="size" class="size" onchange="maj(' . $i . ')">';
                            foreach($tabStockClothes as $stock){
                                if($produit['idClothes'] == $stock['idProducts']){
                                    echo '<option value="' . $stock['quantity'] . '">' . $stock['idSize'] . '</option>';
                                }
                            }
                        echo '<input class="selectedSize" type="hidden" name="nameSize" value="">';
                        echo '</select>';

                        echo '<div class="stock-panier">';
                            //Champ de stock
                            echo '<input class="stock stockQuantity" type="number" value="" readonly>';

                            //Ajoutez des champs cachés pour stocker les valeurs               
                            echo '<input type="hidden" name="link" value="' . $produit['link'] . '">';
                            echo '<input type="hidden" name="alt" value="' . $produit['alt'] . '">';
                            echo '<input type="hidden" name="product" value="' . $produit['product'] . '">';
                            echo '<input type="hidden" name="price" value="' . $produit['price'] . '">';
                            echo '<input type="hidden" name="selectedCategory" value="' . $selectedCategory . '">';
                            echo '<input type="hidden" name="idProduct" value="' . $produit['idClothes'] . '">';
                        
                            //Ajouter au panier
                            if (isset($_SESSION['user'])) {
                                echo '<button class="addPanier">Ajouter au panier</button>';
                            }
                            else {
                                echo '<button class="addPanier" disabled>Ajouter au panier</button>';
                            }
                        echo '</div>';
                    echo '</form>';
                echo '</div>';
            echo '</div>';

            //Incrémenter la variable $i
            $i++;
        }
    }
    else if ($selectedCategory == 'customs') {
        //Initialisation d'une variable de boucle
        $i = 1;

        //Initialisation des tableaux de produits et de stock
        $elements = getCustoms();
        $tabCustoms = $elements['element1'];
        $tabStockCustoms = $elements['element2'];
        
        // Parcourez les produits de la catégorie sélectionnée
        foreach ($tabCustoms as $produit) {
            //Affichage des informations de chaque produit
            echo '<div class="article">';
                echo '<div class="box">';
                    echo '<img src="' . $produit['link'] . '" alt="' . $produit['alt'] . '">';
                echo '</div>';

                echo '<p>' . $produit['product'] . '</p>';
                echo '<p>' . $produit['price'] . '€</p>';

                echo '<div>';
                    //Bouton +
                    echo '<button class="addQty" onclick="addToCart(' . $i . ')">+</button>';
                    
                    //Bouton -
                    echo '<button class="addQty" onclick="removeFromCart(' . $i . ')">-</button>';

                    echo '<form method="POST" action="basics/add_panier.php">';
                        //Champ de quantité
                        echo '<input type="number" name="quantity" class="quantity" value="0" readonly>';

                        //Tailles
                        echo '<label for="size">Taille :</label>';
                        echo '<select name="size" class="size" onchange="maj(' . $i . ')">';
                            foreach($tabStockCustoms as $stock){
                                if($produit['idCustoms'] == $stock['idProducts']){
                                    echo '<option value="' . $stock['quantity'] . '">' . $stock['idSize'] . '</option>';
                                }
                            }
                        echo '<input class="selectedSize" type="hidden" name="nameSize" value="">';
                        echo '</select>';

                        echo '<div class="stock-panier">';
                            //Champ de stock
                            echo '<input class="stock stockQuantity" type="number" value="" readonly>';

                            //Ajoutez des champs cachés pour stocker les valeurs               
                            echo '<input type="hidden" name="link" value="' . $produit['link'] . '">';
                            echo '<input type="hidden" name="alt" value="' . $produit['alt'] . '">';
                            echo '<input type="hidden" name="product" value="' . $produit['product'] . '">';
                            echo '<input type="hidden" name="price" value="' . $produit['price'] . '">';
                            echo '<input type="hidden" name="selectedCategory" value="' . $selectedCategory . '">';
                            echo '<input type="hidden" name="idProduct" value="' . $produit['idCustoms'] . '">';

                            //Ajouter au panier
                            if (isset($_SESSION['user'])) {
                                echo '<button class="addPanier">Ajouter au panier</button>';
                            }
                            else {
                                echo '<button class="addPanier" disabled>Ajouter au panier</button>';
                            }
                        echo '</div>';
                    echo '</form>';
                echo '</div>';
            echo '</div>';

            //Incrémenter la variable $i
            $i++;
        }
    }
    else if ($selectedCategory == 'shoes') {
        //Initialisation d'une variable de boucle
        $i = 1;

        //Initialisation des tableaux de produits et de stock
        $elements = getShoes();
        $tabShoes = $elements['element1'];
        $tabStockShoes = $elements['element2'];
        
        // Parcourez les produits de la catégorie sélectionnée
        foreach ($tabShoes as $produit) {
            //Affichage des informations de chaque produit
            echo '<div class="article">';
                echo '<div class="box">';
                    echo '<img src="' . $produit['link'] . '" alt="' . $produit['alt'] . '">';
                echo '</div>';

                echo '<p>' . $produit['product'] . '</p>';
                echo '<p>' . $produit['price'] . '€</p>';


                echo '<div>';
                    //Bouton +
                    echo '<button class="addQty" onclick="addToCart(' . $i . ')">+</button>';
                                                    
                    //Bouton -
                    echo '<button class="addQty" onclick="removeFromCart(' . $i . ')">-</button>';

                    echo '<form method="POST" action="basics/add_panier.php">';
                        //Champ de quantité
                        echo '<input type="number" name="quantity" class="quantity" value="0" readonly>';

                        //Tailles
                        echo '<label for="size">Taille :</label>';
                        echo '<select name="size" class="size" onchange="maj(' . $i . ')">';
                            foreach($tabStockShoes as $stock){
                                if($produit['idShoes'] == $stock['idProducts']){
                                    echo '<option value="' . $stock['quantity'] . '">' . $stock['idSize'] . '</option>';
                                }
                            }
                        echo '<input class="selectedSize" type="hidden" name="nameSize" value="">';
                        echo '</select>';

                        echo '<div class="stock-panier">';
                            //Champ de stock
                            echo '<input class="stock stockQuantity" type="number" value="" readonly>';
                            
                            //Ajoutez des champs cachés pour stocker les valeurs               
                            echo '<input type="hidden" name="link" value="' . $produit['link'] . '">';
                            echo '<input type="hidden" name="alt" value="' . $produit['alt'] . '">';
                            echo '<input type="hidden" name="product" value="' . $produit['product'] . '">';
                            echo '<input type="hidden" name="price" value="' . $produit['price'] . '">';
                            echo '<input type="hidden" name="selectedCategory" value="' . $selectedCategory . '">';
                            echo '<input type="hidden" name="idProduct" value="' . $produit['idShoes'] . '">';

                            //Ajouter au panier
                            if (isset($_SESSION['user'])) {
                                echo '<button class="addPanier">Ajouter au panier</button>';
                            }
                            else {
                                echo '<button class="addPanier">Ajouter au panier</button>';
                            }
                        echo '</div>';
                    echo '</form>';
                echo '</div>';
            echo '</div>';

            //Incrémenter la variable $i
            $i++;
        }
    }
    else if ($selectedCategory == 'new') {
        //Inclusion de la gestion des articles choisis aléatoirement
        include("basics/new_random.php");
    }
    else {
        echo "Les données des articles n'ont pas pu être récupérés.";
    }
?>
</div>

<!-- Affichage en grand des images -->
<figure id="imgExpand"><img src="" alt=""></figure>
</aside>

<?php
include("basics/back-to-top.php"); 
?> 
</section>

<?php
include("basics/footer.php"); 
?>
</body>