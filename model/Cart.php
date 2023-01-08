<?php

class Cart {

    private int $userId;
    /**
     * @var array<int, array{pricing: TicketPricing, quantity: int}>
     */
    private array $inCartPricing;

    public function __construct(int $userId, array $inCartPricing) {
        $this->userId = $userId;
        $this->inCartPricing = $inCartPricing;
    }

    public function getUserId(): int {
        return $this->userId;
    }

    /**
     * @return array<int, array{pricing: TicketPricing, quantity: int}>
     */
    public function getInCartPricing(): array
    {
        return $this->inCartPricing;
    }
}
