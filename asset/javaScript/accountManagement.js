var changement = false;
console.log("test");

function managementAccount() {
    const accountButton = document.getElementById("account");

    if (changement === false) {
        document.getElementById("prenomE").style.display = "block";
        document.getElementById("nomE").style.display = "block";
        document.getElementById("mailE").style.display = "block";
        document.getElementById("naissanceE").style.display = "block";
        document.getElementById("adresseE").style.display = "block";
        document.getElementById("paymentMethodE").style.display = "block";
        document.getElementById("photoE").style.display = "block";

        document.getElementById("prenomA").style.display = "none";
        document.getElementById("nomA").style.display = "none";
        document.getElementById("mailA").style.display = "none";
        document.getElementById("naissanceA").style.display = "none";
        document.getElementById("adresseA").style.display = "none";
        document.getElementById("paymentMethodA").style.display = "none";
        document.getElementById("photoA").style.display = "none";

        document.getElementById("submit").style.display = "block";

        accountButton.innerHTML = "Annuler";
        changement = true;
    } else {
        document.getElementById("prenomE").style.display = "none";
        document.getElementById("nomE").style.display = "none";
        document.getElementById("mailE").style.display = "none";
        document.getElementById("naissanceE").style.display = "none";
        document.getElementById("adresseE").style.display = "none";
        document.getElementById("paymentMethodE").style.display = "none";
        document.getElementById("photoE").style.display = "none";

        document.getElementById("prenomA").style.display = "block";
        document.getElementById("nomA").style.display = "block";
        document.getElementById("mailA").style.display = "block";
        document.getElementById("naissanceA").style.display = "block";
        document.getElementById("adresseA").style.display = "block";
        document.getElementById("paymentMethodA").style.display = "block";
        document.getElementById("photoA").style.display = "block";

        document.getElementById("submit").style.display = "none";

        accountButton.innerHTML = "Modifier mes informations";
        changement = false;
    }

}

document.getElementById("account").addEventListener("click", () => {
    managementAccount();
});
