<?php

class PricingList
{
    private array $pricingList;

    public function __construct()
    {
        $this->pricingList = [];
    }

    public function addPricing(TicketPricing $pricing): void
    {
        $this->pricingList[] = $pricing;
    }

    /**
     * @return array<TicketPricing>
     */
    public function getPricingList(): array
    {
        return $this->pricingList;
    }

    public function getPricing(int $index): TicketPricing
    {
        return $this->pricingList[$index];
    }

    public function removePricing(int $index): void
    {
        unset($this->pricingList[$index]);
    }
}