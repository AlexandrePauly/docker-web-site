//Afficher la valeur du stock de la taille demandée dès l'affichage et désactivation des tailles avec un stock vide dès le chargement de a page'
var stock = document.getElementsByClassName("size");

if (stock.length >= 0){
  for (var i = 0 ; i < stock.length ; i++){
    //Désactivation des tailles avec un stock vide
    for(var j = 0 ; j < stock[i].length ; j++){        
      if (stock[i].options[j].value == 0){
        stock[i].options[j].disabled = true;
      }
    }

    //Mettre la quantité du stock pour un changement de taille dans l'input
    document.getElementsByClassName("stockQuantity")[i].value = stock[i].options[document.getElementsByClassName("size")[i].selectedIndex].value;
  }
}
else{
  alert("Il est impossible d'afficher le stock pour le moment.");
}