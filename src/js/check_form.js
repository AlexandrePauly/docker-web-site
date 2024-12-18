function check(){
    //Récupérer l'élément input de classe "field"
    const input = document.querySelectorAll(".field");

    if(input.length > 0){
        //Traitement des éléments 1 à 3
        for(var i = 1 ; i < 4 ; i++){
            //Récupérer la valeur de l'input
            const value = input[i].value;

            //Vérifier si l'input est invalide
            if (!input[i].validity.valid) {
                console.log('Le champ [' + i + '] est invalide');

                input[i].style.borderColor = 'red';
            }
            else {
                input[i].style.borderColor = 'none';
            }
        }

        //Traitement des éléments 7 et 8
        for(var i = 7 ; i < 9 ; i++){
            //Récupérer la valeur de l'input
            const value = input[i].value;

            //Vérifier si l'input est invalide
            if (!input[i].validity.valid) {
                console.log('Le champ [' + i + '] est invalide');

                input[i].style.borderColor = 'red';
            }
            else {
                console.log('Le champ est valide');
            }
        }
    }
}