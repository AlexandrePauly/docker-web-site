function checkForm(event) {
    event.preventDefault();
    
    var formNumber = document.getElementById('form-number').value;
    var formPerson = document.getElementById('form-person').value;
    var formMonth = document.getElementsByClassName('form-date')[0].value;
    var formYear = document.getElementsByClassName('form-date')[1].value;
    var formCVV = document.getElementById('form-CVV').value;

    if (formNumber === "" || formPerson === "" || formMonth === "" || formYear === "" || formCVV === "") {
        alert("Veuillez remplir tous les champs.");
    }
    else if(formNumber.length !== 16){
        alert("Numéro de carte incorrecte.");
    }
    else if(formCVV.length !== 3){
        alert("CVV incorrecte.");
    }
    else {
        //alert("Formulaire rempli correctement.");

        document.querySelector(".expand").addEventListener(
            "click",
            function (e) {
                e.preventDefault();
                e.stopPropagation();
                const button = e.currentTarget;
                //button.style.transition = "0.5s";
                //button.style.backgroundColor = "green";
                button.classList.add("loading");
                button.disabled = true;
                setTimeout(() => {
                    button.classList.add("loaded");
                    setTimeout(() => {
                        button.classList.add("finished");
                        setTimeout(() => {
                            button.classList.remove("finished");
                            button.classList.remove("loaded");
                            button.classList.remove("loading");
                            button.disabled = false;

                            const form = button.closest("form");
                            form.submit();
                            
                            //Redirection vers la page "test.html"
                            window.location.href = "../merci.php?cat=payment";
                        }, 1500);
                    }, 700);
                }, 1500);
            },
            false
        );
    }
}