

// Positionner correctement les tickets
zInd = 10;
rotate = "10deg";
initialScale = 1;
gap = 0.05;

var textEventName = document.querySelector(".text-container > .event-name");
var textTicketType = document.querySelector(".text-container > .ticket-type");
var textNbPlaces = document.querySelector(".text-container > .nb-places");
var textEventName = document.querySelector(".text-container > .event-name");


let textOtherTickets = document.querySelectorAll(".hidden-text");

var alltexts = new Array();
textOtherTickets.forEach((container) => {
    let result = new Array();
    result.push(container.querySelector(".event-name").textContent);
    result.push(container.querySelector(".ticket-type").textContent);
    result.push(container.querySelector(".nb-places").textContent);
    result.push(container.querySelector(".ticket-code").textContent);
    alltexts.push(result);
});

var classes = null;
var colors = null;
if (alltexts.length == 2) {

    classes = [
        "violet-button",
        "pink-button",
    ]
    colors = [
        "rgb(55 7 59)",
        "rgb(110 0 23)",
    ]

} else if (alltexts.length >= 3) {
    classes = [
        "violet-button",
        "pink-button",
        "orange-button",
    ]
    colors = [
        "rgb(55 7 59)",
        "rgb(110 0 23)",
        "rgb(214 125 5)"
    ]
}

var hiddenInput = document.querySelector(".button-generate-pdf > input[type='hidden']");

let index = 0;

const checkOtherTicket = (direction) => {

    let seePreviousTicket = direction === 1;

    let indexTicket = document.querySelector(".nb-tickets-container > .to-modify");
    let buttonDownloadPDF = document.querySelector(".main-button");
    let ticketsImg = document.querySelectorAll(".ticket > img");

    ticketsSrc = new Array();
    ticketsImg.forEach((ticket) => {
        ticketsSrc.push(ticket.src);
    });

    buttonDownloadPDF.classList.remove(classes[0]);

    if (alltexts.length == 2) {
        if (seePreviousTicket) {
            ticketsImg[0].src = ticketsSrc[1];
            ticketsImg[1].src = ticketsSrc[0];

            let tmp = parseInt(indexTicket.innerHTML) - 1;
            if (tmp < 1) {
                indexTicket.innerHTML = 2;
            } else {
                indexTicket.innerHTML = parseInt(indexTicket.innerHTML) - 1;
            }

            colors.push(colors.shift());
            classes.push(classes.shift());

            index-=1;
            if (index < 0) {
                index = alltexts.length-1;
            }
        } else {
            ticketsImg[0].src = ticketsSrc[1];
            ticketsImg[1].src = ticketsSrc[0];

            let tmp = parseInt(indexTicket.innerHTML) + 1;
            if (tmp > 2) {
                indexTicket.innerHTML = 1;
            } else {
                indexTicket.innerHTML = parseInt(indexTicket.innerHTML) + 1;
            }

            colors.unshift(colors.pop());
            classes.unshift(classes.pop());

            index+=1;
            if (index > alltexts.length-1) {
                index = 0;
            }
        }
        buttonDownloadPDF.classList.add(classes[0]);
        textEventName.innerHTML = alltexts[index][0];
        textTicketType.innerHTML = alltexts[index][1];
        textNbPlaces.innerHTML = alltexts[index][2];
        textEventName.style.color = colors[0];

        hiddenInput.value = alltexts[index][3];
        console.log(alltexts[index][3]);

    } else if (alltexts.length >= 3) {

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

            colors.push(colors.shift());
            classes.push(classes.shift());

            index-=1;
            if (index < 0) {
                index = alltexts.length-1;
            }
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

            colors.unshift(colors.pop());
            classes.unshift(classes.pop());
            index+=1;
            if (index > alltexts.length-1) {
                index = 0;
            }
        } 

        buttonDownloadPDF.classList.add(classes[0]);
        textEventName.innerHTML = alltexts[index][0];
        textTicketType.innerHTML = alltexts[index][1];
        textNbPlaces.innerHTML = alltexts[index][2];
        textEventName.style.color = colors[0];
    
        hiddenInput.value = alltexts[index][3];
    }
}
