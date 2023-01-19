<?php require_once PATH_VIEWS . "header.php"; ?>
<head>
    <link href="<?= PATH_CSS ?>notifications.css" rel="stylesheet">
    <link href="<?= PATH_MEDIA ?>Notifications.css" rel="stylesheet">
    <script src="<?= PATH_SCRIPTS ?>notifications.js" defer></script>
    <title>Notifications (3)</title>
</head>
<section class="main-container">
    <div class="colored-part-notifications">
        <div class="title-page-container">
            <h1 class="title-page">Mes notifications</h1>
            <div class="nb-notifications">
                <h1>(</h1>
                <h1>3</h1>
                <h1>) :</h1>
            </div>
        </div>
        <div class="notifications-container">
            <div class="bar"></div>
            <div class="friend-request">
                <a class="user-sender" href="./?page=profile&user=">
                    <img src="<?= PATH_IMAGES ?>/users/naps.jpg" alt="user">
                </a>
                <div class="message">
                    <h1>Vous avez reçu une demande d'ami de la part</h1>
                    <div class="request-first-line">
                        <h1>de</h1>
                        <a class="user-sender-text" href="./?page=profile&user=">
                            <h1>@</h1>
                            <h1>NapsDeMarseille</h1>
                        </a>
                        <h1>.</h1>
                    </div>
                </div>
                <div class="user-answer">
                    <form action="./?page=notifications" class="accept-form" method="post">
                        <input type="hidden" name="accept" value="">
                        <button type="submit"></button>
                    </form>
                    <form action="./?page=notifications" class="decline-form" method="post">
                        <input type="hidden" name="decline" value="">
                        <button type="submit"></button>
                    </form>
                </div>
            </div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="friend-request-accepted">
                <a class="user-sender" href="./?page=profile&user=">
                    <img src="<?= PATH_IMAGES ?>/users/naps.jpg" alt="user">
                </a>
                <div class="message">
                    <div class="request-first-line">
                        <a class="user-answer-text" href="./?page=profile&user=">
                            <h1>@</h1>
                            <h1>NapsDeMarseille</h1>
                        </a>
                        <h1>a accepté</h1>
                    </div>
                    <h1>votre demande d'ami.</h1>
                </div>
                <img src="<?= PATH_IMAGES ?>logos/green-accept.png" alt="accepted" draggable="false">
            </div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="friend-request-declined">
                <a class="user-sender" href="./?page=profile&user=">
                    <img src="<?= PATH_IMAGES ?>/users/naps.jpg" alt="user">
                </a>
                <div class="message">
                    <div class="request-first-line">
                        <a class="user-answer-text" href="./?page=profile&user=">
                            <h1>@</h1>
                            <h1>NapsDeMarseille</h1>
                        </a>
                        <h1>a refusé</h1>
                    </div>
                    <h1>votre demande d'ami.</h1>
                </div>
                <img src="<?= PATH_IMAGES ?>logos/red-decline.png" alt="accepted" draggable="false">
            </div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="approaching-event">
                <a href="./?page=event&event=2" class="event-redirection">
                    <img src="<?= PATH_IMAGES ?>events/bdsmousse.jpg" alt="">
                </a>
                <div class="message">
                    <div class="approaching-event-first-line">
                        <h1>L'évènement</h1>
                        <div class="flex-quotes">
                            <h1>"</h1>
                            <a href="./?page=event&event=2" class="event-redirection-text">
                                <h1 class="event-name-approaching-event">La bete de soiree mousse en place assise cest ouf non tu trouves pas mon reuf ?</h1>
                            </a>
                            <h1>"</h1>
                        </div>
                    </div>
                    <h1> auquel vous participez arrive bientôt !</h1>
                    <p class="approaching-event-date">12/02/23</p>
                </div>
            </div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="sold-ticket">
                <a href="./?page=event&event=2" class="event-redirection">
                    <img src="<?= PATH_IMAGES ?>events/wayark.jpg" alt="">
                </a>
                <div class="message">
                    <h1>L'achat de votre ticket pour l'évènement</h1>
                    <div class="flex-quotes">
                        <h1>"</h1>
                        <a href="./?page=event&event=2" class="event-redirection-text">
                            <h1 class="event-name-sold-ticket">Le putain de grand retour de wayark eculé haha Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima quis fugit eum voluptatum odit soluta animi hic inventore, quia ipsa!</h1>
                        </a>
                        <h1>"</h1>
                    </div>
                    <div class="sold-ticket-last-line">
                        <h1>s'est déroulé avec succès.</h1>
                        <a href="./?page=" class="see-tickets">
                            <p>Voir mes billets</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="answer-comment">
                <a class="user-sender" href="./?page=profile&user=">
                    <img src="<?= PATH_IMAGES ?>/users/naps.jpg" alt="user">
                </a>
                <a href="./?page=event&event=2" class="event-redirection">
                    <img src="<?= PATH_IMAGES ?>events/wayark.jpg" alt="">
                </a>
                <div class="grid-content-text-likes-dislikes-answers">
                    <div class="row-flex-like-dislike-text">
                        <a class="user-answer-text" href="./?page=profile&user=">
                            <h1>@</h1>
                            <h1>NapsDeMarseille</h1>
                        </a>
                        <h1>a répondu à votre commentaire :</h1>
                    </div>
                    <div class="commented-text">
                        <p>"</p>
                        <h1 class="part-comment-more-longer">Je suis trop content de voir Wayark revenir Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita cupiditate dignissimos ipsum velit dicta, aspernatur iure aut nihil obcaecati fuga maxime, suscipit reiciendis commodi odit. Nam nobis quis rerum veniam asperiores esse ex distinctio sunt nesciunt quam vel necessitatibus eveniet, minus sint praesentium tenetur facere ipsam unde expedita! Nostrum consequuntur, reprehenderit at optio, iure vitae repudiandae autem natus soluta doloremque adipisci expedita quos exercitationem omnis dolorem rem officia odio in commodi. Ipsum dignissimos nobis est molestias ad accusantium consectetur sunt accusamus, debitis quibusdam numquam fuga, enim quis repudiandae saepe, voluptatem ullam inventore mollitia veritatis odit. Nam repellat eos in doloremque! Assumenda, animi modi? Placeat aliquid quibusdam dolore fugiat ut praesentium quae possimus eveniet. Illo commodi doloribus neque hic nisi minima voluptate optio atque voluptatem quos, error distinctio inventore omnis eius voluptatum molestias quasi tempore perspiciatis, ad dignissimos aspernatur repellat nobis nam! Quibusdam, deleniti adipisci. Odit rerum fuga eius deleniti eum alias enim officiis quidem impedit nisi corrupti, veniam, praesentium facilis tempore aliquid est? Animi, iste! Minima maiores, cum in, culpa est non consectetur dignissimos, autem aliquid rem corporis illum saepe! Obcaecati nulla temporibus a odio ipsa, maiores expedita iusto, placeat possimus saepe doloribus corporis minus. Quis facilis nobis repellat at voluptatem repellendus exercitationem ex! Et amet earum ea blanditiis numquam, ratione optio incidunt obcaecati aspernatur? Officiis dolores quo odit veniam? Quae est quaerat sequi, aspernatur aperiam neque expedita autem error odit inventore deserunt perspiciatis nemo necessitatibus modi alias repudiandae id? Molestias, assumenda tempora. Illum repudiandae error magnam sunt voluptates blanditiis consectetur debitis quam sequi eveniet numquam, mollitia culpa similique? Sequi atque similique possimus facere vero vitae suscipit delectus eos obcaecati voluptatem expedita, sit quia inventore nesciunt quas natus autem velit, sunt totam quasi adipisci a aperiam, repellendus veniam. Fuga numquam, tempore sint enim illo ut amet odit nulla veniam cupiditate?</h1>
                        <p>"</p>
                    </div>
                    <div class="commented-text">
                        <p class="commented-by"> par </p>
                        <p>"</p>
                        <h1 class="part-comment-bit-more-longer">Je suis trop content de voir Wayark revenir !</h1>
                        <p>"</p>
                        <p class="commented-by">.</p>
                    </div>
                </div>
            </div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="liked-comment-notification">
                <a class="user-sender" href="./?page=profile&user=">
                    <img src="<?= PATH_IMAGES ?>/users/naps.jpg" alt="user">
                </a>
                <a href="./?page=event&event=2" class="event-redirection">
                    <img src="<?= PATH_IMAGES ?>events/wayark.jpg" alt="">
                </a>
                <div class="grid-content-text-likes-dislikes-answers">
                    <div class="row-flex-like-dislike-text">
                        <a class="user-answer-text" href="./?page=profile&user=">
                            <h1>@</h1>
                            <h1>NapsDeMarseille</h1>
                        </a>
                        <h1>a aimé votre</h1>
                    </div>
                    <h1>commentaire : </h1> 
                    <div class="commented-text">
                        <p>"</p>
                        <h1 class="part-comment">Je suis trop content de voir Wayark revenir !</h1>
                        <p>"</p>
                        <h2>.</h2>
                    </div>
                </div>
                <img src="<?= PATH_IMAGES ?>useful/likeblack.png" alt="like-image" class="like-img" draggable="false">
            </div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="disliked-comment-notification">
                <a class="user-sender" href="./?page=profile&user=">
                    <img src="<?= PATH_IMAGES ?>/users/naps.jpg" alt="user">
                </a>
                <a href="./?page=event&event=2" class="event-redirection">
                    <img src="<?= PATH_IMAGES ?>events/wayark.jpg" alt="">
                </a>
                <div class="grid-content-text-likes-dislikes-answers">
                    <div class="row-flex-like-dislike-text">
                        <a class="user-answer-text" href="./?page=profile&user=">
                            <h1>@</h1>
                            <h1>NapsDeMarseille</h1>
                        </a>
                        <h1>n'a pas aimé votre</h1>
                    </div>
                    <h1>commentaire :</h1>
                    <div class="commented-text">
                        <p>"</p>
                        <h1 class="part-comment">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni facilis, asperiores saepe quibusdam recusandae, cupiditate quam ad commodi possimus mollitia praesentium aspernatur soluta voluptas dicta quis architecto! Sunt, dignissimos quas! Quasi, maiores. Vitae sunt deserunt, iusto cupiditate ratione harum quisquam nesciunt fugiat excepturi quam reprehenderit impedit perferendis laudantium corrupti laboriosam aperiam sequi minus. Sunt eaque saepe, natus dolorem aspernatur praesentium corrupti nostrum sapiente similique quibusdam atque aut aperiam iusto eveniet nobis omnis doloremque animi beatae hic voluptate! Tempore, accusamus ratione? Nostrum veritatis nihil adipisci facilis omnis. At repudiandae hic atque blanditiis ratione, commodi nam laborum natus quo, neque, cupiditate dolorum.</h1>
                        <p>"</p>
                        <h2>.</h2>
                    </div>
                </div>
                <img src="<?= PATH_IMAGES ?>useful/likered.png" alt="dislike-image" class="like-img" draggable="false">
            </div>
            <div class="bar"></div>
        </div>
    </div>
</section>
<?php require_once PATH_VIEWS . "footer.php"; ?>