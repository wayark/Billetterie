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
        } else if (char == "+") {
            text[index] = "%2B";
        } else if (char == ",") {
            text[index] = "%2C";
        } else if (char == ";") {
            text[index] = "%3B";
        } else if (char == "=") {
            text[index] = "%3D";
        } else if (char == "%") {
            text[index] = "%25";
        } else if (char == "-") {
            text[index] = "%2D";
        } else if (char == ".") {
            text[index] = "%2E";
        } else if (char == "_") {
            text[index] = "%5F";
        } else if (char == "~") {
            text[index] = "%7E";
        } else if (char == "é") {
            text[index] = "%C3%A9";
        } else if (char == "è") {
            text[index] = "%C3%A8";
        } else if (char == "ê") {
            text[index] = "%C3%AA";
        } else if (char == "à") {
            text[index] = "%C3%A0";
        } else if (char == "â") {
            text[index] = "%C3%A2";
        } else if (char == "ù") {
            text[index] = "%C3%B9";
        } else if (char == "û") {
            text[index] = "%C3%BB";
        } else if (char == "ç") {
            text[index] = "%C3%A7";
        } else if (char == "ô") {
            text[index] = "%C3%B4";
        } else if (char == "î") {
            text[index] = "%C3%AE";
        } else if (char == "ï") {
            text[index] = "%C3%AF";
        } else if (char == "œ") {
            text[index] = "%C5%93";
        } else if (char == "æ") {
            text[index] = "%C3%A6";
        } else if (char == "É") {
            text[index] = "%C3%89";
        } else if (char == "È") {
            text[index] = "%C3%88";
        } else if (char == "Ê") {
            text[index] = "%C3%8A";
        } else if (char == "À") {
            text[index] = "%C3%80";
        } else if (char == "Â") {
            text[index] = "%C3%82";
        } else if (char == "Ù") {
            text[index] = "%C3%99";
        } else if (char == "Û") {
            text[index] = "%C3%9B";
        } else if (char == "Ç") {
            text[index] = "%C3%87";
        } else if (char == "Ô") {
            text[index] = "%C3%94";
        } else if (char == "Î") {
            text[index] = "%C3%8E";
        } else if (char == "Ï") {
            text[index] = "%C3%8F";
        } else if (char == "Œ") {
            text[index] = "%C5%92";
        } else if (char == "Æ") {
            text[index] = "%C3%86";
        } else if (char == "§") {
            text[index] = "%C2%A7";
        } else if (char == "°") {
            text[index] = "%C2%B0";
        } else if (char == "€") {
            text[index] = "%E2%82%AC";
        } else if (char == "£") {
            text[index] = "%C2%A3";
        } else if (char == "¤") {
            text[index] = "%C2%A4";
        } else if (char == "¥") {
            text[index] = "%C2%A5";
        } else if (char == "µ") {
            text[index] = "%C2%B5";
        } else if (char == "¶") {
            text[index] = "%C2%B6";
        } else if (char == "•") {
            text[index] = "%E2%80%A2";
        } else if (char == "¶") {
            text[index] = "%C2%B6";
        } else if (char == "·") {
            text[index] = "%C2%B7";
        } else if (char == "¹") {
            text[index] = "%C2%B9";
        } else if (char == "²") {
            text[index] = "%C2%B2";
        } else if (char == "³") {
            text[index] = "%C2%B3";
        } else if (char == "¼") {
            text[index] = "%C2%BC";
        } else if (char == "½") {
            text[index] = "%C2%BD";
        } else if (char == "¾") {
            text[index] = "%C2%BE";
        } else if (char == "¿") {
            text[index] = "%C2%BF";
        } else if (char == "¡") {
            text[index] = "%C2%A1";
        } else if (char == "}") {
            text[index] = "%7D";
        } else if (char == "{") {
            text[index] = "%7B";
        } else if (char == "<") {
            text[index] = "%3C";
        } else if (char == ">") {
            text[index] = "%3E";
        } else if (char == "^") {
            text[index] = "%5E";
        } else if (char == "`") {
            text[index] = "%60";
        } else if (char == "|") {
            text[index] = "%7C";
        }
    });
    text = text.join("");
    inputTextCopy.textContent = text;
}

const changeImage = () => {
    // Lorsqu'on change l'image on change l'image du profil
    inputImage.addEventListener('change', () => {
        profileImage.src = URL.createObjectURL(inputImage.files[0]);
        if (inputImage.files[0].size > 1000000) {
            inputImage.value = "";
            profileImage.src = "./asset/image/users/unnamed.jpg";
            alert("L'image est trop lourde !");
        }
        if (inputImage.files.length > 0) {
            chooseImage.textContent = "Changer mon image ..";
        }
    });
}

// Lorsqu'on clique sur le texte "Choisir une image" on simule un click sur l'input file
var chooseImage = document.querySelector('.container-input-file > h2');
var inputImage = document.querySelector('.input-file-signup');
var profileImage = document.querySelector('.container-input-file > img');
chooseImage.addEventListener('click', () => {
    inputImage.click();
    changeImage();
});