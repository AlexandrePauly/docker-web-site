<!-- Haut de page -->
<header id="mainHeader">
    <!-- Haut de page - Logo -->
    <div id="mainHeader-left">
        <a href="index.php"><img src="img/logo.png " alt="Logo du site" id="headerLogo"></a>
    </div>
    
    <!-- Haut de page - Menu -->
    <div id="mainHeader-right">
        <!-- Accéssibilités pour les sourds et malentendants -->
        <h1 class="accessibility">Menu principal</h1>
        <p class="accessibility"><a href="#pageContent" title="Accéder directement au contenu principal de cette page">Passer le menu</a></p>
        <h1>Fauget</h1>

        <!-- Menu apparent -->
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
        </ul>
    </div>

    <!-- Haut de page - Accès au compte et au panier -->
    <div id="access">
        <?php 
            //Si un utilisateur est connecté, l'icon apparant lui propose de se déconnecter
            if (isset($_SESSION['user'])){
                echo '<a href="php/connexion.php" title="Déconnexion : ' . $_SESSION['user'] . '" class="icon"><i class="fa fa-sign-out" aria-hidden="true"></i></a>';
                
                //Initialisation de la valeur du panier à 0
                $count_panier = 0;

                if(isset($_SESSION["panier"])) 
                { 
                    //Incrémentation pour la valeur de chaque quantité d'un produit
                    foreach($_SESSION["panier"] as $produit){
                        $count_panier += $produit[4];
                    }
                } 

                echo '<a href="panier.php" title="Accès au panier" class="icon"><i class="fa fa-shopping-bag" aria-hidden="true"></i><span id="panierValue">' . $count_panier . '</span></i></a>';
            }
            //Sinon, l'icon apparant lui propose de se connecter
            else{
                echo '<a href="php/connexion.php" title="Accès à votre compte" class="icon"><i class="fa fa-user-circle" aria-hidden="true"></i></a>';
                echo '<a href="panier.php" title="Accès au panier" class="icon"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>';
            }
        ?>
    </div>
</header>