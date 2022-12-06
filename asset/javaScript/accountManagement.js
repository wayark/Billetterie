var changement = false;
console.log("test");
function managementAccount(){
    if(changement == false){
        document.getElementById("prenomE").style.display = "block";
        document.getElementById("nomE").style.display = "block";
        document.getElementById("mailE").style.display = "block";
        document.getElementById("prenomA").style.display ="none";
        document.getElementById("nomA").style.display ="none";
        document.getElementById("mailA").style.display ="none";
        changement = true;
    }
    else{
        document.getElementById("prenomE").style.display = "block";
        document.getElementById("nomE").style.display = "block";
        document.getElementById("mailE").style.display = "block";
        document.getElementById("prenomA").style.display ="none";
        document.getElementById("nomA").style.display ="none";
        document.getElementById("mailA").style.display ="none";
        changement = false;
    }

}
document.getElementById("account").addEventListener("click", ()=>{
    managementAccount();
});