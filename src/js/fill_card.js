//Fonction pour remplir le champ du numéro de carte sur la carte depuis l'input du formulaire
function fillNumber() {
  var formNumber = document.getElementById("form-number").value;
  var cardNumber = document.getElementById("numcard");

  //Si le champ du numéro de la carte est vide, on affiche la valeur par défaut
  if (formNumber === "" || formNumber === null) {
    cardNumber.value = "####    ####    ####    ####";
  }
  //Sinon on affiche la valeur du champ
  else {
    var formattedNumber = formatCardNumber(formNumber);
    var currentNumber = cardNumber.value;

    //Ajout d'une classe pour activer l'animation de défilement
    cardNumber.classList.add("scroll-up");

    //Mise à jour de la valeur du champ
    cardNumber.value = formattedNumber;

    //Attente de la fin de l'animation (0.5 seconde) et supprimer la classe d'animation
    setTimeout(function() {
      cardNumber.classList.remove("scroll-up");
    }, 500);

    //Ajout d'une classe pour activer l'animation de défilement inverse lorsque le numéro diminue
    if (currentNumber.length > formattedNumber.length) {
      cardNumber.classList.add("scroll-down");

      //Attendre la fin de l'animation (0.5 seconde) et supprimer la classe d'animation
      setTimeout(function() {
        cardNumber.classList.remove("scroll-down");
      }, 500);
    }
  }
}

//Fonction pour formater le numéro de carte avec des espaces tous les 4 caractères
function formatCardNumber(number) {
    var cleanedNumber = number.replace(/\s/g, ''); //Supprimer les espaces existants
    var formattedNumber = "";

    var defaultNumber = "####    ####    ####    ####";

    var currentIndex = 0;
    
    for (var i = 0; i < defaultNumber.length; i++) {
      if (defaultNumber[i] === "#") {
        if (currentIndex < cleanedNumber.length) {
          formattedNumber += cleanedNumber[currentIndex];
          currentIndex++;
        } else {
          formattedNumber += "#";
        }
      } else {
        formattedNumber += defaultNumber[i];
      }
    }

    return formattedNumber;
}

//Fonction pour bloquer les entrées de type number dans le champ du propriétaire de la carte
function restrictToCharac(input){
  input.value = input.value.replace(/[0-9]/g, '');
}

//Fonction pour remplir le champ du nom sur la carte depuis l'input du formulaire
function fillName() {
    var text = document.getElementById("form-person").value;

    //Supprimer les caractères numériques de l'entrée
    var nonNumericText = text.replace(/[0-9]/g, "");

    //Si le champ du nom du propriétaire de la carte est vide, on affiche la valeur par défaut
    if (nonNumericText === "" || nonNumericText === null) {
      document.getElementById("fullname").value = "NOM COMPLET";
    } 
    //Sinon, on affiche le texte
    else {
      document.getElementById("fullname").value = nonNumericText.toUpperCase();
    }
}

//Fonction pour remplir le champ du mois sur la carte depuis l'input du formulaire
function fillMonth(){
    var text = document.getElementsByClassName("form-date")[0].value;

    var date = document.getElementById("expiration").value;
    var month = date.substring(0,2);
    var year = date.substring(2,7);

    //Si le champ du mois d'expiration de la carte est vide, on affiche la valeur par défaut
    if((text == "" || text == null)){
        document.getElementById("expiration").value = month + year;
    }
    //Sinon, on affiche le texte
    else{
      if(text < 10){
          document.getElementById("expiration").value = "0" + text + year;
      }
      else{
          document.getElementById("expiration").value = text + year;
      }
      
    }    
}

//Fonction pour remplir le champ de l'année sur la carte depuis l'input du formulaire
function fillYear(){
  var text = document.getElementsByClassName("form-date")[1].value;

  var date = document.getElementById("expiration").value;
  var month = date.substring(0,2);
  var year = date.substring(2,7);

  //Si le champ de l'année d'expiration de la carte est vide, on affiche la valeur par défaut
  if((text == "" || text == null)){
      document.getElementById("expiration").value = month + year;
  }
  //Sinon, on affiche le texte
  else{
      document.getElementById("expiration").value = month + "/" + text;
  }    
}

//Fonction pour remplir le champ du CVV sur la carte depuis l'input du formulaire
function fillCVV() {
    var text = document.getElementById("form-CVV").value;

    //Si le champ du CVV de la carte est vide, on affiche la valeur par défaut
    if((text == "" || text == null)){
        document.getElementById("CVV").innerHTML = "";
    }
    //Sinon, on affiche le texte
    else{
        document.getElementById("CVV").innerHTML = text;
    }
}

//Fonction pour bloquer les entrées de type autre que number dans le champ du CVV
function restrictToNumbers(input) {
    input.value = input.value.replace(/[^0-9]/g, '');
}

//Fonction pour ajouter un style d'un élément
function addStyle(elt) {
    switch(elt){
      case 1 :
        var input = document.getElementsByClassName("card-number")[0];
        input.classList.add("highlight");

        break;
      case 2 :
        var input = document.getElementsByClassName("card-person")[0];
        input.classList.add("highlight");

        break;
      case 3 :
        var input = document.getElementsByClassName("card-person")[1];
        input.classList.add("highlight");

        break;
      default :
        break;
    }
}

//Fonction pour supprimer le style d'un élément
function removeStyle(elt) {
    switch(elt){
      case 1 :
        var input = document.getElementsByClassName("card-number")[0];
        input.classList.remove("highlight");

        break;
      case 2 :
        var input = document.getElementsByClassName("card-person")[0];
        input.classList.remove("highlight");

        break;
      case 3 :
        var input = document.getElementsByClassName("card-person")[1];
        input.classList.remove("highlight");

        break;
      default :
        break;
    }
}