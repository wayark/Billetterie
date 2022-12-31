<?php

class EventPricingDTO extends DTO implements IObjectDTO
{

    /**
     * @param Event $object The event of the pricing
     * @return void Add all the pricings of the event to the database
     */
    function add($object): void
    {
        $prices = $object->getEventInfo()->getPrices();

        $fields = ["ID_PRICING" ,"ID_EVENT","PRICING_NAME", "PRICE_AMOUNT"];

        foreach ($prices as $price) {
            $values = [
                $price->getIdEventPricing(),
                $object->getIdEvent(),
                $price->getPricingName(),
                $price->getPrice()
            ];
            $this->insertQuery("pricing", $fields, $values);
        }
    }

    /**
     * @param Event $object The event of the pricing
     * @return void Update all the pricings of the event to the database
     */
    function update($object): void
    {
        $prices = $object->getEventInfo()->getPrices();
        $fields = ["ID_PRICING" ,"ID_EVENT","PRICING_NAME", "PRICE_AMOUNT"];

        foreach ($prices as $price) {
            $values = [
                $price->getIdEventPricing(),
                $object->getIdEvent(),
                $price->getPricingName(),
                $price->getPrice()
            ];
            $this->updateQuery("pricing", $fields, $values, "ID_PRICING", $price->getIdEventPricing());
        }
    }

    /**
     * @param Event $object The event of the pricing
     * @return void Delete all the pricings of the event to the database
     */
    function delete($object): void
    {
        $this->deleteQuery("pricing", "ID_EVENT", $object->getIdEvent());
    }
}