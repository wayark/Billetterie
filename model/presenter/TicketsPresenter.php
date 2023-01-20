<?php 

class TicketsPresenter {

    private array $tickets;
    private int $nbtickets;

    public function __construct(array $tickets) {
        $this->tickets = $tickets;
        $this->nbtickets = count($tickets);
    }

    public function formatDisplay(){

        $display = array();
        
        $display['first-code'] = $this->tickets[0]->getCode();
        $display['tickets'] = "";

        $display['tickets'] .= '<div class="hidden-text-container">';
        $i = 0;
        foreach ($this->tickets as $ticket) {
            $display['tickets'] .= '<div class="hidden-text">';
            $display['tickets'] .= '<h1 class="event-name">' . $ticket->getEvent()->getEventInfo()->getEventName() . '</h1>';
            $display['tickets'] .= '<h2 class="ticket-type">' . $ticket->getTicketPricing()->getName() . '</h2>';
            $display['tickets'] .= '<h2 class="nb-places">3 places</h2>';
            $display['tickets'] .= '<p class="ticket-code">' . $ticket->getCode() . '</p>';
            $display['tickets'] .= '</div>';
            $i++;
        }
        $display['tickets'] .= '</div>';

        $display['initial-ticket'] = '<div class="text-container">';
        $display['initial-ticket'] .= '<h1 class="event-name"  style="color:rgb(55, 7, 59);">' . $this->tickets[0]->getEvent()->getEventInfo()->getEventName() .'</h1>';
        $display['initial-ticket'] .= '<h2 class="ticket-type">' .  $this->tickets[0]->getTicketPricing()->getName() . '</h2>';
        $display['initial-ticket'] .= '<h2 class="nb-places">3 places</h2>';
        $display['initial-ticket'] .= '</div>';
        $display['initial-ticket'] .= '<form action="./?page=checktickets" method="post" class="button-generate-pdf">';
        $display['initial-ticket'] .= '<input type="hidden" name="event-code" value="' . $display['first-code'] . '">';
        $display['initial-ticket'] .= '<button type="submit" class="flex-row violet-button main-button">';
        $display['initial-ticket'] .= '<p>Télécharger mon billet</p>';
        $display['initial-ticket'] .= '<img src="' . PATH_IMAGES . 'logos/pdf-icon.png" alt="">';
        $display['initial-ticket'] .= '</button>';
        $display['initial-ticket'] .= '</form>';

        return $display;
    }

    public function formatDisplayPreset() {
        $display = array();
        $display['nb-tickets'] = $this->nbtickets;
        $display['preset-tickets'] = "";
        if($this->nbtickets >= 1) {
            $display['preset-tickets'] .= '<div class="ticket first-ticket">';
            $display['preset-tickets'] .= '<img src="'. PATH_IMAGES . 'logos/violet-ticket.png" alt="ticket" class="img-ticket it1" draggable="false">';
            $display['preset-tickets'] .= '</div>';
            if($this->nbtickets >= 2) {
                $display['preset-tickets'] .= '<div class="ticket second-ticket">';
                $display['preset-tickets'] .= '<img src="'. PATH_IMAGES . 'logos/pink-ticket.png" alt="ticket" class="img-ticket it1" draggable="false">';
                $display['preset-tickets'] .= '</div>';
                if($this->nbtickets >= 3) {
                    $display['preset-tickets'] .= '<div class="ticket third-ticket">';
                    $display['preset-tickets'] .= '<img src="'. PATH_IMAGES . 'logos/orange-ticket.png" alt="ticket" class="img-ticket it1" draggable="false">';
                    $display['preset-tickets'] .= '</div>';
                }
            }
        }
        return $display;
    }
}