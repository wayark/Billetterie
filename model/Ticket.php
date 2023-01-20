<?php

class Ticket
{
    private int $idTicket;
    private Event $event;
    private PaymentMethod $paymentMethod;
    private TicketPricing $ticketPricing;
    private User $owner;
    private string $code;


    public function __construct(int $idTicket = -1, Event $event = null, PaymentMethod $paymentMethod = null, TicketPricing $ticketPricing = null, User $owner = null, string $code = "")
    {
        if ($event == null) {
            $event = new Event();
        }
        if ($paymentMethod == null) {
            $paymentMethod = new PaymentMethod();
        }
        if ($ticketPricing == null) {
            $ticketPricing = new TicketPricing();
        }
        if ($owner == null) {
            $owner = new User(-1, "", "", "", "", "", "");
        }
        $this->idTicket = $idTicket;
        $this->event = $event;
        $this->paymentMethod = $paymentMethod;
        $this->ticketPricing = $ticketPricing;
        $this->owner = $owner;
        $this->code = $code;
    }


    /**
     * @return int
     */
    public function getIdTicket(): int
    {
        return $this->idTicket;
    }

    /**
     * @return Event
     */
    public function getEvent(): Event
    {
        return $this->event;
    }

    /**
     * @return PaymentMethod
     */
    public function getPaymentMethod(): PaymentMethod
    {
        return $this->paymentMethod;
    }

    /**
     * @return TicketPricing
     */
    public function getTicketPricing(): TicketPricing
    {
        return $this->ticketPricing;
    }

    /**
     * @return User
     */
    public function getOwner(): User
    {
        return $this->owner;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }


}