<!-- Menu Toggle -->
<input type="checkbox" name="" id="check">

<!-- Partie gauche - Liens vers produits -->
<main id="leftCol">
<label for="check" id="menuToggle">
    <i class="fa fa-times" aria-hidden="true" id="times"></i>
    <i class="fa fa-bars" aria-hidden="true" id="bars"></i>
</label>
<div id="lat-menu">Menu</div>
<ul>
<li><a href="index.php" title="Retour à la page d'accueil">Accueil</a></li>
<?php
    //Tableau des catégories
    $categories = array(
        'Nouveautés' => 'new',
        'Vêtements' => 'clothes',
        'Chaussures' => 'shoes',
        'Accessoires' => 'accessories',
        'Customs' => 'customs'
    );

    //Boucle pour afficher les liens de chaque catégorie
    foreach ($categories as $nomCat => $cat) {
        echo '<li><a href="produits.php?cat=' . $cat . '" title="Catalogue des ' . $nomCat . '">' . $nomCat . '</a></li>';
    }
?>
<li><a href="giftCard.php" title="Carte cadeau">Carte cadeau</a></li>
</ul>
</main>