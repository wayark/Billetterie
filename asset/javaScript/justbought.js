// Raccourcir la description

let eventDescriptions = document.querySelectorAll('.eventdesc');
eventDescriptions.forEach((eventDescription) => {
    let text = eventDescription.innerText;
    if (text.length > 100) {
        text = text.substring(0, 250) + '...';
        eventDescription.innerText = text;
    }
});