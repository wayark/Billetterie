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
            comment.parentNode.querySelector('p:last-child').style.display = "none";
            commentsShorted.push(null);
        }
    });
};
shortComments();

// Fonction qui affiche les commentaires trop longs en entier lorsqu'on clique sur le bouton "Voir plus"
const showAllComment = (element) => {
    element.style.display = 'none';
    let nbr = parseInt(element.id.replace('cmr', ''));
    document.querySelectorAll('.like-comment-container')[nbr].style.transform = "translateY(3.5vw)";
    document.querySelectorAll('.colored-comment-part')[nbr].style.height = "fit-content";
    document.querySelectorAll('.colored-comment-part')[nbr].style.paddingBottom = "2vw";
    element.parentNode.querySelector('.comment-content').innerText = commentsShorted[nbr];
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

    