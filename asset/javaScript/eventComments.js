const shortUsernames = () => {
    document.querySelectorAll('.comment-author>p').forEach((username) => {
        if (username.innerText.length > 10) {
            username.innerText = username.innerText.substring(0, 8) + '...';
        }
    });
};
shortUsernames();

var commentsShorted = new Array();
const shortComments = (element) => {
    document.querySelectorAll('.comment-content').forEach((comment) => {
        if (comment.innerText.length > 100) {
            commentsShorted.push(comment.innerText);
            comment.innerText = comment.innerText.substring(0, 330) + '...';
        } else {
            comment.parentNode.querySelector('p:last-child').style.display = "none";
            commentsShorted.push(null);
        }
    });
};

const shortComment = (element, nbr) => {
    element.parentNode.querySelector('.comment-content').innerText = commentsShorted[nbr].substring(0, 330) + '...';
};
shortComments();

// Fonction qui retourne le nombre associé à l'élément
const getCommentNumberId = (element) => {
    return parseInt(element.id.replace('cmr', ''));
}

// Fonction qui désaffiche les commentaires trop longs en entier lorsqu'on clique sur le bouton "Voir moins"
const shrinkComment = (element) => {
    element.innerText = "Voir plus";
    let nbr = getCommentNumberId(element);
    document.querySelectorAll('.like-comment-container')[nbr].style.removeProperty('transform');
    document.querySelectorAll('.colored-comment-part')[nbr].style.removeProperty('height');

    shortComment(element, nbr);

    element.setAttribute('onclick', 'showAllComment(this)');
}

// Fonction qui affiche les commentaires trop longs en entier lorsqu'on clique sur le bouton "Voir plus"
const showAllComment = (element) => {
        element.innerText = "Voir moins";
        let nbr = getCommentNumberId(element);
        document.querySelectorAll('.like-comment-container')[nbr].style.transform = "translateY(2vw)";
        document.querySelectorAll('.colored-comment-part')[nbr].style.height = "fit-content";
        element.parentNode.querySelector('.comment-content').innerText = commentsShorted[nbr];

        element.setAttribute('onclick', 'shrinkComment(this)');
}

// Afficher les réponses lorsqu'on clique sur le bouton "X réponses"
const showReplies = (element) => {
    element.classList.toggle('view-replies-active');

    repliesContainer = element.parentNode.querySelector('.comment-answers-visible');
    textButton = element.querySelector("p");

    if (repliesContainer.style.display == "none") {
        repliesContainer.style.display = "block";
        textButton.innerText = "Masquer";
    } else {
        textButton.innerText = "Voir";
        repliesContainer.style.display = "none";
    }
}

// Lorsque l'on clique sur la barre du champ on déclenche une animation
var bar = document.querySelector('.white-comment-bar');
const extendBar = (element) => {
    bar.style.width = "90%";
    bar.style.opacity = "1";
    bar.style.backgroundColor = "white";
}

// Lorsque l'on quitte le champ on déclenche une animation
var textArea = document.querySelector('.comment-field');
const shrinkBar = (element) => {
    bar.style.removeProperty('width');
    bar.style.removeProperty('opacity');
    bar.style.removeProperty('background-color');

    if (textArea.value == "") {
        cancelButton.removeAttribute('style');
    }
}

// Fonction qui désaffiche le bouton "Annuler" lorsque le champ est vide
var cancelButton = document.getElementById('cancel-comment');
const displayCancelButton = (element) => {
    if (element.value == "") {
        if (element.hasAttribute('style')) {
            cancelButton.removeAttribute('style');
        }
    } else {
        cancelButton.style.opacity = "1";
        cancelButton.style.cursor = "pointer";
    }
}
    
// Fonction qui vide le champ de commentaire lorsqu'on clique dessus
const emptyCommentField = (element) => {
    element.parentNode.querySelector('.comment-field').value = "";
    displayCancelButton(element);
}
