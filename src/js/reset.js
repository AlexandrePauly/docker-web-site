document.addEventListener('DOMContentLoaded', function() {
  //Réinitialisation des valeurs par défaut des champs de la carte
  var cardNumber = document.getElementById('numcard');
  var cardPerson = document.getElementById('fullname');
  var cardDate = document.getElementById('expiration');
  var cardCVV = document.getElementById('CVV');

  cardNumber.value = '####    ####    ####    ####';
  cardPerson.value = 'NOM COMPLET';
  cardDate.value = 'MM/YYYY';
  cardCVV.innerHTML = '';

  //Réinitialisation des valeurs par défaut des champs de formulaire
  var formNumber = document.getElementById('form-number');
  var formPerson = document.getElementById('form-person');
  var formMonth = document.getElementsByClassName('form-date')[0];
  var formYear = document.getElementsByClassName('form-date')[1];
  var formCVV = document.getElementById('form-CVV');

  formNumber.value = '';
  formPerson.value = '';
  formMonth.value = '';
  formYear.value = '';
  formCVV.value = '';
});
