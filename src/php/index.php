<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    include("basics/head.php");
?>
    
<body>
<!-- Effet de chargement -->
<div id="loader-container">
<div class="loader">
    <span class="lettre">C</span>
    <span class="lettre">H</span>
    <span class="lettre">A</span>
    <span class="lettre">R</span>
    <span class="lettre">G</span>
    <span class="lettre">E</span>
    <span class="lettre">M</span>
    <span class="lettre">E</span>
    <span class="lettre">N</span>
    <span class="lettre">T</span>
</div>
</div> 

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
    <!-- Présentation du site -->
    <div id="index">
        <img class="indexImage" src="../img/Index/index-1.jpg" alt="Image aléatoire">
        <div class="index-text">
            <h1>Bienvenue sur Fauget !</h1>
            <p>Vous cherchez des vêtements tendance et de qualité pour vous accompagner au quotidien ou pour des événements spéciaux ? Vous êtes au bon endroit ! Notre équipe de stylistes a sélectionné pour vous les meilleures marques et les pièces les plus en vogue pour répondre à toutes vos envies.</p>
            <?php
                echo '<a href="produits.php?cat=new" title="Catalogue des Nouveautés"><button>Nouveautés</button></a>';
            ?>
        </div>
    </div>

    <!-- Présentation des produits -->
    <div id="products">
        <div class="products-item">
            <img src="../img/Index/index-6.jpg" alt="">
            <h2>Vêtements</h2>
            <p>Nos vêtements sont soigneusement sélectionnés par notre équipe de stylistes pour vous offrir les dernières tendances de la mode. Fabriqués à partir de matériaux de qualité, nos vêtements sont conçus pour être confortables et durables. Que vous recherchiez des tenues décontractées pour le week-end ou des looks élégants pour le bureau, nous avons ce qu'il vous faut.</p>
        </div>
        <div class="products-item">
            <img src="../img/Index/index-5.jpg" alt="">
            <h2>Accessoires</h2>
            <p>Nos accessoires sont la touche finale parfaite pour n'importe quelle tenue. Nous proposons une variété de bijoux, sacs à main, chapeaux et autres articles pour compléter votre look. Tous nos accessoires sont soigneusement sélectionnés pour leur qualité et leur style unique.</p>
        </div>
        <div class="products-item">
            <img src="../img/Index/index-7.jpg" alt="">
            <h2>Chaussures</h2>
            <p>Nos chaussures sont à la fois confortables et stylées, parfaites pour compléter vos tenues. Nous proposons une variété de modèles, des baskets décontractées aux chaussures habillées en passant par les sandales estivales. Tous nos produits sont conçus pour durer, avec des matériaux de qualité et une attention particulière aux détails.</p>
        </div>
        <div class="products-item">
            <img src="../img/Index/index-8.jpg" alt="">
            <h2>Chaussures customisées</h2>
            <p>Nos chaussures customisées sont créées avec soin par notre équipe de designers pour vous offrir des pièces uniques et personnalisées. Nous travaillons avec des chaussures de qualité et utilisons des techniques de peinture et de broderie pour ajouter des motifs et des couleurs vibrantes. Si vous cherchez à ajouter une touche de personnalité à votre style, nos chaussures customisées sont faites pour vous.</p>
        </div>
    </div>

    <!-- Avis clients -->
    <div id="avis">
        <div class="avis">
            <img src="#" alt="">
            <h3>Avis de David</h3>
            <p>"J'ai acheté une veste sur ce site et j'ai été agréablement surpris par la qualité du tissu et la coupe parfaite. J'ai reçu beaucoup de compliments lorsque je l'ai portée lors d'une soirée. Je recommande vivement ce site pour leurs vêtements de qualité et leur service client exceptionnel."</p>
        </div>
        <div class="avis">
            <img src="#" alt="">
            <h3>Avis de Thomas</h3>
            <p>"J'ai commandé une paire de chaussures pour un mariage et j'ai été impressionné par la rapidité de la livraison. Les chaussures étaient confortables dès le premier jour et ont duré toute la soirée sans me faire mal aux pieds. Je suis très satisfait de mon achat et je recommande ce site pour leurs chaussures de qualité."</p>
        </div>
        <div class="avis">
            <img src="#" alt="">
            <h3>Avis de Simon</h3>
            <p>"Je suis tombé amoureux des chaussures customisées de ce site et j'ai décidé d'en commander une paire. Le processus de commande était simple et l'équipe a été très attentive à mes demandes de personnalisation. Les chaussures sont arrivées rapidement et elles sont encore plus belles en personne. Je suis ravi de mon achat et je recommande ce site pour leurs chaussures uniques et personnalisées."</p>
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
</script>
</body>