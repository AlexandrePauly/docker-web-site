<!DOCTYPE html> 
<html lang="fr"></html>
    <head>
        <meta charset = "UTF-8">
        <meta name="keywords" content="HTML, CSS, XML, XHTML, JavaScript">
        <meta name="description" content="Entraînement au langage HTML">
        <meta name="author" content="Alexandre PAULY">

        <?php
            $current_page = basename($_SERVER['PHP_SELF']);

            //echo '<script src="js/load.js"></script>';
            
            if ($current_page == 'connexion.php' || $current_page == 'createAccount.php'){
                echo'<!-- CSS --><link rel="shortcut icon" href="../img/logo.png">';
                echo '<link rel="stylesheet" href="../css/connexion.css">';
                echo '<!-- Icons -->';
                echo '<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>';
                echo '<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>';
            }
            else if ($current_page == 'payment.php'){
                echo '<link rel="stylesheet" href="../css/payment.css">';
        
                echo '<!-- JavaScript -->';
                echo '<script src="../js/random_imageCard.js"></script>';
                echo '<script src="../js/fill_card.js"></script>';
                echo '<script src="../js/button.js"></script>';
                echo '<script src="../js/date.js"></script>';
                echo '<script src="../js/reset.js"></script>';
            }
            else{
                echo'<!-- CSS --><link rel="shortcut icon" href="img/logo.png">';

                echo '<link rel="stylesheet" href="css/normalize.css">';
                echo '<link rel="stylesheet" href="css/style.css">';

                //Styles et scripts pour index.php
                if ($current_page == 'index.php'){
                    echo '<link rel="stylesheet" href="css/index.css">';
                    echo '<!-- javaScript -->';
                    echo '<!-- Changement aléatoire de limage principale --> <script src="js/random_image.js"></script>';
                    echo '<!-- Animation attente avant le chargement de la page --> <script src="js/loading.js" async></script>';
                }
                //Styles et scripts pour about.php
                else if ($current_page == 'about.php') {
                    //Styles et script pour contact.php
                    echo '<!-- javaScript -->';
                    echo '<!-- Changement aléatoire de limage principale --> <script src="js/random_image.js"></script>';
                }
                //Styles et scripts pour contact.php
                else if ($current_page == 'contact.php') {
                    //Styles et script pour contact.php
                    echo '<link rel="stylesheet" href="css/contact.css">';
                    echo '<!-- javaScript -->';
                    echo '<!-- Date du jour --> <script src="js/current_date.js" async></script>';
                    echo '<!-- Vérification des données du formulaire --> <script src="js/check_form.js" async></script>';
                    echo '<!-- Police -->';
                    echo '<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">';
                }
                //Styles et scripts pour giftCard.php
                else if ($current_page == 'giftCard.php') {
                    //Styles et script pour contact.php
                    echo '<link rel="stylesheet" href="css/giftCard.css">';
                    echo '<!-- javaScript -->';
                    echo '<!-- Date du jour --> <script src="js/current_date.js" async></script>';
                    echo '<!-- Effet 3D --> <script src="js/vanilla-tilt.js" async></script>';
                    echo '<!-- Police -->';
                    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
                    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
                    echo '<link href="https://fonts.google.com/specimen/Poppins?query=poppins">';
                }
                //Styles et scripts pour les pages d'articles
                else if ($current_page == 'produits.php') {
                    //Styles et script pour contact.php
                    echo '<!-- javaScript -->';
                    echo '<!-- Gestion des articles --> <script src="js/articles_onload.js" async></script>';
                    echo '<!-- Affiche en grand les images --> <script src="js/img_size.js" async></script>';
                }
                //Styles et scripts pour la page du panier
                else if ($current_page == 'panier.php') {
                    //Styles et script pour contact.php
                    echo '<link rel="stylesheet" href="css/panier.css">';
                }

                echo '<!-- Gestion des articles -->';
                echo '<script src="js/articles.js" async></script>';
            }

            ?>
            <!--
            <script>
            
            window.addEventListener('load', function() {
                //Sélectionnez l'élément qui contient tout le contenu de votre page
                var content = document.getElementsByTagName("body");
              
                //Affichez le contenu en utilisant le style CSS
                content.style.display = "block";
            });
              
            </script>-->

        <!-- Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <title>Fauget friperie</title>
    </head>