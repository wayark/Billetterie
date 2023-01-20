const shortUsernames = () => {
    document.querySelectorAll('.comment-author>p').forEach((username) => {
        if (username.innerText.length > 10) {
            username.innerText = username.innerText.substring(0, 8) + '...';
        }
    });
};
shortUsernames();

var commentsShorted = new Array();
const shortComments = () => {
    document.querySelectorAll('.comment-content').forEach((comment) => {
        if (comment.innerText.length > 100) {
            commentsShorted.push(comment.innerText);
            comment.innerText = comment.innerText.substring(0, 330) + '...';
        } else {
            comment.parentNode.querySelector('p:last-child').remove();
            commentsShorted.push(null);
        }
    });
};

const shortComment = (element, nbr) => {
    element.parentNode.querySelector('.comment-content').innerText = commentsShorted[nbr].substring(0, 330) + '...';
};
shortComments();

var shortsReplies = new Array(new Array());
const shortReplies = () => {
    document.querySelectorAll(".comment").forEach((comment, index) => {
        comment.querySelectorAll('.reply-content').forEach((reply, index2) => {
            if (reply.innerText.length > 220) {
                shortsReplies[index][index2] = reply.innerText;
                reply.innerText = reply.innerText.substring(0, 220) + '...';
            } else {
                shortsReplies[index][index2] = null;
                reply.parentNode.querySelector('p:last-child').remove();
            }
        });
        shortsReplies.push(new Array());
    });
};
shortReplies();

const showAllReply = (element, nbrComment) => {
    let nbrReply = getReplyNumberId(element);
    element.parentNode.parentNode.style.height = "fit-content";
    element.innerText = "Voir moins";
    element.parentNode.querySelector('.reply-content').innerText = shortsReplies[nbrComment][nbrReply];
    element.setAttribute('onclick', `shrinkReply(this, ${nbrComment})`);
}

const shrinkReply = (element, nbrComment) => {
    let nbrReply = getReplyNumberId(element);
    document.querySelectorAll('.reply')[nbrReply].style.removeProperty('height');
    element.innerText = "Voir plus";
    element.parentNode.querySelector('.reply-content').innerText = shortsReplies[nbrComment][nbrReply].substring(0, 220) + '...';
    element.setAttribute('onclick', `showAllReply(this, ${nbrComment})`);
}

// Fonction qui retourne le nombre associé à l'élément
const getCommentNumberId = (element) => {
    return parseInt(element.id.replace('crm', ''));
}

const getReplyNumberId = (element) => {
    return parseInt(element.id.replace('rrm', ''));
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
var canShowReply = true;
const showReplies = (element) => {
    if (!canShowReply) return;
    canShowReply = false;

    element.classList.toggle('view-replies-active');

    repliesContainer = element.parentNode.parentNode.querySelector('.comment-answers-visible');
    textButton = element.querySelector('p');
    let replies = repliesContainer.querySelectorAll('.reply');
    let valueOpacity = 0;

    if (repliesContainer.style.display == "none") {
        repliesContainer.style.display = "flex";
        textButton.innerText = "Masquer";

        let i = 0;
        let intervalAppear = setInterval(() => {
            replies[i].style.display = "flex";
            replies[i].style.opacity = "1";
            replies[i].style.transform = "scale(0.97)";
            if(i > 0) replies[i-1].style.removeProperty('transform')
            if(i == replies.length-1) {
                clearInterval(intervalAppear);
                setTimeout(() => {
                    replies[i].style.removeProperty('transform');
                }, 100);
                return;
            }
            i++;
        }, 50);

    } else {
        textButton.innerText = "Voir";

        let i = replies.length-1;
        let intervalAppear = setInterval(() => {
            replies[i].style.transform = "scale(0.97)";
                setTimeout(() => {
                    replies[i].style.opacity = "0";
                    if(i < replies.length-1) replies[i+1].style.removeProperty('transform');
                    if(i == 0) {
                        clearInterval(intervalAppear);
                        setTimeout(() => {
                            replies[i].style.removeProperty('transform');
                            repliesContainer.style.display = "none";
                        }, 100);
                        return;
                    }
                    i--;
                }, 70);
                replies[i].style.opacity = "0";
            }, 40);
    }
    setTimeout(() => {
        canShowReply = true;
    }, 500);
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

// Fonction qui fait apparaitre le champ commentaire
var formTextAreaContainer = document.querySelector(".send-comment-form");

const disappearTextArea = (element) => {
    element.parentNode.parentNode.querySelector('.answer-container').remove();
}

var lastIndex = null;
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
        answersContainer = element.parentNode.parentNode.querySelector('.comment-answers-visible');

        answersContainer.parentNode.insertBefore(form, answersContainer);
    }
}

