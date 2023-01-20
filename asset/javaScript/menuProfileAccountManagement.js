const extendBar = (element) => {
    element.parentNode.querySelector(".menu-bar").style.width = "70%";
    element.parentNode.querySelector(".menu-bar").style.backgroundColor = "#dbd0c7";
}   

const shrinkBar = (element) => {
    element.parentNode.querySelector(".menu-bar").style.removeProperty("width");
    element.parentNode.querySelector(".menu-bar").style.removeProperty("background-color");
}

const colorBar = (element) => {
    element.parentNode.querySelector(".menu-bar").style.backgroundColor = "#dbd0c7";
    element.parentNode.querySelector(".menu-bar").style.width = "25%";
}

const uncolorBar = (element) => {
    element.parentNode.querySelector(".menu-bar").style.removeProperty("background-color");
    element.parentNode.querySelector(".menu-bar").style.removeProperty("width");
}

// Afficher le numéro avec des espaces 
const displayPhoneNumber = () => {
    let phonenumbertext = document.querySelector(".phone-number");
    phonenumbertext.textContent = phonenumbertext.textContent.replace(/(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/, "$1 $2 $3 $4 $5");
}