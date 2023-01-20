<?php 

class TicketsPresenter {

    private array $tickets;

    public function __construct(array $tickets) {
        $this->tickets = $tickets;
    }

    public function formatDisplay(){
        $display = array();
        $display['tickets'] = "";
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