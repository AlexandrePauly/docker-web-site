<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    include("basics/head.php");

    if (!isset($_SESSION['panier'])) {
        $_SESSION['giftCard'] = 0; //Initialiser $_SESSION['panier'] comme un tableau vide
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
    <h1 id="title">Offrez une carte cadeau!</h1>
    <form action="basics/vider_panier.php" method="POST">
        <!-- Bouton pour vider le panier -->
        <button id="viderPanier" onclick="viderPanier()">Vider le panier</button>
    </form>
    <div id="card" data-tilt>
        <!-- Partie gauche -->
        <div id="left">
            <div id="img"></div>
        </div>
        <!-- Partie droite -->
        <div id="right">
            <form id="content" method="POST" action="basics/add_card.php">
                <h1>Carte cadeau</h1>

                <!-- Montant de la carte cadeau -->
                <p><input name="value" type="number" class="field" title="montant" required><i class="fa fa-eur" aria-hidden="true"></i></input></p>

                <!-- Informations de la carte cadeau -->
                <h1>Fauget friperie</h1>
                <p>Valable 1 an à partir du :</p>
                <input type="date" id="today" title="" disabled="disabled"></input>

                <!-- Permet de cacher la croix de désactivation de l'input de type date -->
                <div id="cheat"></div>

                <!-- Bouton pour ajouter au panier -->
                <button id="addPanier">Ajouter au panier</button>
            </form>
        </div>
    </div>
</aside>
</section>

<?php
include("basics/footer.php"); 
?>
</body>