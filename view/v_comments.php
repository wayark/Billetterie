<?php require_once PATH_VIEWS . "header.php"; ?>
<head>
    <title>Commentaires - @NapsDeMarseille</title>
    <link rel="stylesheet" href="<?= PATH_CSS ;?>userComments.css">
    <link rel="stylesheet" href="<?= PATH_CSS ;?>userCommentsEventsCommon.css">
    <link rel="stylesheet" href="<?= PATH_CSS ;?>menuProfileAndAccountManagement.css">
    <link rel="stylesheet" href="<?= PATH_MEDIA ;?>UserComments.css">
    <link rel="stylesheet" href="<?= PATH_MEDIA ;?>MenuProfileAndAccountManagement.css">
    <script src="<?= PATH_SCRIPTS ;?>menuProfileAccountManagement.js" defer></script>
    <script src="<?= PATH_SCRIPTS ;?>comments.js" defer></script>
</head>
<section id="main-container">
    <div class="colored-part-comments">
        <div class="menu">
            <ul>
                <li>
                    <a class="menu-text" href="?page=profile&user=" onmouseover="extendBar(this)" onmouseout="shrinkBar(this)">Profil</a>
                    <div class="menu-bar"></div>
                </li>
                <li>
                    <a class="menu-text" href="?page=profile&part=events&user=" onmouseover="extendBar(this)" onmouseout="shrinkBar(this)">Evenements</a>
                    <div class="menu-bar"></div>
                </li>
                <li class="actual-page">
                    <a class="menu-text" href="?page=profile&part=comments&user=" onmouseover="colorBar(this)" onmouseout="uncolorBar(this)">Commentaires</a>
                    <div class="menu-bar"></div>
                </li>
            </ul>
        </div>
        <section class="flex-section">
            <div class="username-container">
                <p>@</p>
                <p class="username-text">NapsDeMarseille</p>
            </div>
            <div class="comments-container">
                <form action="?page=profile&part=comments&user=" method="post" class="sort-form-container">
                    <img src="<?= PATH_IMAGES ;?>useful/beigesorticon.png" alt="" class="" draggable="false">
                    <p class="sort-form-name">Trier par :</p>
                    <select name="type-sort" onchange="this.form.submit()">
                        <option value="date-desc">Les plus récents</option>
                        <option value="date-asc">Les plus anciens</option>
                        <option value="date-asc">Les plus aimés</option>
                        <option value="event">Évènement</option>
                    </select>
                </form>
                <div class="comments-title-section-container">
                    <h1 class="comments-title-preset">-</p>
                    <h1 class="comments-title">Commentaires (2) :</h1>
                </div>
                <div class="all-comments-container">
                    <div class="comment">
                        <a href="?page=event&event=2" class="commented-event">
                            <img src="<?= PATH_IMAGES ?>events/wayark.jpg" alt="image-event">
                        </a>
                        <div class="comment-content">
                            <p class="event-title">Evenement : Le grand retour de Wayark</p>
                            <div class="comment-text-container">
                                <p class="quotation-mark">"</p>
                                <p class="comment-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat voluptate quibusdam nobis nostrum dicta illum rerum autem recusandae doloribus doloremque accusantium temporibus velit dolor id soluta alias sapiente</p>
                                <p class="quotation-mark">"</p>
                            </div>
                            <p class="comment-date">Le 12/12/2020 à 12:12</p>
                            <div class="comment-like-container">
                                <form action="./?page=profile&part=comments&user=" class="like" name="like" method="post">
                                    <input type="hidden" value="">
                                    <p class="like-number">0</p>
                                    <button type="submit">
                                        <img src="<?= PATH_IMAGES ;?>useful/likeblack.png" alt="like" class="like-icon">
                                    </button>
                                </form>
                                <form action="./?page=profile&part=comments&user=" class="dislike" name="dislike" method="post">
                                    <input type="hidden" value="">
                                    <p class="dislike-number">3</p>
                                    <button type="submit">
                                        <img src="<?= PATH_IMAGES ;?>useful/likered.png" alt="dislike" class="dislike-icon">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <a href="?page=event&event=2" class="commented-event">
                            <img src="<?= PATH_IMAGES ?>events/wayark.jpg" alt="image-event">
                        </a>
                        <div class="comment-content">
                            <p class="event-title">Evenement : Le grand retour de Wayark</p>
                            <div class="comment-text-container">
                                <p class="quotation-mark">"</p>
                                <p class="comment-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat voluptate quibusdam nobis nostrum dicta illum rerum autem recusandae doloribus doloremque accusantium temporibus velit dolor id soluta alias sapiente</p>
                                <p class="quotation-mark">"</p>
                            </div>
                            <p class="comment-date">Le 12/12/2020 à 12:12</p>
                            <div class="comment-like-container">
                                <form action="./?page=profile&part=comments&user=" class="like" name="like">
                                    <input type="hidden" value="">
                                    <p class="like-number">0</p>
                                    <button type="submit">
                                        <img src="<?= PATH_IMAGES ;?>useful/likeblack.png" alt="like" class="like-icon">
                                    </button>
                                </form>
                                <form action="./page=profile&part=comment&user=" class="dislike" name="dislike">
                                    <input type="hidden" value="">
                                    <p class="dislike-number">3</p>
                                    <button type="submit">
                                        <img src="<?= PATH_IMAGES ;?>useful/likered.png" alt="dislike" class="dislike-icon">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <a href="?page=event&event=2" class="commented-event">
                            <img src="<?= PATH_IMAGES ?>events/wayark.jpg" alt="image-event">
                        </a>
                        <div class="comment-content">
                            <p class="event-title">Evenement : Le grand retour de Wayark</p>
                            <div class="comment-text-container">
                                <p class="quotation-mark">"</p>
                                <p class="comment-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat voluptate quibusdam nobis nostrum dicta illum rerum autem recusandae doloribus doloremque accusantium temporibus velit dolor id soluta alias sapiente</p>
                                <p class="quotation-mark">"</p>
                            </div>
                            <p class="comment-date">Le 12/12/2020 à 12:12</p>
                            <div class="comment-like-container">
                                <form action="./?page=profile&part=comments&user=" class="like" name="like">
                                    <input type="hidden" value="">
                                    <p class="like-number">0</p>
                                    <button type="submit">
                                        <img src="<?= PATH_IMAGES ;?>useful/likeblack.png" alt="like" class="like-icon">
                                    </button>
                                </form>
                                <form action="./page=profile&part=comment&user=" class="dislike" name="dislike">
                                    <input type="hidden" value="">
                                    <p class="dislike-number">3</p>
                                    <button type="submit">
                                        <img src="<?= PATH_IMAGES ;?>useful/likered.png" alt="dislike" class="dislike-icon">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
            </div>
        </section>
    </div>
</section>
<?php require_once PATH_VIEWS . "footer.php"; ?>