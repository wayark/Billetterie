const extendBar = (element) => {
    element.parentNode.querySelector(".menu-bar").style.width = "70%";
    element.parentNode.querySelector(".menu-bar").style.backgroundColor = "#a59494";
}   

const shrinkBar = (element) => {
    element.parentNode.querySelector(".menu-bar").style.removeProperty("width");
    element.parentNode.querySelector(".menu-bar").style.removeProperty("background-color");
}

const colorBar = (element) => {
    element.parentNode.querySelector(".menu-bar").style.backgroundColor = "#a59494";
    element.parentNode.querySelector(".menu-bar").style.width = "25%";
}

const uncolorBar = (element) => {
    element.parentNode.querySelector(".menu-bar").style.removeProperty("background-color");
    element.parentNode.querySelector(".menu-bar").style.removeProperty("width");
}