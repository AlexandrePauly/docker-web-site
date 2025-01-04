<!-- Lien vers le haut du site -->
<div id="arrow">
    <a href="#" title="Vers le haut du site"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
</div>  

<!-- Permet d'afficher la flèche pour remonter vers le haut lorsque l'on scroll sur la page -->
<script>
    //On récupère l'élément arrow
    var arrow = document.getElementById("arrow");

    //Fonction pour afficher l'élément arrow lorsque l'utilisateur fait défiler la page
    window.onscroll = function() {
        if (window.pageYOffset > 100) {
            arrow.style.display = "block";
        } else {
            arrow.style.display = "none";
        }
    };
</script>