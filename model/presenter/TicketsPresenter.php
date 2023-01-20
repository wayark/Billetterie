<?php 

class TicketsPresenter {

    private array $tickets;

    public function __construct(array $tickets) {
        $this->tickets = $tickets;
    }

    public function formatDisplay(){
        $display = array();
        $display['tickets'] = "";

        $nbTickets = count($this->tickets);
        if($nbTickets == 0) {
            
        }

        if($nbTickets == 1) {
            $display['tickets'] .= '<div class="ticket first-ticket">';
        } else {

        }


        foreach ($this->tickets as $ticket) {
            $display['tickets'] .= '<div class="ticket">';
            $display['tickets'] .= '<div class="ticket-header">';
            $display['tickets'] .= '<h2> oui </h2>';
            $display['tickets'] .= '<p> oui </p>';
            $display['tickets'] .= '</div>';
            $display['tickets'] .= '<div class="ticket-body">';
            $display['tickets'] .= '<div class="ticket-body-left">';
            $display['tickets'] .= '<p> ouiiii</p>';
            $display['tickets'] .= '</div>';
            $display['tickets'] .= '<div class="ticket-body-right">';
            $display['tickets'] .= '<div class="ticket-body-right-top">';
            $display['tickets'] .= '<p> RGTBRHYNJTU?K6RJEYTHZRGE</p>';
            $display['tickets'] .= '<p>OKAY KAYYYY</p>';
            $display['tickets'] .= '</div>';
            $display['tickets'] .= '<div class="ticket-body-right-bottom">';
            $display['tickets'] .= '<p>LEPRIXXXXX€</p>';
            $display['tickets'] .= '</div>';
            $display['tickets'] .= '</div>';
            $display['tickets'] .= '</div>';
            $display['tickets'] .= '</div>';
        }
        return $display;
    }
}

?>
<!--             <div class="text-container">
                <h1 class="event-name">Soirée mousse</h1>
                <h2 class="ticket-type">Gradin</h2>
                <h2 class="nb-places">3 places</h2>
            </div>
            <form action="./?page=checktickets" method="post" class="button-generate-pdf">
                <input type="hidden" name="event_id" value="'. $ticket->getIdTicket() .'">
                <button type="submit" name="generate-pdf" class="flex-row main-button violet-button">
                    <p>Télécharger mon billet</p>
                    <img src="./asset/image//logos/pdf-icon.png" alt="">
                </button>
            </form>
        </div>
        <div class="ticket first-ticket">
            <img src="<?= PATH_IMAGES ?>logos/violet-ticket.png" alt="ticket" class="img-ticket it1" draggable="false">
            <div class="hidden-text" display="none">

            </div>
        </div>
        <div class="ticket second-ticket">
            <img src="<?= PATH_IMAGES ?>logos/pink-ticket.png" alt="ticket" class="img-ticket it1" draggable="false">
            <div class="hidden-text" display="none">

            </div>
        </div>
        <div class="ticket third-ticket">
            <img src="<?= PATH_IMAGES ?>logos/orange-ticket.png" alt="ticket" class="img-ticket it1" draggable="false">
            <div class="hidden-text" display="none">
        </div> -->