<?php
/**
 * @var array{
 *     eventName: string,
 *     eventPicture:string,
 *     eventPictureDescription: string,
 *     eventDate: string,
 *     eventDescription: string,
 *     eventPlaceName: string,
 *     eventPlaceStreet: string,
 *     eventPlaceCity: string,
 *     eventPlaceCountry: string,
 *     pricings: string,
 *     pricingsSelect: string} $display The data to display
 * @var string $textToDisplay
 * @var bool $posted
 * @var array{event: string} $ticketAddedToCart
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/event.css">
    <script src="<?php echo PATH_SCRIPTS . "justbought.js" ?>" defer></script>
    <script src="<?php echo PATH_SCRIPTS . "eventComments.js" ?>" defer></script>
    <title><?= $display['eventName'] ?></title>
</head>
<body>
<?php require_once PATH_VIEWS . 'header.php'; ?>
<?php if (!$posted) { ?>
    <div id="container">
        <div id="container-description-event">
            <div id="img-title-date">
                <img src="<?= $display['eventPicture'] ?>"
                     alt="<?= $display['eventPictureDescription'] ?>">
                <div id="title-date">
                    <h1><?= $display['eventName'] ?></h1>
                    <p><?= $display['eventDate'] ?></p>
                </div>
            </div>
            <div id="summary-and-informations">
                <div id="summary">
                    <h1 class="title-section">Résumé</h1>
                    <p><?= $display['eventDescription'] ?></p>
                </div>
                <div id="description-and-image-container">
                    <div id="informations-event">
                        <h1 class="title-section">Informations</h1>
                        <div id="place">
                            <h3 class="title-desc">Lieu</h3>
                            <p><?= $display['eventPlaceName'] ?></p>
                            <p><?= $display['eventPlaceStreet'] ?></p>
                            <p><?= $display['eventPlaceCity'] ?></p>
                            <p><?= $display['eventPlaceCountry'] ?></p>
                        </div>
                        <div id="places">
                            <h3 class="title-desc">Nombre de places restantes</h3>
                            <?= $display['pricings'] ?>
                        </div>
                    </div>
                </div>
                <?php if (isset($_SESSION['user'])) { ?>
                    <form id="form-event" method="post">
                        <?= $display['pricingsSelect'] ?>
                        <div id="quantity">
                            <p for="quantity">Quantité</p>
                            <input type="number" id="quantity" name="quantity" min="1" max="10" value="1" required>
                        </div>
                        <button id="btn-book" type="submit">Ajouter au panier</button>
                    </form>
                <?php } else { ?>
                    <div id="form-event">
                        <?= $display['pricingsSelect'] ?>
                        <div id="quantity">
                            <p for="quantity">Quantité</p>
                            <input type="number" id="quantity" name="quantity" min="1" max="10" value="1" required>
                        </div>
                        <a id="btn-book" href="?page=connection">Ajouter au panier</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div id="addtocarttextcontainer">
        <div id="imgandtextaddtocart">
            <img src="<?= PATH_IMAGES . "/useful/justbought.png" ?>" alt="justbought" draggable="false">
            <h1 id="thankstoaddtocart" class="addtocarttext"><?php echo $textToDisplay; ?></h1>
        </div>
        <?= $ticketAddedToCart["event"] ?>
        <a href="?page=cart" class="buttonwherebuy" onmouseover="changeImgButtonColor(this);"
           onmouseout="unchangeImgButtonColor(this);">
            <img draggable="false" src="<?php echo PATH_IMAGES . "useful/cart.png"; ?>">Voir mon panier
        </a>
        <a href="./" class="buttonwherebuy" onmouseover="changeImgButtonColor(this);"
           onmouseout="unchangeImgButtonColor(this);">
            Continuer mes achats<img draggable="false" src="<?= PATH_IMAGES . "useful/doublearrow.png"; ?>">
        </a>
    </div>
<?php } 
    if (isset($_SESSION['user'])) { ?>
        <form action="./?page=event&event=<?= $display["eventId"]; ?>" class="send-comment-form" method="post">
            <a href="./?page=profile&profile=<?= $_SESSION['user']->getId(); ?>">
                <img src="<?= $_SESSION["user"]->getProfilePicturePath(); ?>" alt="avatar" class="user-img">
                <p><?= $_SESSION["user"]->getFirstName(); ?></p>
            </a>
            <div class="field-comment-and-bar">
                <input type="text" name="sendcomment" class="comment-field" placeholder="Ecrivez votre commentaire ici .." onfocus="extendBar(this)" onblur="shrinkBar(this)" oninput="displayCancelButton(this)"></input>
                <div class="white-comment-bar"></div>
            </div>
            <input type="hidden" name="eventid" value="<?= $display['eventId'] ?>">
            <input type="submit" value="Envoyer">
            <button type="button" id="cancel-comment" onclick="emptyCommentField(this)">Annuler</button>
        </form>
<?php } ?>
    <section class="comment-container">
        <div id="title-comment">
            <h1>3</h1>
            <h1> commentaires :</h1>
        </div>
        <div class="comment-bar"></div>
        <div class="comment">
            <div class="colored-comment-part">
                <a href="?page=profile&profile=" class="comment-author">
                    <img src="https://i.pravatar.cc/150?img=1" alt="avatar">
                    <p>XXBGDU93XX</p>
                </a>
                <div class="comment-content-date">
                    <p class="comment-date">Le 01/01/2021 à 00:00</p>
                    <p class="comment-content">Ceci est un commentaire hahahhhaha</p>
                    <p class="comment-read-more" id="0" onclick="showAllComment(this)">Voir plus</p>         
                </div>
                <div class="like-comment-container">
                    <form action="./?page=event&event=<?= $display["eventId"]; ?>" method="post" id="likebtn" class="like-form">
                        <input type="hidden" value="like">
                        <p>1</p>
                        <button type="submit"><img src="<?= PATH_IMAGES . "useful/likeblack.png" ?>" alt="like" class="like-btn-img"></button>
                    </form>
                    <form action="./?page=event&event=" method="post" id="dislikebtn" class="like-form">
                        <input type="hidden" value="dislike">
                        <p>0</p>
                        <button type="submit"><img src="<?= PATH_IMAGES . "useful/likered.png" ?>" alt="dislike" class="like-btn-img"></button>
                    </form>
                </div>
            </div>
            <div class="comment-answers" onclick="showReplies(this);">
                <div>
                    <p>Voir</p>
                    <p>les</p>
                    <p>10</p>
                    <p>réponse</p>
                </div>
                <p class="invert-text">></p>
            </div>
            <div class="comment-answers-visible" style="display:none">
                <div class="reply"></div>
                <div class="reply"></div>
                <div class="reply"></div>
            </div>
        </div>
        <div class="comment">
            <div class="colored-comment-part">
                <a href="?page=profile&profile=" class="comment-author">
                    <!-- image de naps -->
                    <img src="<?= PATH_IMAGES . 'users/'?>naps.jpg" alt="avatar">
                    <p>OKAYOKAYNAPS</p>
                </a>
                <div class="comment-content-date">
                    <p class="comment-date">Le 02/02/2022 à 11:11</p>
                    <p class="comment-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus quia alias qui, incidunt cupiditate reiciendis, quibusdam ex repellendus molestiae, voluptas consectetur! Dolore optio molestiae laudantium nulla quod ipsam possimus dolor. Asperiores magnam hic maxime, veritatis atque, soluta incidunt pariatur maiores recusandae harum voluptatem ab porro quaerat commodi id illum? Repudiandae dolor necessitatibus rem consectetur aut odit, excepturi possimus nam eveniet, doloremque dignissimos mollitia amet velit soluta nemo qui dolores reprehenderit explicabo consequatur! Quisquam facilis ullam cum veritatis corrupti iste aliquam at! Molestiae soluta excepturi aspernatur fugiat laborum amet provident eligendi animi asperiores neque, voluptate enim minus officia, sed ex porro dolorum quasi non dicta? Dignissimos modi fugit quas corrupti saepe eos a! Optio dicta earum asperiores esse reprehenderit nemo tempore, pariatur quam libero quos commodi distinctio obcaecati voluptatibus ipsa. Minus ut incidunt blanditiis ratione voluptatibus velit rerum sunt ad! Sed unde fugit labore aspernatur magnam. Accusamus quos quidem perferendis eligendi.</p>     
                    <p class="comment-read-more" id="1" onclick="showAllComment(this)">Voir plus</p>  
                </div>
                <div class="like-comment-container">
                    <form action="./?page=event&event=<?= $display["eventId"]; ?>" method="post" id="likebtn" class="like-form">
                        <input type="hidden" value="like">
                        <p>1</p>
                        <button type="submit"><img src="<?= PATH_IMAGES . "useful/likeblack.png" ?>" alt="like" class="like-btn-img"></button>
                    </form>
                    <form action="./?page=event&event=" method="post" id="dislikebtn" class="like-form">
                        <input type="hidden" value="dislike">
                        <p>0</p>
                        <button type="submit"><img src="<?= PATH_IMAGES . "useful/likered.png" ?>" alt="dislike" class="like-btn-img"></button>
                    </form>
                </div>
            </div>
            <div class="comment-answers" onclick="showReplies(this);">
                <div>
                    <p>Voir</p>
                    <p>les</p>
                    <p>10</p>
                    <p>réponse</p>
                </div>
                <p class="invert-text">></p>
            </div>
            <div class="comment-answers-visible" style="display:none">
                <div class="reply"></div>
                <div class="reply"></div>
                <div class="reply"></div>
            </div>
        </div>
        <div class="comment">
            <div class="colored-comment-part">
                <a href="?page=profile&profile=" class="comment-author">
                    <!-- image de naps -->
                    <img src="<?= PATH_IMAGES . 'users/'?>naps.jpg" alt="avatar">
                    <p>OKAYOKAYNAPS</p>
                </a>
                <div class="comment-content-date">
                    <p class="comment-date">Le 02/02/2022 à 11:11</p>
                    <p class="comment-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus quia alias qui, incidunt cupiditate reiciendis, quibusdam ex repellendus molestiae, voluptas consectetur! Dolore optio molestiae laudantium nulla quod ipsam possimus dolor. Asperiores magnam hic maxime, veritatis atque, soluta incidunt pariatur maiores recusandae harum voluptatem ab porro quaerat commodi id illum? Repudiandae dolor necessitatibus rem consectetur aut odit, excepturi possimus nam eveniet, doloremque dignissimos mollitia amet velit soluta nemo qui dolores reprehenderit explicabo consequatur! Quisquam facilis ullam cum veritatis corrupti iste aliquam at! Molestiae soluta excepturi aspernatur fugiat laborum amet provident eligendi animi asperiores neque, voluptate enim minus officia, sed ex porro dolorum quasi non dicta? Dignissimos modi fugit quas corrupti saepe eos a! Optio dicta earum asperiores esse reprehenderit nemo tempore, pariatur quam libero quos commodi distinctio obcaecati voluptatibus ipsa. Minus ut incidunt blanditiis ratione voluptatibus velit rerum sunt ad! Sed unde fugit labore aspernatur magnam. Accusamus quos quidem perferendis eligendi.</p>     
                    <p class="comment-read-more" id="2" onclick="showAllComment(this)">Voir plus</p>  
                </div>
                <div class="like-comment-container">
                    <form action="./?page=event&event=<?= $display["eventId"]; ?>" method="post" id="likebtn" class="like-form">
                        <input type="hidden" value="like">
                        <p>1</p>
                        <button type="submit"><img src="<?= PATH_IMAGES . "useful/likeblack.png" ?>" alt="like" class="like-btn-img"></button>
                    </form>
                    <form action="./?page=event&event=" method="post" id="dislikebtn" class="like-form">
                        <input type="hidden" value="dislike">
                        <p>0</p>
                        <button type="submit"><img src="<?= PATH_IMAGES . "useful/likered.png" ?>" alt="dislike" class="like-btn-img"></button>
                    </form>
                </div>
            </div>
            <div class="comment-answers" onclick="showReplies(this);">
                <div>
                    <p>Voir</p>
                    <p>les</p>
                    <p>10</p>
                    <p>réponse</p>
                </div>
                <p class="invert-text">></p>
            </div>
            <div class="comment-answers-visible" style="display:none">
                <div class="reply"></div>
                <div class="reply"></div>
                <div class="reply"></div>
            </div>
        </div>
    </section>
<?php require_once PATH_VIEWS . 'footer.php'; ?>
</body>
</html>