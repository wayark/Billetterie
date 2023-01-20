

// Positionner correctement les tickets
zInd = 10;
rotate = "10deg";
initialScale = 1;
gap = 0.05;

var classes = [
    "violet-button",
    "pink-button",
    "orange-button",
]

const checkOtherTicket = (direction) => {
    let seePreviousTicket = direction === -1;

    let indexTicket = document.querySelector(".nb-tickets-container > .to-modify");
    let buttonDownloadPDF = document.querySelector(".main-button");
    let ticketsImg = document.querySelectorAll(".ticket > img");
/*     let textOtherTickets = document.querySelectorAll(".hidden-text");

    let textEventName = textOtherTickets.querySelector(".event-name");
    let textEventDate = textOtherTickets.querySelector(".ticket-type");
    let textEventPlace = textOtherTickets.querySelector(".nb-places"); */

    ticketsSrc = new Array();
    ticketsImg.forEach((ticket) => {
        ticketsSrc.push(ticket.src);
    });

    console.log(buttonDownloadPDF);

    buttonDownloadPDF.classList.remove(classes[0]);

    if (seePreviousTicket) {
        ticketsImg[0].src = ticketsSrc[1];
        ticketsImg[1].src = ticketsSrc[2];
        ticketsImg[2].src = ticketsSrc[0];

        let tmp = parseInt(indexTicket.innerHTML) - 1;
        if (tmp < 1) {
            indexTicket.innerHTML = 3;
        } else {
            indexTicket.innerHTML = parseInt(indexTicket.innerHTML) - 1;
        }
        
        classes.push(classes.shift());
/*         textOtherTickets.push(textOtherTickets.shift()); */
    } else {
        ticketsImg[0].src = ticketsSrc[2];
        ticketsImg[1].src = ticketsSrc[0];
        ticketsImg[2].src = ticketsSrc[1];

        let tmp = parseInt(indexTicket.innerHTML) + 1;
        if (tmp > 3) {
            indexTicket.innerHTML = 1;
        } else {
            indexTicket.innerHTML = parseInt(indexTicket.innerHTML) + 1;
        }

        classes.unshift(classes.pop());
/*         textOtherTickets.unshift(textOtherTickets.pop()); */
    } 

    buttonDownloadPDF.classList.add(classes[0]);
/*     textEventName.innerHTML = textOtherTickets[0].querySelector(".event-name").innerHTML;
    textEventDate.innerHTML = textOtherTickets[0].querySelector(".ticket-type").innerHTML;
    textEventPlace.innerHTML = textOtherTickets[0].querySelector(".nb-places").innerHTML; */
}
