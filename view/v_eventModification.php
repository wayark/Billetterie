<?php
require_once(PATH_VIEWS . 'header.php');
require_once PATH_APPLICATION . 'display/formatDate.php';
/**
 * @var array{
 *     event: array{
 *            id: int,
 *            title: string,
 *            picturePath: string,
 *            pictureDescription: string,
 *            dateTime: string
 * }
 * } $display
 */
?>
    <link href="<?= PATH_CSS ?>eventModification.css" rel="stylesheet">

    <main>
        <section class="eventModification">
            <div class="event-modification-frame">
                <div class="event-modification-title">
                    <div style="display: flex">
                        <div class="imageFrame"><img src="<?= $display['event']['picturePath'] ?>"
                                                     alt="<?= $display['event']['pictureDescription'] ?>"
                                                     class="imageEvent">
                        </div>
                        <div class="event-modification-name">
                            <h1><?= $display['event']['title'] ?></h1>
                            <h2><?= $display['event']['dateTime'] ?></h2>
                        </div>
                    </div>

                    <section class="eventModification">
                        <div class="event-modification-frame">
                            <div class="event-modification-title">

                                <form method="Post"
                                      action="./index.php?page=eventModification&event=<?= $display['event']['id'] ?>">
                                    <div class="event-modification-summary">
                                        <h2>Résumé</h2>
                                        <textarea name="resume" id="" cols="30" rows="10" maxlength="1000"></textarea>
                                    </div>

                                    <div class="event-modification-information">
                                        <h2>Informations</h2>

                                        <div class="event-modification-place">
                                            <h3>Lieu</h3>
                                            <div class="textPlace-container">
                                                <input type="text" class="textPlaceCo" name="country"
                                                       placeholder="Pays">
                                                <input type="text" class="textPlaceCi" name="city" placeholder="Ville">
                                                <input type="text" class="textPlaceS" name="street" placeholder="Rue">
                                            </div>
                                        </div>

                                        <div class="event-modification-ticket">
                                            <div>
                                                <h3>Date</h3>
                                                <input type="date" class="textDate" name="date">
                                            </div>
                                            <div>
                                                <h3>Nombre de ticket</h3>
                                                <input type="number" name="ticketNumberP" placeholder="fosse">
                                                <input type="number" name="ticketNumberS" placeholder="gradin">
                                            </div>
                                            <div>
                                                <h3>Prix des tickets</h3>
                                                <input type="number" name="ticketPriceP" placeholder="fosse">
                                                <input type="number" name="ticketPriceS" placeholder="gradin">
                                            </div>
                                            <button class="modify">Modifier</button>
                                        </div>
                                </form>
                            </div>
                    </section>
                </div>
            </div>
        </section>
    </main>


<?php require_once(PATH_VIEWS . 'footer.php');
?>