<?php require_once PATH_VIEWS . 'header.php'; ?>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= PATH_CSS ?>inscription.css" rel="stylesheet">
    <script src="<?= PATH_SCRIPTS ?>signup.js" defer></script>
    <title>Inscription</title>
</head>
<section class="main-container">
    <div class="main-wrapper">
        <h2>Créer votre profil utilisateur pour valider votre inscription !</h2>
        <form class="signup-form" action="./" method="POST">
            <div class="input-username-container flex-row">
                <h1>@</h1>
                <input type="text" class="my-username-input"name="username" placeholder="Mon nom d'utilisateur .." oninput="changeInputTextCopy(this)" maxlength="25" required>
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
                            <h2 style="cursor:pointer;color:white;">Choisir une image ..</h2>
                        </div>
                    </div>
                    <input type="file" name="photo" placeholder="Photo de profil" style="opacity:0;position:absolute;z-index:-1;" class="input-file-signup">
                    <div class="phone-input-container flex-column">
                        <div class="optional flex-row">
                            <h1>*</h1>
                            <h1>Facultatif</h1>
                        </div>
                        <input type="phone" name="tel" placeholder="Mon téléphone ..">
                    </div>
                    <input type="number" name="age" placeholder="19" required max="130" min="13">
                </div>
                <div class="grid-right flex-column">
                    <input type="text" name="ville" placeholder="Ma ville .." required>
                    <input type="number" name="postal-code" placeholder="69140" required>
                    <textarea name="description" placeholder="Ma description.." resizeable="false" style="resize: none;" maxlength="600"></textarea>
                    <!-- Input type oui ou non -->
                    <select name="account-type" id="user-type" required>
                        <option value="user" selected>Particulier</option>
                        <option value="admin">Organisateur</option>
                    </select>
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