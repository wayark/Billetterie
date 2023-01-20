var canClick = true;
const moveCarousel = (button) => {
    if(canClick){
        let tendancies = document.querySelectorAll('.tendancies div:first-child');
        let tendanciesContainer = document.querySelectorAll('.tendancies');
        let tendanciesText = new Array();

        tendanciesContainer.forEach((tendancy) => {
            tendanciesText.push(tendancy.querySelector('div:last-child p').innerText);
        });

        if (button.id.includes('Left')) {

            let tmp = tendancies[0].cloneNode(true);
            let tmpContainer = tendanciesContainer[0].cloneNode(true);

            tendancies[0].style.backgroundImage = tendancies[1].style.backgroundImage;
            tendanciesContainer[0].href = tendanciesContainer[1].href;
            tendanciesContainer[0].querySelector('div:last-child p').innerText = tendanciesText[1];
            tendancies[1].style.backgroundImage = tendancies[2].style.backgroundImage;
            tendanciesContainer[1].href = tendanciesContainer[2].href;
            tendanciesContainer[1].querySelector('div:last-child p').innerText = tendanciesText[2];
            tendancies[2].style.backgroundImage = tmp.style.backgroundImage;
            tendanciesContainer[2].href = tmpContainer.href;
            tendanciesContainer[2].querySelector('div:last-child p').innerText = tendanciesText[0];
            

        } else {

            let tmp = tendancies[2].cloneNode(true);
            let tmpContainer = tendanciesContainer[2].cloneNode(true);

            tendancies[2].style.backgroundImage = tendancies[1].style.backgroundImage;
            tendanciesContainer[2].href = tendanciesContainer[1].href;
            tendanciesContainer[2].querySelector('div:last-child p').innerText = tendanciesText[1];
            tendancies[1].style.backgroundImage = tendancies[0].style.backgroundImage;
            tendanciesContainer[1].href = tendanciesContainer[0].href;
            tendanciesContainer[1].querySelector('div:last-child p').innerText = tendanciesText[0];
            tendancies[0].style.backgroundImage = tmp.style.backgroundImage;
            tendanciesContainer[0].href = tmpContainer.href;
            tendanciesContainer[0].querySelector('div:last-child p').innerText = tendanciesText[2];
        }
        canClick = false;
        setTimeout(() => {
            canClick = true;
        }, 1200);
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

const colorArrow = (button) => {
    let img = button.querySelector('div');
    img.style.backgroundImage= "url('asset/image/useful/arrowwhite.png')";
    if(button.id.includes('Left')){
        img.style.transform = "rotate(180deg) scale(0.8)";
    } else {
        img.style.transform = "scale(0.8)";
    }
} 

const uncolorArrow = (button) => {
    let img = button.querySelector('div');
    img.removeAttribute('style');
}