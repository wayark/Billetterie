const extendBar = (element) => {
    element.parentNode.querySelector(".menu-bar").style.width = "70%";
    element.parentNode.querySelector(".menu-bar").style.backgroundColor = "#c7b7b7";
}   

const shrinkBar = (element) => {
    element.parentNode.querySelector(".menu-bar").style.removeProperty("width");
    element.parentNode.querySelector(".menu-bar").style.removeProperty("background-color");
}

const colorBar = (element) => {
    element.parentNode.querySelector(".menu-bar").style.backgroundColor = "#c7b7b7";
    element.parentNode.querySelector(".menu-bar").style.width = "25%";
}

const uncolorBar = (element) => {
    element.parentNode.querySelector(".menu-bar").style.removeProperty("background-color");
    element.parentNode.querySelector(".menu-bar").style.removeProperty("width");
}