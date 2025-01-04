//tabCardleau contenant la liste des images
var tabCard = ["1.jpeg", "2.jpeg", "3.jpeg", "4.jpeg", "6.jpeg", "7.jpeg", "8.jpeg", "9.jpeg", "10.jpeg", "11.jpeg", "13.jpeg", "14.jpeg", "16.jpeg", "17.jpeg", "18.jpeg", "22.jpeg", "23.jpeg", "24.jpeg", "25.jpeg"];

//Fonction pour générer une URL aléatoire à partir du tabCardleau d'images
function getRand() {
  //Générer un indice aléatoire pour sélectionner une image aléatoire dans le tabCardleau
  var rand = Math.floor(Math.random() * tabCard.length);

  //Retourner l'URL de l'image aléatoire
  return (rand);
}

//Permet de s'assurer que le code est exécuté après le chargement du DOM
document.addEventListener("DOMContentLoaded", function() {
  //Sélectionner l'élément image à modifier
  var img = document.getElementsByClassName("card-body");

  var rand = getRand();

  //Si on se trouve sur la page index.html
  if (img){
    for (var i = 0 ; i < img.length ; i++){
      //Attribuer une URL aléatoire au fond de la div
      img[i].style.backgroundImage = "url('" + "../../img/Card/" + tabCard[rand] + "')";
    }
  }
  else{
    console.log("L'élément image n'a pas été trouvé dans le document.");
  }
});