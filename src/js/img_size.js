//Fonction pour ouvrir l'image
function showSinglePict(e){
    let image = e.target;
    let imageContainer = document.getElementById('imgExpand');
    let bigImage = imageContainer.querySelector('img');
    bigImage.src = image.src;
    imageContainer.classList.toggle('visible');

    //Fermeture de l'image
    imageContainer.addEventListener('click', closeSinglePict, false);
}

//Fonction pour fermer l'image
function closeSinglePict(){
    let imageContainer = document.getElementById('imgExpand');
    imageContainer.classList.toggle('visible');
}

let galImages = document.querySelectorAll('#rightCol img');

//Ouverture de l'image
for(let i = 0 ; i < galImages.length ; i++){
    let image = galImages[i];
    image.addEventListener('click',showSinglePict, false);
}