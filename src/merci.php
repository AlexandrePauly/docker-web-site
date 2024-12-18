<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    include("php/head.php");
    include_once('bdd/bdd.php');
?>

<body>
    <!-- Inclusion du header -->
    <?php
        include("php/header.php");
    ?>

    <!-- Contenu de page -->
    <section id="pageContent">
        <!-- Inclusion du du menu latéral -->
        <?php
            include("php/main.php");
        ?>

        <!-- Partie droite - Contenu de la page -->
        <aside id="rightCol">
            <h1 id="title">Merci</h1>
            <div id="legal-notices">
                <?php 
                    //Récupération de la catégorie sélectionnée
                    if (isset($_GET['cat'])) {
                        $selectedCategory = $_GET['cat'];
                    }
                    else {
                        $selectedCategory = null;
                    }

                    // Si la catégorie est sélectionnée, afficher le contenu de la catégorie
                    if ($selectedCategory == 'contact') {
                        echo '<p>Merci pour votre message. Notre équipe reprendra contact avec vous dans les 3 jours ouvrables.</p>';
                        echo '<p>A très bientôt!</p>';
                    }
                    else if($selectedCategory == 'payment'){
                        //Ouvrture de la connexion à la base de données
                        $mysqli = connectDB();

                        //Modification des données dans la base de données
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

                        //Réinitialisation de la variable de session
                        $_SESSION['panier'] = array();
                        $_SESSION['giftCard'] = 0;
                        
                        echo '<p>Merci pour votre achat. Notre faisons tout notre possible pour vous livrer au plus vite.</p>';
                        echo '<p>A très bientôt!</p>';

                    }
                ?> 
            </div>
        </aside>
    </section>

    <!-- Inclusion du footer -->
    <?php
        include("php/footer.php"); 
    ?>
</body>