<?php

class EventPricing
{
    private int $idEventPricing;
    private string $pricingName;
    private float $price;

    /**
     * @param int $id - id of the event pricing
     * @param string $name - name of the event pricing
     * @param float $rice - price of the event pricing
     */
    public function __construct(int $id, string $name, float $rice){
        $this->idEventPricing = $id;
        $this->pricingName = $name;
        $this->price = $rice;
    }

    /**
     * @return int
     */
    public function getIdEventPricing(): int
    {
        return $this->idEventPricing;
    }

    /**
     * @param int $idEventPricing
     */
    public function setIdEventPricing(int $idEventPricing): void
    {
        $this->idEventPricing = $idEventPricing;
    }

    /**
     * @return string
     */
    public function getPricingName(): string
    {
        return $this->pricingName;
    }

    /**
     * @param string $pricingName
     */
    public function setPricingName(string $pricingName): void
    {
        $this->pricingName = $pricingName;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}