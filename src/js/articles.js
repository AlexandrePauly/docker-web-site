//Fonction pour ajouter un élément au panier
function addToCart(numElt) {
  //Récupérer la quantité actuelle
  var quantity = document.getElementsByClassName("quantity")[numElt-1].value;

  var stock = document.getElementsByClassName("stockQuantity")[numElt-1].value;

  if (quantity < stock){
    //Ajouter 1 à la quantité
    quantity++;
  }

  //Mettre à jour la quantité dans le champ
  document.getElementsByClassName("quantity")[numElt-1].value = quantity;
}

//Fonction pour retirer un élément du panier
function removeFromCart(numElt){
  //Récupérer la quantité actuelle
  var quantity = document.getElementsByClassName("quantity")[numElt-1].value;
  
  //Si la quantité est déjà 0, ne rien faire
  if (quantity == 0) {
    return;
  }

  //Retirer 1 à la quantité
  quantity--;

  //Mettre à jour la quantité dans le champ
  document.getElementsByClassName("quantity")[numElt-1].value = quantity;
}

//Fonction pour mettre ajour la quantité en commande et la quantité en stock à chaque changement d'option
function maj(numElt){
  //Récupérer le texte de l'option sélectionnée
  var selectedOption = document.getElementsByClassName("size")[numElt - 1].options[document.getElementsByClassName("size")[numElt - 1].selectedIndex];
  var selectedText = selectedOption.text;
  
  //Mettre le texte de l'option sélectionnée dans un champ de saisie caché
  document.getElementsByClassName("selectedSize")[numElt - 1].value = selectedText;
  
  //Récupérer la valeur maximale de stock correspondant à l'option sélectionnée
  var stock = document.getElementsByClassName("size")[numElt-1].options[document.getElementsByClassName("size")[numElt-1].selectedIndex].value;
  
  //Mettre la quantité du stock pour un changement de taille
  document.getElementsByClassName("stockQuantity")[numElt-1].value = stock;

  //Mettre la quantité à 0 pour un changement de taille
  document.getElementsByClassName("quantity")[numElt-1].value = 0;
}

//Fonction pour afficher ou désafficher le stock
function afficherStock(){
  //Récupérer les informations des attributs de stockQuantity
  var display = document.getElementsByClassName("stockQuantity");

  if(display.length > 0){
    for(var i = 0 ; i < display.length ; i++){
      if(display[i].style.display === "block" ){
        display[i].style.display = 'none';
      }
      else{
        display[i].style.display = 'block';
      }
    }
  }
  else{
    alert("Il est impossible d'afficher les stocks pour le moment.");
  }
}

var test = document.getElementsByClassName("size");

for (i = 0 ; i < test.length ; i++){
  //Récupérer le texte de l'option sélectionnée
  var selectedOption = document.getElementsByClassName("size")[i].options[document.getElementsByClassName("size")[i].selectedIndex];
  var selectedText = selectedOption.text;

  //Mettre le texte de l'option sélectionnée dans un champ de saisie caché
  document.getElementsByClassName("selectedSize")[i].value = selectedText;
}