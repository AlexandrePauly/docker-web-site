<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    include("php/head.php");
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
            <h1 id="title">Mentions légales</h1>
            <div id="legal-notices">
                <p>Le présent site web est la propriété de Fauget, entreprise individuelle au statut d'auto-entrepreneur, immatriculée sous le numéro 123 au Registre du Commerce et des Sociétés de Pau. Le siège social de Fauget est situé à Pau.</p>
                <p>Directeur de la publication : Chat GPT</p>
                <p>Hébergement : X, société au capital de 1,000,000.00 euros, immatriculée sous le numéro 123 au Registre du Commerce et des Sociétés de Pau. Le siège social de X est situé à Paris.</p>
                <p>Le site web a été réalisé par Alexandre Pauly avec l'utilisation des technologies suivantes : HTML5, CSS3, JavaScript, PHP.</p>
                <p>Le contenu du site web, incluant les textes, les images, les logos, les graphismes, les icônes et les logiciels, provient du site Unsplash ou de ses fournisseurs de contenu et est protégé par les lois françaises et internationales relatives à la propriété intellectuelle. Toute reproduction, représentation, modification, publication, transmission, dénaturation, totale ou partielle du site ou de son contenu, par quelque procédé que ce soit, et sur quelque support que ce soit, est interdite, sauf autorisation préalable et expresse de Fauget.</p>
                <p>Le logo provient de Canva et les produits du site Unsplash en grande partie.</p>
                <p>Le site web peut contenir des liens hypertextes donnant accès à d'autres sites web édités et gérés par des tiers. Fauget ne saurait être tenu responsable directement ou indirectement dans le cas où lesdits sites tiers ne respecteraient pas les dispositions légales et réglementaires en vigueur.</p>
                <p>Nous nous réservons le droit de modifier à tout moment et sans préavis le contenu du site web et des présentes mentions légales.</p>
                <p>Pour toute demande d'information ou pour exercer votre droit d'accès, de rectification et d'opposition conformément aux dispositions de la loi n°78-17 du 6 janvier 1978 relative à l'informatique, aux fichiers et aux libertés, vous pouvez nous contacter à l'adresse suivante : <a href="mailto:faugett@gmail.com">fauget@gmail.com</a>.</p>
                <p>Fauget est soucieux de protéger votre vie privée et s'engage à ne collecter que les données personnelles nécessaires au traitement de votre commande et à ne pas les communiquer à des tiers. Vous disposez d'un droit d'accès, de modification, de rectification et de suppression des données vous concernant. Pour exercer ce droit, vous pouvez nous contacter à l'adresse suivante : <a href="mailto:faugett@gmail.com">fauget@gmail.com</a>.</p>
            </div>
        </aside>
        
        <!-- Inclusion de la flèche pour remonter au menu -->
        <?php
            include("php/back-to-top.php"); 
        ?>
    </section>

    <!-- Inclusion du footer -->
    <?php
        include("php/footer.php"); 
    ?>
</body>