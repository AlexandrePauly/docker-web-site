<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    include("basics/head.php");
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
    <h1 id="title">Foire aux Questions</h1>
    <section id="faq">
        <div class="faq-item">
            <h2>1. Comment passer une commande sur votre site web ?</h2>
            <p>Pour passer une commande, il suffit de naviguer sur notre site web, de choisir les produits qui vous intéressent, de les ajouter à votre panier, puis de suivre les instructions pour finaliser votre commande.</p>
        </div>
        <div class="faq-item">
            <h2>2. Quels sont les modes de paiement acceptés ?</h2>
            <p>Nous acceptons les paiements par carte bancaire, Visa, PayPal et Amex.</p>
        </div>
        <div class="faq-item">
            <h2>3. Combien coûte la livraison ?</h2>
            <p>Les frais de livraison varient en fonction de votre adresse de livraison, du poids et de la taille de votre commande. Les frais de livraison seront indiqués lors du processus de commande.</p>
        </div>
        <div class="faq-item">
            <h2>4. Quels sont les délais de livraison ?</h2>
            <p>Les délais de livraison varient en fonction de votre adresse de livraison et du mode de livraison que vous choisissez. Les délais de livraison estimés seront indiqués lors du processus de commande.</p>
        </div>
        <div class="faq-item">
            <h2>5. Puis-je retourner un produit ?</h2>
            <p>Oui, vous pouvez retourner un produit sous certaines conditions. Veuillez consulter notre politique de retour pour plus d'informations.</p>
        </div>
        <div class="faq-item">
            <h2>6. Comment puis-je contacter le service client ?</h2>
            <p>Vous pouvez nous contacter par e-mail à l'adresse <a href="mailto:faugett@gmail.com">fauget@gmail.com</a>, par téléphone au <a href="tel:+33123456789">01 23 45 67 89</a>, ou en remplissant le formulaire de contact sur notre site web.</p>
        </div>
        <div class="faq-item">
            <h2>7. Comment puis-je suivre ma commande ?</h2>
            <p>Vous pouvez suivre votre commande en vous connectant à votre compte sur notre site web. Vous recevrez également des e-mails de notification à chaque étape de la livraison.</p>
        </div>
        <div class="faq-item">
            <h2>8. Comment puis-je annuler ma commande ?</h2>
            <p>Vous pouvez annuler votre commande en nous contactant par e-mail à l'adresse <a href="mailto:faugett@gmail.com">faugett@gmail.com</a> ou par téléphone au <a href="tel:+33123456789">01 23 45 67 89</a>. Veuillez noter que des frais d'annulation peuvent s'appliquer si votre commande a déjà été traitée.</p>
        </div>
        <div class="faq-item">
            <h2>9. Offrez-vous des codes de réduction ou des promotions ?</h2>
            <p>Oui, pour les soldes et autres évènements. Vous avez également la possibilité de générer une carte cadeau au montant de votre choix à offrir. </p>
        </div>
    </section>                   
</aside>

<?php
    include("basics/back-to-top.php"); 
?>
</section>

<?php
include("basics/footer.php"); 
?>
</body>