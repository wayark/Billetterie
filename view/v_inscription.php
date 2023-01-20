<?php require_once PATH_VIEWS . 'header.php'; ?>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= PATH_CSS ?>inscription.css" rel="stylesheet">
    <link href="<?= PATH_MEDIA ?>Inscription.css" rel="stylesheet">
    <script src="<?= PATH_SCRIPTS ?>signup.js" defer></script>
    <title>Inscription</title>
</head>
<section class="main-container">
    <div class="main-wrapper">
        <h2>Créer votre profil utilisateur pour valider votre inscription !</h2>
        <form class="signup-form" action="./" method="POST">
            <div class="flex-column">
                <div class="optional first-optional flex-row">
                    <h1>*</h1>
                    <h1>Obligatoire</h1>
                </div>
                <div class="input-username-container flex-row">
                    <h1>@</h1>
                    <input type="text" class="my-username-input"name="username" placeholder="Mon nom d'utilisateur .." oninput="changeInputTextCopy(this)" maxlength="25" required>
                </div>
            </div>
            <div class="url-container flex-row">  
                <img src="<?= PATH_IMAGES ;?>logos/yellowurl.png" alt=""> 
                <div class="url-text flex-row">
                    <h1>waticket.com/?page=profile&user=</h1>
                    <h1 class="inputTextCopy"></h1>
                </div>           
            </div>
            <div class="grid-container grid-row">
                <div class="grid-left flex-column">
                    <div class="name-input-container flex-column">
                        <div class="optional flex-row">
                            <h1>*</h1>
                            <h1>Obligatoire</h1>
                        </div>
                        <input class="name-input" type="text" placeholder="Mon nom .." name="name" required/>
                    </div>
                    <div class="name-input-container flex-column">
                        <div class="optional flex-row">
                            <h1>*</h1>
                            <h1>Obligatoire</h1>
                        </div>
                        <input class="name-input" type ="text" placeholder="Mon prénom .." name="first-name" required/>
                    </div>
                    <div class="container-input-change-text-content flex-column">
                        <div class="title-image-profile">
                            <div class="optional flex-row">
                                <h1>*</h1>
                                <h1>Facultatif</h1>
                            </div>
                            <h1 style="text-align:center;">Ma photo de profil :</h1> 
                        </div>
                        <div class="container-input-file flex-row">
                            <img src="<?= PATH_IMAGES ;?>users/unnamed.jpg" alt="profile-picture" draggable="false">              
                            <h2>Choisir une image ..</h2>
                        </div>
                    </div>
                    
                    <input type="file" name="photo" placeholder="Photo de profil" style="opacity:0;position:absolute;z-index:-1;" class="input-file-signup">
                    <div class="phone-input-container flex-column">
                        <div class="optional flex-row">
                            <h1>*</h1>
                            <h1>Facultatif</h1>
                        </div>
                        <input type ="tel" name="tel"class="input-phone-number" pattern="[0-9]{10}" size="10" placeholder="Mon numéro .."minlength="10" maxlength="10" required/>
                        <h1 class="numformat">Format : 0707070707</h1>
                    </div>
                </div>
                <div class="grid-right flex-column">
                    <div class="flex-column age-input-container">
                        <div class="optional flex-row">
                            <h1>*</h1>
                            <h1>Obligatoire</h1>
                        </div>
                        <input type="number" class="input-age" name="age" placeholder="Mon âge .." required max="130" min="13">
                    </div>
                    <div class="flex-column">
                        <div class="optional flex-row">
                            <h1>*</h1>
                            <h1>Obligatoire</h1>
                        </div>
                        <input type="text" name="ville" placeholder="Ma ville .." class="input-city" maxlength="50" required>
                    </div>
                    <div class="flex-column">
                        <div class="optional flex-row">
                            <h1>*</h1>
                            <h1>Obligatoire</h1>
                        </div>
                        <input type="number" name="postal-code" class="input-postal-code"placeholder="Mon code postal .." max="98000"required>
                    </div>
                    <div class="flex-column">
                        <div class="optional flex-row">
                            <h1>*</h1>
                            <h1>Facultatif</h1>
                        </div>
                        <textarea name="description" class="input-desc" placeholder="Ma description .." resizeable="false" style="resize: none;" maxlength="600"></textarea>
                    </div>
                    <div class="flex-column">
                        <div class="optional flex-row">
                            <h1>*</h1>
                            <h1>Obligatoire</h1>
                        </div>
                        <h1 class="account-type">Type de compte :</h1>
                        <select name="account-type" id="user-type" required>
                            <option value="user" selected>Particulier</option>
                            <option value="admin">Organisateur</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="share-input-container">
                <div class="wants-to-share">
                    <input type="hidden" name="shareMyEvents" id="shareMyEventsInput" value="false">
                    <p>Souhaitez-vous partager vos évènements publiquement ?</p>
                    <label class="cl-switch cl-switch-large">
                        <input type="checkbox" onclick="changeValueShareInput()">
                        <span class="switcher"></span>
                    </label>
                </div>
                <div class="sharing-text">
                    <img src="<?= PATH_IMAGES ;?>useful/info-icon.png" alt="">
                    <h1>Seuls vos amis pourront voir vos évènements</h1>
                </div>
                <div class="sharing-text" style="display: none;">
                    <img src="<?= PATH_IMAGES ;?>useful/info-icon.png" alt="">
                    <h1>Tout le monde pourra voir vos évènements</h1>
                </div>
            </div>
            <button type="submit" name="submit" class="create-profile-button">Créer mon profil</button>
        </form>
    </div>
</section>
<?php require_once PATH_VIEWS . 'footer.php'; ?>