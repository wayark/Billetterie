displayPhoneNumber();

var oldDescription = null;
const descriptionText = document.querySelector(".text-user-desc");
const readMoreButton = document.querySelector("#see-more-description");
const shrinkDescription = () => {
    if (descriptionText.innerHTML.length > 650) {
        oldDescription = descriptionText.textContent;
        descriptionText.innerHTML = descriptionText.innerHTML.substring(0, 600) + "...";
        readMoreButton.style.display = "block";
    }
}
shrinkDescription();

var isFullDescription = false;
const showMoreText = () => {
    if (!isFullDescription) {
        descriptionText.innerHTML = oldDescription;
        readMoreButton.innerHTML = "Voir moins";
        isFullDescription = true;
    } else {
        shrinkDescription();
        readMoreButton.innerHTML = "Voir plus";
        isFullDescription = false;
    }
}