// Récupération de l'élément de chargement
const loader = document.querySelector('.loader');

// Fonction pour masquer l'élément de chargement
function hideLoader() {
  loader.classList.add('fondu-out');
  setTimeout(function() {
    loader.style.display = 'none';
  }, 400); // 400 millisecondes pour l'animation de fondu en sortie
  document.getElementById("loader-container").style.zIndex = "-10";
}

// Appel de la fonction pour masquer l'élément de chargement après 5 secondes
setTimeout(hideLoader, 500); // 5000 millisecondes pour le délai de 5 secondes