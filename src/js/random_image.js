//Tableau contenant la liste des images
var tabImagesIndex = ["index-1.jpg", "index-2.jpg", "index-3.jpg", "index-4.jpg"];
var tabImagesAbout = ["about-1.jpg", "about-2.jpg", "about-3.jpg", "about-4.jpg"];

//Fonction pour générer une URL aléatoire à partir du tableau d'images
function getRand() {
  //Générer un indice aléatoire pour sélectionner une image aléatoire dans le tableau
  var rand = Math.floor(Math.random() * tabImagesIndex.length);

  //Retourner l'URL de l'image aléatoire
  return (rand);
}

//Permet de s'assurer que le code est exécuté après le chargement du DOM
document.addEventListener("DOMContentLoaded", function() {
  //Sélectionner l'élément image à modifier
  var img = document.getElementsByClassName("indexImage")[0];

  //Si on se trouve sur la page index.html
  if (window.location.href.split('/').pop() === 'index.php'){
    if (img){
      //Attribuer une URL aléatoire à l'attribut src de l'image
      img.setAttribute("src", "img/Index/" + tabImagesIndex[getRand()]);
    }
    else{
      console.log("L'élément image n'a pas été trouvé dans le document.");
    }
  }
  //Sinon si on se trouve sur la page about.html
  else if (window.location.href.split('/').pop() === 'about.php'){
    if (img){
      //Attribuer une URL aléatoire à l'attribut src de l'image
      img.setAttribute("src", "img/About/" + tabImagesAbout[getRand()]);
    }
    else{
      console.log("L'élément image n'a pas été trouvé dans le document.");
    }
  }
});