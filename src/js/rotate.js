var cardContent = document.getElementById("card-content");
var formCVV = document.getElementById("form-CVV");

//Lorsque l'élément est sélectionné (clic sur l'input)
formCVV.addEventListener("focus", function() {
  cardContent.classList.add("rotate");
});

//Lorsque l'utilisateur clique à l'extérieur de l'élément (blur)
document.addEventListener("click", function(event) {
  if (!formCVV.contains(event.target)) {
    cardContent.classList.remove("rotate");
  }
});