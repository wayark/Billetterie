
zInd = 100;
rotate = "10deg";

// Ajout de l'évènement au clic à l'élément
 const checkOtherTicket = (direction) => {

    const sectionToDuplicate = document.querySelector('#ticket');
    // Création d'une copie de la section
    const sectionCopy = sectionToDuplicate.cloneNode(true);
    zInd = zInd - 1;
    if(rotate == "-10deg"){
        rotate = "10deg"
        console.log("ok1");
    }
    else {
        rotate = "-10deg";
        console.log("ok")
    }
    console.log(rotate)
    sectionCopy.style.transform = "rotate("+rotate+")";
    sectionCopy.style.zIndex = zInd;
    // Ajout de la copie de la section au DOM
    const parentElement = document.querySelector('main');
    parentElement.appendChild(sectionCopy);
    console.log('L\'évènement au clic s\'est produit!');

}
