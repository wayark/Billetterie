<?php

class Cart {

    private int $userId;
    /**
     * @var array<int, array{pricingId: int, quantity: int}>
     */
    private array $inCartPricing;

    public function __construct(int $userId, array $inCartPricing = null) {
        if ($inCartPricing == null) $inCartPricing = array();
        $this->userId = $userId;
        $this->inCartPricing = $inCartPricing;
    }

    public function getUserId(): int {
        return $this->userId;
    }

    public function add(int $pricingId, int $quantity)
    {
        if (array_key_exists($pricingId,$this->inCartPricing)) {
            $this->inCartPricing[$pricingId] += $quantity;
        } else {
            $this->inCartPricing[$pricingId] = $quantity;
        }
    }

    public function remove(int $pricingId, int $quantity)
    {
        if (array_key_exists($pricingId,$this->inCartPricing)) {
            $this->inCartPricing[$pricingId] -= $quantity;
        }
    }

    /**
     * @return array<int, array{pricingId: int, quantity: int}>
     */
    public function getInCartPricing(): array
    {
        return $this->inCartPricing;
    }
}
