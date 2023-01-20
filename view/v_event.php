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
    <link rel="stylesheet" href="<?= PATH_CSS ?>reception.css">
    <link rel="stylesheet" href="<?= PATH_CSS ?>event.css">
    <link rel="stylesheet" href="<?= PATH_MEDIA ?>Reception.css">
    <link rel="stylesheet" href="<?= PATH_MEDIA ?>Event.css">
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
                <img src="<?= $display['eventPicture'] ?>" draggable="false" alt="<?= $display['eventPictureDescription'] ?>">
                <div id="title-date">
                    <h1><?= $display['eventName'] ?></h1>
                    <p><?= $display['eventDate'] ?></p>
                    <iframe
                            width="100%"
                            height="80%"
                            style="border:0"
                            loading="lazy"
                            allowfullscreen
                            referrerpolicy="no-referrer-when-downgrade"
                            src="https://www.google.com/maps/embed/v1/place?key=<?= GOOGLE_API_TOKEN ?>&q=<?= $display['eventPlaceName'] ?>+<?= $display['eventPlaceStreet'] ?>+<?= $display['eventPlaceCity'] ?>+<?= $display['eventPlaceCountry'] ?>">
                    </iframe>
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
                            <div class="info-events-container">
                                <p><?= $display['eventPlaceName'] ?></p>
                                <p><?= $display['eventPlaceStreet'] ?></p>
                                <p><?= $display['eventPlaceCity'] ?></p>
                                <p><?= $display['eventPlaceCountry'] ?></p>
                            </div>
                        </div>
                        <div id="places">
                            <h3 class="title-desc">Nombre de places restantes</h3>
                            <div class="info-events-container">
                                <?= $display['pricings'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (isset($_SESSION['user'])) { ?>
                    <form id="form-event" method="post">
                        <?= $display['pricingsSelect'] ?>
                        <div id="quantity">
                            <p for="quantity">Quantité</p>
                            <input type="number" class="quantity-input" name="quantity" min="1" max="10" value="1" required>
                        </div>
                        <button id="btn-book" type="submit">Ajouter au panier</button>
                    </form>
                <?php } else { ?>
                    <div id="form-event">
                        <?= $display['pricingsSelect'] ?>
                        <div id="quantity">
                            <p for="quantity">Quantité</p>
                            <input type="number" class="quantity-input" name="quantity" min="1" max="10" value="1" required>
                        </div>
                        <a id="btn-book" href="./?page=connection">Ajouter au panier</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
        <?php if (isset($_SESSION['user'])) { ?>
        <form action="./?page=event&event=<?= $display["eventId"]; ?>" class="send-comment-form" method="post">
            <a href="./?page=connection&part=profile">
                <img src="<?= $_SESSION["user"]->getProfilePicturePath(); ?>" alt="avatar" class="user-img">
                <p><?= $_SESSION["user"]->getFirstName(); ?></p>
            </a>
            <div class="field-comment-and-bar">
                <input type="text" name="sendcomment" class="comment-field" placeholder="Ecrivez votre commentaire ici .." onfocus="extendBar(this)" onblur="shrinkBar(this)" oninput="displayCancelButton(this)" maxlength="600"required></input>
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
                <a href="?page=profile&user=" class="comment-author">
                    <img src="https://i.pravatar.cc/150?img=1" alt="avatar">
                    <p>XXBGDU93XX</p>
                </a>
                <div class="comment-content-date">
                    <p class="comment-date">Le 01/01/2021 à 00:00</p>
                    <p class="comment-content">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium, harum rerum dolor suscipit id labore asperiores quod non repellendus ipsam eum eveniet, velit reiciendis architecto sunt placeat eaque culpa ratione. Dolorem corrupti repellat optio, labore natus dignissimos sequi sed, eligendi cumque neque, illo numquam ab quos velit sapiente non! Fugit, fuga. Tenetur ea perspiciatis voluptatem ipsum ut cum inventore, minus rerum expedita, quo fuga ipsa. Enim molestias temporibus cum deserunt, qui dolores consequuntur maxime molestiae, in aliquid, distinctio cumque! Amet nesciunt temporibus atque illo officiis sint? Excepturi ex quibusdam pariatur, ullam et expedita fugit, tempore voluptas sit quae, nihil quod?</p>
                    <p class="comment-read-more" id="crm0" onclick="showAllComment(this)">Voir plus</p>         
                </div>
                <div class="like-comment-container">
                    <form action="./?page=event&event=<?= $display["eventId"]; ?>" method="post" class="like-form">
                        <input type="hidden" value="like">
                        <p>1</p>
                        <button type="submit"><img src="<?= PATH_IMAGES . "useful/likeblack.png" ?>" alt="like" class="like-btn-img"></button>
                    </form>
                    <form action="./?page=event&event=" method="post" class="like-form">
                        <input type="hidden" value="dislike">
                        <p>0</p>
                        <button type="submit"><img src="<?= PATH_IMAGES . "useful/likered.png" ?>" alt="dislike" class="like-btn-img"></button>
                    </form>
                </div>
            </div>
            <div class="see-more-answers-and-reply-container">
                <div class="comment-answers" onclick="showReplies(this);">
                    <div>
                        <p>Voir</p>
                        <p>les</p>
                        <p>3</p>
                        <p>réponse</p>
                    </div>
                    <p class="invert-text">></p>
                </div>
                <?php if (isset($_SESSION["user"])) { ?>
                    <div class="to-reply" onclick="showTextArea(this)">
                        <p>Répondre</p>
                        <p>></p>
                    </div>
                <?php } ?>
            </div>
            <div class="comment-answers-visible" style="display:none">
                <div class="reply">
                    <a href="?page=profile&user=" class="reply-author comment-author">
                        <img src="https://i.pravatar.cc/150?img=1" alt="avatar">
                        <p>XXBGDU93XX</p>
                    </a>
                    <div class="reply-content-date comment-content-date">
                        <p class="reply-date">Le 01/01/2021 à 00:00</p>
                        <p class="reply-content">C'est ton gars coco jojo</p>
                        <p class="reply-read-more" id="rrm0" onclick="showAllReply(this, 0)">Voir plus</p>         
                    </div>
                    <div class="like-reply-container">
                        <form action="./?page=event&event=<?= $display["eventId"]; ?>" method="post" class="reply-like-form like-form">
                            <input type="hidden" value="like">
                            <p>1</p>
                            <button type="submit"><img src="<?= PATH_IMAGES . "useful/likeblack.png" ?>" alt="like" class="reply-like-btn-img"></button>
                        </form>
                        <form action="./?page=event&event=" method="post" class="reply-like-form like-form">
                            <input type="hidden" value="dislike">
                            <p>0</p>
                            <button type="submit"><img src="<?= PATH_IMAGES . "useful/likered.png" ?>" alt="dislike" class="reply-like-btn-img"></button>
                        </form>
                    </div>
                </div>
                <div class="reply">
                    <a href="?page=profile&user=" class="reply-author comment-author">
                        <img src="https://i.pravatar.cc/150?img=1" alt="avatar">
                        <p>XXBGDU93XX</p>
                    </a>
                    <div class="reply-content-date comment-content-date">
                        <p class="reply-date">Le 01/01/2021 à 00:00</p>
                        <p class="reply-content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatibus voluptatem odit nam officia quasi officiis optio totam ad dolor eligendi fugit fuga error, sunt id magni! Id minima quia consectetur enim, maiores voluptatem beatae numquam maxime rerum libero eligendi, dolorum debitis tenetur atque, recusandae neque! Explicabo est praesentium dolore eligendi ex aliquid nam ipsam tempore sit voluptatum officia nemo ratione ad animi, quidem recusandae eum maxime distinctio expedita delectus fuga. Numquam deleniti quam nesciunt laboriosam corrupti unde dolorem sequi ipsam maxime hic delectus error, placeat tenetur, eum consectetur vero cupiditate ab, ducimus asperiores! Perferendis quibusdam iusto totam facere, sequi eos nostrum iste dignissimos, voluptatem tempore fugiat! Nisi quia, aspernatur laudantium illum voluptate exercitationem ab. Tempora, ipsum sequi molestiae ducimus voluptatum libero vero, placeat cumque reprehenderit cum architecto fugiat deleniti aut dicta expedita quis sapiente enim nihil quo natus similique dolor accusantium. Rem perspiciatis quod voluptatem laboriosam vel, mollitia pariatur quis aperiam incidunt id culpa dolores accusantium delectus. Illo harum qui accusamus tempora cum recusandae rerum voluptates consequatur dolorem illum, facilis, officia, magnam sit necessitatibus nesciunt dignissimos! Laborum corrupti repellat nihil numquam quasi assumenda, consequuntur molestiae animi quam, veniam voluptates asperiores blanditiis pariatur? A nulla pariatur officia dolores rem, iure ab deleniti distinctio ex. Quo impedit corrupti reprehenderit, in non, est nihil esse repellat nemo atque dolor error explicabo! Dolorem blanditiis ab tenetur incidunt, consectetur aliquam eos aperiam impedit fugiat error modi? Distinctio at rem dolore doloremque nam laudantium laboriosam harum eligendi, molestias expedita porro iusto ipsa rerum libero asperiores non incidunt. Inventore eveniet recusandae expedita asperiores? Laudantium at reiciendis obcaecati, soluta voluptatum eveniet veniam labore ut quis molestias suscipit similique fuga! Architecto nemo debitis repudiandae pariatur omnis eius cupiditate magni minima nisi excepturi facere distinctio, aliquam incidunt consequuntur sint nobis iusto dolor adipisci sapiente quia, eveniet deserunt perspiciatis repellat commodi!</p>
                        <p class="reply-read-more" id="rrm1" onclick="showAllReply(this, 0)">Voir plus</p>         
                    </div>
                    <div class="like-reply-container">
                        <form action="./?page=event&event=<?= $display["eventId"]; ?>" method="post" class="reply-like-form like-form">
                            <input type="hidden" value="like">
                            <p>1</p>
                            <button type="submit"><img src="<?= PATH_IMAGES . "useful/likeblack.png" ?>" alt="like" class="reply-like-btn-img"></button>
                        </form>
                        <form action="./?page=event&event=" method="post" class="reply-like-form like-form">
                            <input type="hidden" value="dislike">
                            <p>0</p>
                            <button type="submit"><img src="<?= PATH_IMAGES . "useful/likered.png" ?>" alt="dislike" class="reply-like-btn-img"></button>
                        </form>
                    </div>
                </div>
                <div class="reply">
                    <a href="?page=profile&user=" class="reply-author comment-author">
                        <img src="https://i.pravatar.cc/150?img=1" alt="avatar">
                        <p>XXBGDU93XX</p>
                    </a>
                    <div class="reply-content-date comment-content-date">
                        <p class="reply-date">Le 01/01/2021 à 00:00</p>
                        <p class="reply-content">C'est ton gars coco jojo</p>
                        <p class="reply-read-more" id="rrm2" onclick="showAllReply(this, 0)">Voir plus</p>         
                    </div>
                    <div class="like-reply-container">
                        <form action="./?page=event&event=<?= $display["eventId"]; ?>" method="post" class="reply-like-form like-form">
                            <input type="hidden" value="like">
                            <p>1</p>
                            <button type="submit"><img src="<?= PATH_IMAGES . "useful/likeblack.png" ?>" alt="like" class="reply-like-btn-img"></button>
                        </form>
                        <form action="./?page=event&event=" method="post" class="reply-like-form like-form">
                            <input type="hidden" value="dislike">
                            <p>0</p>
                            <button type="submit"><img src="<?= PATH_IMAGES . "useful/likered.png" ?>" alt="dislike" class="reply-like-btn-img"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="comment">
            <div class="colored-comment-part">
                <a href="?page=profile&user=" class="comment-author">
                    <img src="https://i.pravatar.cc/150?img=1" alt="avatar">
                    <p>XXBGDU93XX</p>
                </a>
                <div class="comment-content-date">
                    <p class="comment-date">Le 01/01/2021 à 00:00</p>
                    <p class="comment-content">Ceci est un commentaire hahahhhaha</p>
                    <p class="comment-read-more" id="crm1" onclick="showAllComment(this)">Voir plus</p>         
                </div>
                <div class="like-comment-container">
                    <form action="./?page=event&event=<?= $display["eventId"]; ?>" method="post" class="like-form">
                        <input type="hidden" value="like">
                        <p>1</p>
                        <button type="submit"><img src="<?= PATH_IMAGES . "useful/likeblack.png" ?>" alt="like" class="like-btn-img"></button>
                    </form>
                    <form action="./?page=event&event=" method="post" class="like-form">
                        <input type="hidden" value="dislike">
                        <p>0</p>
                        <button type="submit"><img src="<?= PATH_IMAGES . "useful/likered.png" ?>" alt="dislike" class="like-btn-img"></button>
                    </form>
                </div>
            </div>
            <div class="see-more-answers-and-reply-container">
                <div class="comment-answers" onclick="showReplies(this);">
                    <div>
                        <p>Voir</p>
                        <p>les</p>
                        <p>3</p>
                        <p>réponse</p>
                    </div>
                    <p class="invert-text">></p>
                </div>
                <?php if (isset($_SESSION["user"])) { ?>
                    <div class="to-reply" onclick="showTextArea(this)">
                        <p>Répondre</p>
                        <p>></p>
                    </div>
                <?php } ?>
            </div>
            <div class="comment-answers-visible" style="display:none">
                <div class="reply">
                    <a href="?page=profile&user=" class="reply-author comment-author">
                        <img src="https://i.pravatar.cc/150?img=1" alt="avatar">
                        <p>XXBGDU93XX</p>
                    </a>
                    <div class="reply-content-date comment-content-date">
                        <p class="reply-date">Le 01/01/2021 à 00:00</p>
                        <p class="reply-content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat natus voluptates fugit beatae ad vero, delectus sunt accusamus eveniet, ea obcaecati, sequi aspernatur voluptatum officia quam necessitatibus a porro facilis veniam eaque? Excepturi incidunt, aut culpa tempore dolore ex molestiae veniam aliquid eligendi eius veritatis magni illum nihil assumenda ipsam dolorem nisi eos saepe officiis et. Id, asperiores mollitia? Dolores saepe blanditiis dolor! Aspernatur sapiente inventore iste a alias eveniet, atque illo ab suscipit accusamus ipsa expedita et impedit ea tempora recusandae, soluta voluptas amet harum numquam in magni animi. Tempore quae similique enim. Dolores corporis ea porro facilis, sed incidunt eius minus minima dolor est architecto quod voluptates accusantium itaque quisquam sit temporibus deleniti? Blanditiis autem molestiae exercitationem eligendi dignissimos soluta amet quia esse sequi fuga enim fugiat, alias quisquam nesciunt odit laborum, tempora maxime minus aliquam est? Provident animi nemo tempora alias aliquam, omnis quos eligendi quidem unde deserunt obcaecati earum nobis quibusdam architecto sit doloremque distinctio eum? Dolores eligendi nam odit, error, vero dicta, rem harum dolorum iure blanditiis iusto cupiditate molestias laudantium fugiat ipsum! Laboriosam, velit sint perferendis itaque est laborum autem provident ea eius quia tempore facere sed vero nihil dolorum repudiandae quis nobis sequi? Qui voluptates consequatur quod laboriosam, sint quaerat quis quam repellendus mollitia aut eveniet deleniti fugiat accusamus est accusantium molestias adipisci ea molestiae. Quo maxime assumenda amet doloribus velit, aperiam odit pariatur ad quibusdam, eaque nesciunt quidem maiores, animi temporibus ipsum accusantium impedit repellat? Eveniet pariatur minima ut ex libero sapiente expedita nobis rem iste! Dolores cupiditate natus quaerat laboriosam nostrum consequatur? Voluptatum minima reiciendis eos perferendis et. Eaque libero dolorem error dignissimos similique quam dolores quasi? Tempore nihil eligendi voluptatibus impedit omnis inventore voluptas iusto, blanditiis facilis aliquam nisi ipsum beatae placeat neque amet. Porro accusantium nisi quidem consectetur id?</p>
                        <p class="reply-read-more" id="rrm0" onclick="showAllReply(this, 1)">Voir plus</p>         
                    </div>
                    <div class="like-reply-container">
                        <form action="./?page=event&event=<?= $display["eventId"]; ?>" method="post" class="reply-like-form like-form">
                            <input type="hidden" value="like">
                            <p>1</p>
                            <button type="submit"><img src="<?= PATH_IMAGES . "useful/likeblack.png" ?>" alt="like" class="reply-like-btn-img"></button>
                        </form>
                        <form action="./?page=event&event=" method="post" class="reply-like-form like-form">
                            <input type="hidden" value="dislike">
                            <p>0</p>
                            <button type="submit"><img src="<?= PATH_IMAGES . "useful/likered.png" ?>" alt="dislike" class="reply-like-btn-img"></button>
                        </form>
                    </div>
                </div>
                <div class="reply">
                    <a href="?page=profile&user=" class="reply-author comment-author">
                        <img src="https://i.pravatar.cc/150?img=1" alt="avatar">
                        <p>XXBGDU93XX</p>
                    </a>
                    <div class="reply-content-date comment-content-date">
                        <p class="reply-date">Le 01/01/2021 à 00:00</p>
                        <p class="reply-content">C'est ton gars coco jojo</p>
                        <p class="reply-read-more" id="rrm1" onclick="showAllReply(this, 1)">Voir plus</p>         
                    </div>
                    <div class="like-reply-container">
                        <form action="./?page=event&event=<?= $display["eventId"]; ?>" method="post" class="reply-like-form like-form">
                            <input type="hidden" value="like">
                            <p>1</p>
                            <button type="submit"><img src="<?= PATH_IMAGES . "useful/likeblack.png" ?>" alt="like" class="reply-like-btn-img"></button>
                        </form>
                        <form action="./?page=event&event=" method="post" class="reply-like-form like-form">
                            <input type="hidden" value="dislike">
                            <p>0</p>
                            <button type="submit"><img src="<?= PATH_IMAGES . "useful/likered.png" ?>" alt="dislike" class="reply-like-btn-img"></button>
                        </form>
                    </div>
                </div>
                <div class="reply">
                    <a href="?page=profile&user=" class="reply-author comment-author">
                        <img src="https://i.pravatar.cc/150?img=1" alt="avatar">
                        <p>XXBGDU93XX</p>
                    </a>
                    <div class="reply-content-date comment-content-date">
                        <p class="reply-date">Le 01/01/2021 à 00:00</p>
                        <p class="reply-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus architecto corporis beatae ipsum, porro veritatis laudantium libero nobis quis corrupti amet ad nesciunt ullam, hic veniam ex labore, reiciendis accusantium vel saepe optio. Iure eos quas beatae porro quidem rem repellendus fugiat sapiente libero repudiandae blanditiis, omnis placeat deleniti similique exercitationem fugit quos vel ducimus assumenda facere. Commodi, natus? Vel alias animi eveniet corporis non, maiores sunt. Fugiat magni, expedita aut voluptatibus quam dolorum sequi laborum velit molestias accusamus necessitatibus debitis fuga reiciendis odit totam? Porro sed consequuntur autem accusantium quod vitae aspernatur, natus dolores ratione alias neque. Dolorum accusamus rem voluptatibus assumenda sapiente labore at quibusdam doloremque id inventore perspiciatis tenetur, obcaecati ipsum quidem esse reiciendis porro, officiis recusandae totam illum ad natus vero deserunt. Itaque porro consequatur aperiam qui iste eius aspernatur laudantium sequi architecto perspiciatis magni, beatae, quo a aliquid, labore exercitationem ratione! Dolorum, sequi cumque! Alias repudiandae consequuntur est iusto eius porro, libero officiis quasi doloribus eaque facilis! Laudantium architecto, corrupti, quasi iure soluta aperiam vero quaerat consequatur minima ad incidunt. Natus sed atque mollitia animi voluptates dolor dolores debitis non numquam eos laborum perferendis sit qui tempore, amet quis voluptatem unde at id veritatis delectus aspernatur similique. Provident ratione, alias earum quae quod, ducimus eveniet est assumenda voluptate, libero iusto quasi. Quidem maxime veritatis quod explicabo aspernatur deserunt necessitatibus vitae.</p>
                        <p class="reply-read-more" id="rrm2" onclick="showAllReply(this, 1)">Voir plus</p>         
                    </div>
                    <div class="like-reply-container">
                        <form action="./?page=event&event=<?= $display["eventId"]; ?>" method="post" class="reply-like-form like-form">
                            <input type="hidden" value="like">
                            <p>1</p>
                            <button type="submit"><img src="<?= PATH_IMAGES . "useful/likeblack.png" ?>" alt="like" class="reply-like-btn-img"></button>
                        </form>
                        <form action="./?page=event&event=" method="post" class="reply-like-form like-form">
                            <input type="hidden" value="dislike">
                            <p>0</p>
                            <button type="submit"><img src="<?= PATH_IMAGES . "useful/likered.png" ?>" alt="dislike" class="reply-like-btn-img"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="comment">
            <div class="colored-comment-part">
                <a href="?page=profile&user=" class="comment-author">
                    <img src="https://i.pravatar.cc/150?img=1" alt="avatar">
                    <p>XXBGDU93XX</p>
                </a>
                <div class="comment-content-date">
                    <p class="comment-date">Le 01/01/2021 à 00:00</p>
                    <p class="comment-content">Jesuisnaps okay okay Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima delectus laborum illum rerum beatae error sapiente eveniet, doloribus qui iste dolorum odio, facere quos veritatis in similique quas quibusdam unde maiores quod voluptatibus repudiandae. Laborum facere repudiandae consequuntur sapiente perferendis error, obcaecati voluptas maxime cum? Sequi voluptatum deserunt quam mollitia, soluta odit exercitationem quos, obcaecati minus esse id minima nesciunt quaerat temporibus veniam dignissimos ducimus suscipit architecto non. Cum accusantium unde vitae ab praesentium sequi nulla quae fugiat, inventore voluptate. Necessitatibus labore obcaecati aliquam quisquam. Ab odio tempora dolorum nostrum aliquam distinctio cumque illo dolor aliquid libero. Accusantium, quas. Itaque exercitationem, officiis adipisci sunt neque ab id autem dolorem mollitia enim explicabo quaerat illo quasi at corporis eum pariatur? Ipsum corrupti sit voluptate iure aut eveniet quasi eos fuga ad saepe dignissimos illum accusantium officia, pariatur ducimus natus hic non inventore. Dolorem sequi autem nemo fugit blanditiis, hic sint officiis excepturi atque ex quas repudiandae exercitationem ab nihil et, consectetur explicabo voluptatum fuga sed! Suscipit ea labore maiores eaque inventore, ipsam alias eius totam aliquam ad similique facere soluta ab perferendis debitis voluptatum vero iusto aut expedita ratione, dolor deleniti maxime. Ipsam blanditiis quisquam cumque, dicta, consequatur ab voluptate nemo a, eum enim nihil aliquid iusto mollitia. Quam dicta non repellat nobis molestias quidem alias! Vitae blanditiis consequuntur nobis illum dicta ducimus laudantium delectus, quisquam quasi. Quod odio provident velit explicabo at atque facilis iure, repellendus voluptates esse rerum laudantium perferendis molestiae sunt aspernatur cumque excepturi eveniet commodi cum dicta quis dolorum? Laboriosam tempora error incidunt. Explicabo, nostrum corrupti debitis eligendi provident adipisci ipsa quo error aut. Fugit ex sunt dolores incidunt a, ad, corrupti voluptatum deleniti aspernatur consequatur necessitatibus iste cumque optio ipsum? Perspiciatis nulla vitae dolorum quas quasi nemo, dolorem rerum reiciendis dicta mollitia ducimus quod qui facere fugit ratione? Vel nisi dolor ipsa consequuntur magni, corporis sunt molestias deserunt ab fugiat soluta quasi accusamus aliquam rem! Totam minus, rem molestiae sit iusto dicta quasi dolore nesciunt, ipsam iste accusamus ducimus maiores! Sit a animi deserunt quisquam aliquam rerum sint facilis quo dolor voluptatum nihil, ex, et accusamus ullam magnam! At consequatur perspiciatis esse voluptatem minima fugiat facere quas, deleniti reiciendis similique ipsam iure blanditiis, animi, quae nulla eligendi ab molestias cupiditate porro quod odit! Ex odit aspernatur cupiditate nisi eveniet sint exercitationem repellat, similique ab nemo voluptates nam porro natus vitae? Asperiores odio maxime vitae earum rerum?</p>
                    <p class="comment-read-more" id="crm2" onclick="showAllComment(this)">Voir plus</p>         
                </div>
                <div class="like-comment-container">
                    <form action="./?page=event&event=<?= $display["eventId"]; ?>" method="post" class="like-form">
                        <input type="hidden" value="like">
                        <p>1</p>
                        <button type="submit"><img src="<?= PATH_IMAGES . "useful/likeblack.png" ?>" alt="like" class="like-btn-img"></button>
                    </form>
                    <form action="./?page=event&event=" method="post" class="like-form">
                        <input type="hidden" value="dislike">
                        <p>0</p>
                        <button type="submit"><img src="<?= PATH_IMAGES . "useful/likered.png" ?>" alt="dislike" class="like-btn-img"></button>
                    </form>
                </div>
            </div>
            <div class="see-more-answers-and-reply-container">
                <div class="comment-answers" onclick="showReplies(this);">
                    <div>
                        <p>Voir</p>
                        <p>les</p>
                        <p>3</p>
                        <p>réponse</p>
                    </div>
                    <p class="invert-text">></p>
                </div>
                <?php if (isset($_SESSION["user"])) { ?>
                    <div class="to-reply" onclick="showTextArea(this)">
                        <p>Répondre</p>
                        <p>></p>
                    </div>
                <?php } ?>
            </div>
            <div class="comment-answers-visible" style="display:none">
                <div class="reply">
                    <a href="?page=profile&user=" class="reply-author comment-author">
                        <img src="https://i.pravatar.cc/150?img=1" alt="avatar">
                        <p>XXBGDU93XX</p>
                    </a>
                    <div class="reply-content-date comment-content-date">
                        <p class="reply-date">Le 01/01/2021 à 00:00</p>
                        <p class="reply-content">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas, fuga, incidunt tenetur assumenda cum voluptate rem ea quidem dolores dolor consequuntur? Animi maiores, nisi sequi dolorum non ad tenetur iure nam omnis totam, soluta tempora culpa quis accusamus laborum earum! Iure impedit porro dolore perferendis asperiores quidem consequatur id excepturi, ea, odio ex. Possimus eos ab veniam eius esse soluta. Deserunt, consequuntur cum quo delectus esse consectetur reprehenderit minima suscipit impedit, dicta explicabo animi distinctio eligendi voluptates nihil unde repellendus quas, dolor praesentium? Quasi similique earum quia natus, sunt doloribus deserunt fugit pariatur cumque corporis enim impedit rem quidem deleniti in repellendus doloremque! Odit unde, suscipit fugiat sapiente nisi blanditiis porro quisquam quis pariatur, aliquid molestiae nostrum, libero consequatur? Reprehenderit praesentium natus cumque sapiente esse ducimus quidem aperiam itaque quas autem delectus voluptates ipsa a assumenda, in commodi laborum nemo odio magnam explicabo ullam! Mollitia molestiae hic fugiat magni ipsum commodi unde. Ducimus perspiciatis rerum ipsam expedita totam incidunt praesentium asperiores placeat consequatur aliquam facere id quo, est dolorum voluptatum culpa consequuntur, distinctio qui maiores delectus laborum! Corporis impedit expedita odio enim, quasi nulla repudiandae animi est aspernatur accusamus voluptate, tenetur in nisi. Velit quibusdam voluptatibus inventore dignissimos quam voluptatum, corrupti deleniti! Veritatis minima, animi nesciunt officiis voluptatem itaque possimus maiores ex assumenda odit, dolore libero. Recusandae, sunt, deleniti corrupti aperiam voluptate cum accusamus iusto repellendus quo obcaecati, totam nihil?</p>
                        <p class="reply-read-more" id="rrm0" onclick="showAllReply(this, 2)">Voir plus</p>         
                    </div>
                    <div class="like-reply-container">
                        <form action="./?page=event&event=<?= $display["eventId"]; ?>" method="post" class="reply-like-form like-form">
                            <input type="hidden" value="like">
                            <p>1</p>
                            <button type="submit"><img src="<?= PATH_IMAGES . "useful/likeblack.png" ?>" alt="like" class="reply-like-btn-img"></button>
                        </form>
                        <form action="./?page=event&event=" method="post" class="reply-like-form like-form">
                            <input type="hidden" value="dislike">
                            <p>0</p>
                            <button type="submit"><img src="<?= PATH_IMAGES . "useful/likered.png" ?>" alt="dislike" class="reply-like-btn-img"></button>
                        </form>
                    </div>
                </div>
                <div class="reply">
                    <a href="?page=profile&user=" class="reply-author comment-author">
                        <img src="https://i.pravatar.cc/150?img=1" alt="avatar">
                        <p>XXBGDU93XX</p>
                    </a>
                    <div class="reply-content-date comment-content-date">
                        <p class="reply-date">Le 01/01/2021 à 00:00</p>
                        <p class="reply-content">Petit Fumier que tu es</p>
                        <p class="reply-read-more" id="rrm1" onclick="showAllReply(this, 2)">Voir plus</p>         
                    </div>
                    <div class="like-reply-container">
                        <form action="./?page=event&event=<?= $display["eventId"]; ?>" method="post" class="reply-like-form like-form">
                            <input type="hidden" value="like">
                            <p>1</p>
                            <button type="submit"><img src="<?= PATH_IMAGES . "useful/likeblack.png" ?>" alt="like" class="reply-like-btn-img"></button>
                        </form>
                        <form action="./?page=event&event=" method="post" class="reply-like-form like-form">
                            <input type="hidden" value="dislike">
                            <p>0</p>
                            <button type="submit"><img src="<?= PATH_IMAGES . "useful/likered.png" ?>" alt="dislike" class="reply-like-btn-img"></button>
                        </form>
                    </div>
                </div>
                <div class="reply">
                    <a href="?page=profile&user=" class="reply-author comment-author">
                        <img src="https://i.pravatar.cc/150?img=1" alt="avatar">
                        <p>XXBGDU93XX</p>
                    </a>
                    <div class="reply-content-date comment-content-date">
                        <p class="reply-date">Le 01/01/2021 à 00:00</p>
                        <p class="reply-content">C'est ton gars coco jojo</p>
                        <p class="reply-read-more" id="rrm2" onclick="showAllReply(this, 2)">Voir plus</p>         
                    </div>
                    <div class="like-reply-container">
                        <form action="./?page=event&event=<?= $display["eventId"]; ?>" method="post" class="reply-like-form like-form">
                            <input type="hidden" value="like">
                            <p>1</p>
                            <button type="submit"><img src="<?= PATH_IMAGES . "useful/likeblack.png" ?>" alt="like" class="reply-like-btn-img"></button>
                        </form>
                        <form action="./?page=event&event=" method="post" class="reply-like-form like-form">
                            <input type="hidden" value="dislike">
                            <p>0</p>
                            <button type="submit"><img src="<?= PATH_IMAGES . "useful/likered.png" ?>" alt="dislike" class="reply-like-btn-img"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
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
<?php } ?>
<?php require_once PATH_VIEWS . 'footer.php'; ?>