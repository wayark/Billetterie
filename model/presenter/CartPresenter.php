<?php

class CartPresenter extends Presenter
{
    /**
    * @var array<int, TicketPricing>
    */
    private array $ticketPrice;
    private float $totalPrice;
    private CartDAO $cartDAO;
    private TicketPricingDAO $ticketPricingDAO;

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

        $cartDAO = new CartDAO();
        $ticketPricingDAO = new TicketPricingDAO();

        $cart = $cartDAO->getById($_SESSION["user"]->getId());

        foreach ($cart->getInCartPricing() as $item => $quantity) {
            $event = $ticketPricingDAO->getById($item)->getEvent();
            $display["items"] .= '<div class="cart-item">';
            $display["items"] .= '<img src="'. PATH_IMAGES . $event->getEventInfo()->getPicture()->getPicturePath() . '" alt="">';
            $display["items"] .= '<div class="cart-item-title">';
            $display["items"] .= '<h2>'.'</h2>';
            $display["items"] .= '<p>Date</p>';
            $display["items"] .= '</div>';
            $display["items"] .= '<div class="cart-item-quantity">';
            $display["items"] .= '<p>Quantité</p>';
            $display["items"] .= '</div>';
            $display["items"] .= '<div class="cart-item-price">';
            $display["items"] .= '<p>Prix</p>';
            $display["items"] .= '</div>';
            $display["items"] .= '</div>';
        }

        $display['total'] = $this->totalPrice;

        return $display;
    }

}