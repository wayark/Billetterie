// Reduire les commenaires trop longs
document.querySelectorAll(".part-comment").forEach((comment) => {
    comment.innerHTML = comment.innerHTML.substring(0, 43) + "...";
}); 

document.querySelectorAll(".part-comment-more-longer").forEach((comment) => {
    comment.innerHTML = comment.innerHTML.substring(0, 51) + "...";
}); 

document.querySelectorAll(".part-comment-bit-more-longer").forEach((comment) => {
    comment.innerHTML = comment.innerHTML.substring(0, 45) + "...";
}); 

// Reduire les titres trop longs
document.querySelectorAll(".event-name-approaching-event").forEach((event) => {
    event.innerHTML = event.innerHTML.substring(0, 35) + "...";
});

document.querySelectorAll(".event-name-sold-ticket").forEach((event) => {
    event.innerHTML = event.innerHTML.substring(0, 50) + "...";
});