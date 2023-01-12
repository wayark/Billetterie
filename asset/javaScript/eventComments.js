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

    repliesContainer = element.parentNode.parentNode.querySelector('.comment-answers-visible');
    textButton = element.querySelector('p');

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

// Fonction qui affiche le bouton "Annuler" lorsque le champ n'est pas vide
const displayReplyCancelButton = (element) => {
    if (element.value == "") {
        element.parentNode.parentNode.querySelector('.cancel-reply').removeAttribute('style');
    } else {
        element.parentNode.parentNode.querySelector('.cancel-reply').style.opacity = "1";
        element.parentNode.parentNode.querySelector('.cancel-reply').style.cursor = "pointer";
    }
}

const emptyReplyField = (element) => {
    element.parentNode.querySelector('.reply-field').value = "";
    displayReplyCancelButton(element);
}

// Fonction qui agrandit la barre mais pour le champ reponses
const extendReplyBar = (element) => {
    element.parentNode.querySelector('.white-reply-bar').style.width = "90%";
    element.parentNode.querySelector('.white-reply-bar').style.opacity = "1";
}

// Fonction qui retrecit la barre mais pour le champ reponses
const shrinkReplyBar = (element) => {
    element.parentNode.querySelector('.white-reply-bar').style.removeProperty('width');
    element.parentNode.querySelector('.white-reply-bar').style.removeProperty('opacity');
}

// Fonction qui initialise le form des réponses
const initForm = (form) => {
    form.classList.add('answer-container');
    form.querySelector('.white-comment-bar').classList.add('white-reply-bar');
    form.querySelector('.white-comment-bar').classList.remove('white-comment-bar');
    form.querySelector('.comment-field').setAttribute('placeholder', 'Ecrivez votre réponse ici ..');
    form.querySelector('.comment-field').setAttribute('onfocus', 'extendReplyBar(this)');
    form.querySelector('.comment-field').setAttribute('onblur', 'shrinkReplyBar(this)');
    form.querySelector('.comment-field').setAttribute('oninput', 'displayReplyCancelButton(this)');
    form.querySelector("#cancel-comment").setAttribute('onclick', 'emptyReplyField(this)');
    form.querySelector("#cancel-comment").classList.add('cancel-reply');
    form.querySelector("#cancel-comment").removeAttribute('id');
    form.querySelector(".comment-field").classList.add('reply-field');
    form.querySelector(".comment-field").classList.remove('comment-field');
}

// Fonction qui fait apparaitre le champ commentaire {
var formTextAreaContainer = document.querySelector(".send-comment-form");

const disappearTextArea = (element) => {
    element.parentNode.parentNode.querySelector('.answer-container').remove();
}
const showTextArea = (element) => {
    if (element.parentNode.parentNode.querySelector('.answer-container') != null){
        element.parentNode.parentNode.querySelector('.answer-container').style.removeProperty('opacity');
        element.querySelector('p:last-child').style.removeProperty('transform');
        setTimeout(() => {
            disappearTextArea(element);
        }, 100);
    } else {;
        let form = formTextAreaContainer.cloneNode(true);
        initForm(form);

        setTimeout(function() {
            form.style.opacity = "1";
        }, 20);
        element.querySelector('p:last-child').style.transform = "rotate(90deg)";
        answersContainer = element.parentNode.parentNode.parentNode.querySelector('.comment-answers-visible');

        element.parentNode.parentNode.insertBefore(form, answersContainer);
    }
}

