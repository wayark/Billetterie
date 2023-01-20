<?php require_once PATH_VIEWS . "header.php"; ?>
<head>
    <title>@NapsDeMarseille</title>
    <link rel="stylesheet" href="<?= PATH_CSS ;?>profile.css">
    <link rel="stylesheet" href="<?= PATH_CSS ;?>menuProfileAndAccountManagement.css">
    <link rel="stylesheet" href="<?= PATH_MEDIA ;?>Profile.css">
    <link rel="stylesheet" href="<?= PATH_MEDIA ;?>MenuProfileAndAccountManagement.css">
    <script src="<?= PATH_SCRIPTS ;?>menuProfileAccountManagement.js" defer></script>
    <script src="<?= PATH_SCRIPTS ;?>profile.js" defer></script>
</head>
<section id="main-container">
    <div class="colored-part-profile">
        <div class="menu">
            <ul>
                <li class="actual-page">
                    <a class="menu-text" href="?page=profile&user=" onmouseover="colorBar(this)" onmouseout="uncolorBar(this)">Profil</a>
                    <div class="menu-bar"></div>
                </li>
                <li>
                    <a class="menu-text" href="?page=profile&part=events&user=" onmouseover="extendBar(this)" onmouseout="shrinkBar(this)">Evenements</a>
                    <div class="menu-bar"></div>
                </li>
                <li>
                    <a class="menu-text" href="?page=profile&part=comments&user=" onmouseover="extendBar(this)" onmouseout="shrinkBar(this)">Commentaires</a>
                    <div class="menu-bar"></div>
                </li>
            </ul>
        </div>
        <div class="grid-section">
            <div class="informations-container">
                <div class="img-user-container">
                    <img class="profile-picture" src="<?= PATH_IMAGES ;?>users/naps.jpg" alt="profile picture" draggable="false">
                </div>
                <div class="personal-informations-user">
                    <p>Naps</p>
                    <p>Okay</p>
                    <p>32 ans</p>
                    <p class="adress">Rue de gamberge</p>
                    <p>13</p>
                    <p class="user-city">Marseille</p>
                    <p class="user-mail">naps@gmail.com</p>
                    <p class="phone-number">0707070707</p> 
                </div>
            </div>
            <div class="user-page">
                <div class="username-desc-container">
                    <div class="username-text-container">
                        <div class="username-text">
                            <h1>@</h1>
                            <h1>NapsDeMarseille</h1>
                        </div>
                        <p class="user-role">Organisateur</p>
                    </div>
                    <div class="user-desc">
                        <p class="text-user-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta atque, molestiae deleniti voluptates saepe minus ipsa doloribus eligendi deserunt et consectetur quis distinctio excepturi illum officia sunt quia culpa cum delectus necessitatibus! Sit ipsam repudiandae explicabo. Enim qui iste officiis expedita laboriosam, quam facilis ullam dignissimos? Cumque, hic nemo? Sequi, commodi consectetur tempora, eveniet assumenda perferendis voluptatum aspernatur deserunt suscipit velit quo cupiditate rem exercitationem quas laboriosam delectus ducimus blanditiis pariatur vel laborum non itaque ratione! Maxime, excepturi nostrum. Architecto aliquid quia, aperiam deserunt ea in dicta minima ad fuga quam harum dolorem est dolores facere itaque numquam, nulla ratione? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati eveniet amet dicta eos incidunt eligendi dolore iste error eaque nisi blanditiis dignissimos cupiditate doloribus, ea maiores omnis architecto voluptate in assumenda illum excepturi odit. Necessitatibus, expedita aut eos quos corrupti illo dolorem veritatis ex et asperiores aspernatur eaque laudantium culpa in, rerum pariatur est, maiores nemo illum nisi libero id repellat ab quod? Alias nobis consequuntur quis, magni assumenda provident reprehenderit vitae sed qui doloribus odio ducimus iure inventore est unde eaque deserunt placeat neque earum, voluptatibus reiciendis illo itaque veniam! Dolorum eius officiis repudiandae reiciendis, voluptas ratione nostrum magni saepe quaerat neque cupiditate iste quae culpa maxime omnis voluptates, quos, cum asperiores qui odio sapiente libero. Incidunt magnam officiis dolore id quos non esse consequuntur cum praesentium, sit molestiae qui, odit impedit voluptates, iure nemo natus! Nesciunt, enim ipsa?</p>
                        <p id="see-more-description" onclick="showMoreText()">Voir plus</p>
                    </div>
                    <div class="nb-friends">
                        <p>Amis :</p>
                        <p class="to-modify">12</p>
                    </div>
                    <div class="is-not-your-friend">
                        <p>Vous n'êtes pas amis</p>
                        <form action="./?page=profile&user=" method="POST">
                            <button type="submit">
                                <img src="<?= PATH_IMAGES ?>" alt="">
                            </button>
                        </form>
                    </div>
                    <div class="is-your-friend">
                        <p>Vous êtes amis depuis le</p>
                        <p class="to-modify">12/12/2012</p>
                    </div>
                </div>
                <div class="register-date-container">
                        <h3 class="register-date">Inscrit depuis le</h3>
                        <h3 class="register-date">12/12/2012</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once PATH_VIEWS . "footer.php"; ?>

