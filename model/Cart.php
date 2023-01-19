<?php

class Cart {

    private int $userId;
    /**
     * @var array<int, int>
     */
    private array $inCartPricing;
    private int $totalPrice = 0;

    public function __construct(int $userId) {
        $this->userId = $userId;
        $this->inCartPricing = array();
    }

    public function getUserId(): int {
        return $this->userId;
    }


    public function add(int $pricingId, int $quantity) : bool
    {
        if (array_key_exists($pricingId, $this->inCartPricing)) {
            $this->inCartPricing[$pricingId] += $quantity;
            return true;
        } else {
            $this->inCartPricing[$pricingId] = $quantity;
            return false;
        }
    }


    public function remove(int $pricingId, int $quantity)
    {
        if (array_key_exists($pricingId,$this->inCartPricing)) {
            $this->inCartPricing[$pricingId] -= $quantity;
            if ($this->inCartPricing[$pricingId] <= 0) {
                unset($this->inCartPricing[$pricingId]);
            }
        }
    }

    public function set(int $pricingId, int $quantity)
    {
        if (array_key_exists($pricingId,$this->inCartPricing)) {
            $this->inCartPricing[$pricingId] = $quantity;
        }
    }
    /**
     * @return array<int, int>
     */
    public function getInCartPricing(): array
    {
        return $this->inCartPricing;
    }

    public function getNbItems(){
        return count($this->inCartPricing);
    }

    public function getTotalPrice(): int
    {
        return $this->totalPrice;
    }
}
