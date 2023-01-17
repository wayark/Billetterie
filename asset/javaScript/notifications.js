// Reduire les commenaires trop longs
document.querySelectorAll(".part-comment").forEach((comment) => {
    comment.innerHTML = comment.innerHTML.substring(0, 35) + "...";
}); 

// Reduire les titres trop longs
console.log("HEGE");
document.querySelectorAll(".event-name-approaching-event").forEach((event) => {
    event.innerHTML = event.innerHTML.substring(0, 35) + "...";
});

document.querySelectorAll(".event-name-sold-ticket").forEach((event) => {
    event.innerHTML = event.innerHTML.substring(0, 50) + "...";
});