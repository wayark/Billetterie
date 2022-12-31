<?php

class EventPricingDAO extends DAO implements IObjectDAO
{

    function getById(int $id): ?EventPricing
    {
        $query = "SELECT * FROM pricing WHERE ID_PRICING = ?";
        $result = $this->queryRow($query, [$id]);
        if ($result) {
            return new EventPricing($result['ID_PRICING'], $result['PRICING_NAME'], $result['PRICE_AMOUNT']);
        }
        return null;
    }

    function getAll(): array
    {
        $query = "SELECT * FROM pricing";
        $result = $this->queryAll($query);
        $eventPricing = [];
        foreach ($result as $row) {
            $eventPricing[] = new EventPricing($row['ID_PRICING'], $row['PRICING_NAME'], $row['PRICE_AMOUNT']);
        }
        return $eventPricing;
    }

    function getLastId(): int
    {
        return $this->getTableLastId('pricing', "ID_PRICING");
    }

    function getPricingsOf(int $event_id) : array
    {
        $query = "SELECT * FROM pricing WHERE ID_EVENT = ?";
        $result = $this->queryAll($query, [$event_id]);
        $eventPricing = [];
        foreach ($result as $row) {
            $eventPricing[] = new EventPricing($row['ID_PRICING'], $row['PRICING_NAME'], $row['PRICE_AMOUNT']);
        }
        return $eventPricing;
    }
}