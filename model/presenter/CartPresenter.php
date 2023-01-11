<?php

class CartPresenter extends Presenter
{
    private float $totalPrice;
    /**
     * @var array<int, array{pricing: TicketPricing, quantity: int}>
     */
    private array $eventsInCart;

    public function __construct(?array $get, ?array $post)
    {
        parent::__construct($get, $post);
    }

    protected function checkProcess(): void
    {
        $ticketPricing = new TicketPricingDAO();
        $this->totalPrice = 0;
        $this->eventsInCart = [];
        foreach ($_SESSION['cart']->getInCartPricing() as $pricingId => $quantity) {
            $pricing = $ticketPricing->getById($pricingId);

            $this->eventsInCart[$pricingId] = array(
                "pricing" => $pricing,
                "quantity" => $quantity
            );

            $this->totalPrice += $pricing->getPrice() * $quantity;
        }
    }

    public function formatDisplay(): array
    {

        $display['items'] = "";

        $i = 0;
        $nbArticles = 0;
        foreach ($this->eventsInCart as $idPricing => $infos) {
            $event = $infos['pricing']->getEvent();

            $quantity = $infos['quantity'];

            if($i > 0) $display["items"] .= '<div class="cart-bar"></div>';
            $display['items'] .= '<div class="cart-item">';
            $display['items'] .= '<a href="?page=event&event=' . $event->getIdEvent() . '">';
            $display['items'] .= '<img src="' . $event->getEventInfo()->getPicture()->getPicturePath() . '" alt="" draggable="false">';
            $display['items'] .= '</a>';
            $display['items'] .= '<div class="cart-item-title">';
            $display['items'] .= '<h2>' . $event->getEventInfo()->getEventName() . '</h2>';
            $display['items'] .= '<h3>' . $infos['pricing']->getName() . '</h3>';
            $display['items'] .= '<p>' . $this->getNewFormatDate($event) . '</p>';
            $display['items'] .= '</div>';
            $display['items'] .= '<div class="cart-item-quantity">';
            $display['items'] .= '<div class="cart-item-quantity-container">';
            $display['items'] .= '<form action="./?page=cart" method="post">';
            $display['items'] .= '<input type="hidden" name="id" value="' . $infos['pricing']->getIdTicketPricing() . '">';
            $display['items'] .= '<input type="hidden" name="rmone" value="rm">';
            $display['items'] .= '<button class="onemoreless" type="submit" class="quantity-button" id="oneless">-</button>';
            $display['items'] .= '</form>';
            $display['items'] .= '<form action="./?page=cart" method="post">';
            $display['items'] .= '<select name="quantity" id="quantity-select" onchange="displayInput(this)">';
            $display['items'] .= '<option value="0"' . $this->echoSelected(0, $quantity) . '>0 (Supprimer)</option>';
            $display['items'] .= '<option value="1"' . $this->echoSelected(1, $quantity) . '>1</option>';
            $display['items'] .= '<option value="2"' . $this->echoSelected(2, $quantity) . '>2</option>';
            $display['items'] .= '<option value="3"' . $this->echoSelected(3, $quantity) . '>3</option>';
            $display['items'] .= '<option value="4"' . $this->echoSelected(4, $quantity) . '>4</option>';
            $display['items'] .= '<option value="5"' . $this->echoSelected(5, $quantity) . '>5</option>';
            $display['items'] .= '<option value="6"' . $this->echoSelected(6, $quantity) . '>6</option>';
            $display['items'] .= '<option value="7"' . $this->echoSelected(7, $quantity) . '>7</option>';
            $display['items'] .= '<option value="8"' . $this->echoSelected(8, $quantity) . '>8</option>';
            $display['items'] .= '<option value="9"' . $this->echoSelected(9, $quantity) . '>9</option>';
            $display['items'] .= '<option value="10+"' . $this->echoSelected(10, $quantity) . '>10+</option>';
            $display['items'] .= '</select>';
            $display['items'] .= '</form>';
            $display['items'] .= '<form action="./?page=cart" method="post">';
            $display['items'] .= '<input type="hidden" name="id" value="' . $infos['pricing']->getIdTicketPricing() . '">';
            $display['items'] .= '<input type="hidden" name="addone" value="add">';
            $display['items'] .= '<button class="onemoreless" type="submit" class="quantity-button" id="onemore">+</button>';
            $display['items'] .= '</form>';
            $display['items'] .= '</div>';
            $display['items'] .= '<form action="./?page=cart" method="post" class="form-10more">';
            $display['items'] .= '<input name="quantity" type="number" value="10" class="quantity-input">';
            $display['items'] .= '<button type="submit" class="quantity-button">Modifier</button>';
            $display['items'] .= '</form>';
            $display['items'] .= '</div>';
            $display['items'] .= '<div class="cart-item-price">';
            $display['items'] .= '<p>' . $infos['pricing']->getPrice() . ' €</p>';
            $display['items'] .= '</div>';
            $display['items'] .= '</div>';

            $i++;
            $nbArticles += $quantity;
        }

        if ($i == 0) $display["items"] .= '<p class="cart-empty">Votre panier est vide</p>';

        $display['total'] = $this->totalPrice;
        $display['numberArticles'] = $nbArticles;

        return $display;
    }

    private function getNewFormatDate($event){
        $tmp = substr($event->getEventInfo()->getEventDate(), 0, -6);
        $tab = explode(" ", $tmp);
        $hour = $tab[1] . "h";
        $date = explode("-", $tab[0]);
        switch ($date[1]){
            case "01":
                $date[1] = "janvier";
                break;
            case "02":
                $date[1] = "février";
                break;
            case "03":
                $date[1] = "mars";
                break;
            case "04":
                $date[1] = "avril";
                break;
            case "05":
                $date[1] = "mai";
                break;
            case "06":
                $date[1] = "juin";
                break;
            case "07":
                $date[1] = "juillet";
                break;
            case "08":
                $date[1] = "août";
                break;
            case "09": 
                $date[1] = "septembre";
                break;
            case "10":
                $date[1] = "octobre";
                break;
            case "11":
                $date[1] = "novembre";
                break;
            case "12":
                $date[1] = "décembre";
                break;
        }
        return $date[2] . " " . $date[1] . " " . $date[0] . " à " . $hour;
    }

    private function echoSelected($i, $quantity){
        if($i == $quantity) return 'selected';
    }

}