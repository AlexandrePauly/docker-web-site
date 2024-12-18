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
            <div id="about">
                <div id="about-top">
                    <img class="indexImage" src="img/About/random-2.jpg" alt="Image aléatoire">
                    <div id="about-top-right">
                        <p>A propos du blog </p>
                        <h1>Bienvenue sur Fauget, votre styliste personnel en ligne ! Nous vous proposons une sélection pointue de vêtements et accessoires pour homme pour vous accompagner au quotidien ou pour des événements spéciaux.</h1>
                        <p>Notre équipe de stylistes a sélectionné pour vous les meilleures marques et les pièces les plus tendances pour répondre à toutes vos envies. Nous travaillons également avec des marques éthiques et respectueuses de l'environnement pour vous proposer une sélection éco-responsable.</p>
                        <p>Grâce à notre service de conseil en ligne, vous pourrez bénéficier des conseils avisés de notre équipe de stylistes pour trouver les vêtements qui conviennent le mieux à votre style, votre morphologie et votre personnalité. Nous sommes à votre disposition pour répondre à toutes vos questions et vous aider à trouver la tenue idéale.</p>
                        <p>Notre site est facile à utiliser et vous permet de naviguer facilement parmi les différentes catégories de vêtements et accessoires. Vous pouvez également filtrer les résultats par taille, couleur, marque et prix pour trouver rapidement ce que vous cherchez.</p>
                        <p>Nous livrons dans toute la France et offrons la livraison gratuite à partir de 70.00€. Si vous n'êtes pas satisfait de votre achat, vous avez 30 jours pour nous le retourner et obtenir un remboursement ou un échange.</p>
                        <p>Rejoignez la communauté Fauget et profitez d'un shopping en ligne sur mesure, adapté à vos besoins et à votre style !</p>
                        <p>Vous pouvez trouver <a href="q&a.php">une foire aux questions (FAQ) sur la page dédiée.</a></p>
                    </div>
                </div>
                <div id="about-bottom">
                    <h1>Collaborations, partenariats et autres demandes</h1>
                    <p>L'ensemble des articles que vous trouverez sur ce site sont issus de collaborations avec nos partenaires.</p>
                </div>
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