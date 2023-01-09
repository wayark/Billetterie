<?php

class CartPresenter extends Presenter
{
    /**
    * @var array<int, TicketPricing>
    */
    private array $ticketPrice;
    private float $totalPrice;

    public function __construct(?array $get, ?array $post)
    {
        parent::__construct($get, $post);
    }

    protected function checkProcess(): void
    {
        $ticketPricing = new TicketPricingDAO();
        $this->totalPrice = 0;

        foreach ($_SESSION['cart']->getInCartPricing() as $idPricing => $quantity) {
            $this->ticketPrice[$idPricing] = $ticketPricing->getById($idPricing);
            $this->totalPrice += $this->ticketPrice[$idPricing]->getPrice() * $quantity;
        }
    }

    public function formatDisplay(): array
    {
        $display = array();

        $display['items'] = "";

        foreach ($_SESSION['cart']->getInCartPricing() as $idPricing => $quantity) {
            $display['items'] = "<div class=\"cart-body-item\">";
            $display['items'] .= "<div class=\"cart-body-item-title\">";
            $display['items'] .= "<h1>" . $this->ticketPrice[$idPricing]->getEvent()->getEventInfo()->getEventName() . "</h1>";
            $display['items'] .= "</div>";
            $display['items'] .= "<div class=\"cart-body-item-price\">";
            $display['items'] .= "<h1>" . $this->ticketPrice[$idPricing]->getPrice() * $quantity . "€</h1>";
            $display['items'] .= "</div></div>";
        }

        $display['total'] = $this->totalPrice;

        return $display;
    }

}