var selectYear;

function date() {
    selectYear = document.getElementsByClassName("form-date")[1];
    var date = new Date();

    for (var i = 0; i <= 10; i++) {
      var year = date.getFullYear() + i;
      addOption(year, year);
    }
}

function addOption(value, text) {
    var option = document.createElement("option");
    option.value = value;
    option.textContent = text;
    selectYear.appendChild(option);
}

//Appeler la fonction date() au chargement de la page
document.addEventListener('DOMContentLoaded', function() {
    date();
});