<?php

class TicketPricing
{
    private int $idTicketPricing;
    private Event $event;
    private string $name;
    private float $price;
    private int $maxQuantity;

    public function __construct(int $idTicketPricing = -1, Event $event = null, string $name = "", float $price = 0.0, int $maxQuantity = 0)
    {
        if ($event == null) {
            $event = new Event();
        }
        $this->idTicketPricing = $idTicketPricing;
        $this->event = $event;
        $this->name = $name;
        $this->price = $price;
        $this->maxQuantity = $maxQuantity;
    }

    /**
     * @return int
     */
    public function getIdTicketPricing(): int
    {
        return $this->idTicketPricing;
    }

    /**
     * @return Event
     */
    public function getEvent(): Event
    {
        return $this->event;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getMaxQuantity(): int
    {
        return $this->maxQuantity;
    }

    public function setMaxQuantity(int $newQuantity)
    {
        $this->maxQuantity = $newQuantity;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}