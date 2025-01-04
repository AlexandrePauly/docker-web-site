<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    include("basics/head.php");

    if(!isset($_SESSION['panier'])) 
    { 
        $_SESSION['panier'] = [];
    }

    if(!isset($_SESSION['giftCard'])) 
    { 
        $_SESSION['giftCard'] = 0;
    }
    
    //Calcul du montant du panier
    $total = 0.00 + floatval($_SESSION['giftCard']);
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
<h1 id="title">Votre panier</h1>
<div id="rightCol-top">
<form action="basics/vider_panier.php" method="POST">
<!-- Bouton pour vider le panier -->
<button id="viderPanier" onclick="viderPanier()">Vider le panier</button>
</form>
</div>

<div id="rightCol-bottom">
<!-- Articles dans le panier -->
<div>
<?php
    foreach ($_SESSION['panier'] as $produit){
        echo '<div class="plot-box">';
            echo '<div class="article">';
                echo '<div class="box">';
                    echo '<img src="' . $produit[0] . '" alt="' . $produit[1] . '">';
                echo '</div>';
                echo '<div class="article-infos">';
                    echo '<p>' . $produit[2] . '</p>';
                    echo '<div class="article-infos-bis">';
                        echo '<p>Prix : ' . $produit[3] . '€</p>';
                        echo '<p>Quantité : ' . $produit[4] . '</p>';
                        echo '<p>Taille : ' . $produit[5] . '</p>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
        echo '<div class="border"></div>';

        //Calcul du montant du panier
        $total += $produit[3]*$produit[4];
    }
?>
</div>

<!-- Informations du panier -->
<div id="infos-panier">
<?php
    //Si le panier n'est pas vide, il est possible de payer
    if($total > 0){   
        echo '<form action="basics/payment.php" method="POST">';
            echo '<h1>Total</h1>';
            echo '<p id="total">' . $total . ' €</p>';
            echo '<p id="giftCard">Carte cadeau : ' . floatval($_SESSION['giftCard']) . ' €</p>';
            echo '<button>Paiement</button>';
        echo '</form>';
    }
    //Sinon, il ne se passe rien
    else{
        echo '<form action="" method="POST">';
            echo '<h1>Total</h1>';
            echo '<p id="total">' . $total . ' €</p>';
            echo '<button>Paiement</button>';
        echo '</form>';
    }
?>
</div>
</div>
</aside>

<?php
include("basics/back-to-top.php"); 
?>  
</section>

<?php
include("basics/footer.php"); 
?>
</body>