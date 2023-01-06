// Raccourcir la description

let eventDescriptions = document.querySelectorAll('.eventdesc');
eventDescriptions.forEach((eventDescription) => {
    let text = eventDescription.innerText;
    if (text.length > 100) {
        text = text.substring(0, 250) + '...';
        eventDescription.innerText = text;
    }
});

const changeImgButtonColor = (element) => {
    let imgSrc = element.querySelector("img").src;
    /* imgSrc = imgSrc.substring(0, imgSrc.length - 4)+"_hover.png"; */
    console.log(imgSrc);
}

const unchangeImgButtonColor = (element) => {
    let imgSrc = element.querySelector("img").src;
    imgSrc= imgSrc.substring(0, imgSrc.length - 8)+"cart.png";
    console.log(imgSrc);
}