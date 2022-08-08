// Début du formulaire de reservation
// function setPrix() {
//     var places = document.getElementById("place").value;
//     console.log(places);
//     var sejour = document.getElementById("sejour");
//     console.log(sejour);
//     console.log(sejour.options[sejour.selectedIndex]);
//     var price = sejour.options[sejour.selectedIndex].getAttribute('data-price');
//     console.log(price);
//     prixTotal = places * price ;
//     document.getElementById("prix").value = prixTotal;

// }















// Fin du formulaire de reservation
function valideInput(unInput)
{
    unInput.classList.remove("is-valid", "is-invalid");
    if (unInput.checkValidity()) {
        unInput.classList.add("is-valid")
        return true;

    } else {
        unInput.classList.add("is-invalid")
        return false;
    }

}
let elementForm = document.querySelector("form");
elementForm.addEventListener("submit", function (event) {
    console.log(event)
    let formValide = true
    // recupere tout les champs du formulaire
    let leschamps = document.querySelectorAll("form input, form select, form textarea");
    // parcourir chaque champs
    for (let unChamps of leschamps) {
        
        let champValid = valideInput(unChamps);
        if (champValid === false ) {
            formValide = false
        }

    }
    // invoquer la fonction valideInput avec chaque champs en argument
    // si valide input retourne false formValide de devient faux
    if (formValide === false) {
        event.preventDefault()  
    }
   
})






