// Fonction qui permet de changer la valeur du champ caché shareMyEventsInput en 
//fonction de la valeur de l'input checkbox
var shareInput = document.getElementById('shareMyEventsInput');
var sharingText = document.querySelectorAll('.sharing-text');
const changeValueShareInput = () => {
    if (shareInput.value == 'true') {
        shareInput.value = 'false';
        sharingText[1].style.display = 'none';
        sharingText[0].style.removeProperty('display');
    } else {
        shareInput.value = 'true';
        sharingText[0].style.display = 'none';
        sharingText[1].style.removeProperty('display');
    }
}

// Fonction qui met à jout le champ inputTextCopy en fonction de la valeur de l'input checkbox
var inputTextCopy = document.querySelector(".url-container > .url-text >.inputTextCopy");
const changeInputTextCopy = (element) => {
    let text = element.value;
    // En faire un tableau pour chaque caractère
    text = text.split("");
    text.forEach((char, index) => {
        if (char == " ") {
            text[index] = "+";
        } else if (char == ":") {
            text[index] = "%3A";
        } else if (char == "/") {
            text[index] = "%2F";
        } else if (char == "?") {
            text[index] = "%3F";
        } else if (char == "#") {
            text[index] = "%23";
        } else if (char == "[") {
            text[index] = "%5B";
        } else if (char == "]") {
            text[index] = "%5D";
        } else if (char == "@") {
            text[index] = "%40";
        } else if (char == "!") {
            text[index] = "%21";
        } else if (char == "$") {
            text[index] = "%24";
        } else if (char == "&") {
            text[index] = "%26";
        } else if (char == "'") {
            text[index] = "%27";
        } else if (char == "(") {
            text[index] = "%28";
        } else if (char == ")") {
            text[index] = "%29";
        } else if (char == "*") {
            text[index] = "%2A";
        }    else if (char == "+") {
            text[index] = "%2B";
        } else if (char == ",") {
            text[index] = "%2C";
        } else if (char == ";") {
            text[index] = "%3B";
        } else if (char == "=") {
            text[index] = "%3D";
        } else if (char == "%") {
            text[index] = "%25";
        }
        console.log(char);
    });
    console.log(text);
    text = text.join("");
    inputTextCopy.textContent = text;
}