var canClick = true;
const moveCarousel = (button) => {
    if(canClick){
        let tendancies = document.querySelectorAll('.tendancies div');
        if (button.id.includes('Left')) {
            let tmp = tendancies[0].cloneNode(true);
            tendancies[0].style.backgroundImage = tendancies[1].style.backgroundImage;
            tendancies[1].style.backgroundImage = tendancies[2].style.backgroundImage;
            tendancies[2].style.backgroundImage = tmp.style.backgroundImage;
        } else {
            let tmp = tendancies[2].cloneNode(true);
            tendancies[2].style.backgroundImage = tendancies[1].style.backgroundImage;
            tendancies[1].style.backgroundImage = tendancies[0].style.backgroundImage;
            tendancies[0].style.backgroundImage = tmp.style.backgroundImage;
        }
        canClick = false;
        setTimeout(() => {
            canClick = true;
        }, 1000);
    }
}

const shortDescriptions = () => {
    let eventDescriptions = document.querySelectorAll('.eventdesc');
    eventDescriptions.forEach((eventDescription) => {
        let text = eventDescription.innerText;
        if (text.length > 100) {
            text = text.substring(0, 250) + '...';
            eventDescription.innerText = text;
        }
    });
}
shortDescriptions();