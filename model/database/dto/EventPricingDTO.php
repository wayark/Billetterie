<?php

class EventPricingDTO extends DTO implements IObjectDTO
{

    /**
     * @param TicketPricing $object The event of the pricing
     * @return void Add all the pricings of the event to the database
     */
    function add($object): void
    {
        $fields = ["ID_TICKET_PRICING" ,"ID_EVENT","NAME_TICKET_PRICING", "PRICE", "MAX_TICKET_NUMBER"];
        $values = [$object->getIdTicketPricing(), $object->getEvent()->getIdEvent(), $object->getName(),
            $object->getPrice(), $object->getMaxQuantity()];

        $this->insertQuery("TICKET_PRICING", $fields, $values);
    }

    /**
     * @param TicketPricing $object The event of the pricing
     * @return void Update all the pricings of the event to the database
     */
    function update($object): void
    {
        $fields = ["ID_EVENT","NAME_TICKET_PRICING", "PRICE", "MAX_TICKET_NUMBER"];
        $values = [
            $object->getEvent()->getIdEvent(),
            $object->getName(),
            $object->getPrice(),
            $object->getMaxQuantity()
        ];
        $this->updateQuery("TICKET_PRICING",$fields, $values ,"ID_TICKET_PRICING", $object->getIdTicketPricing());
    }

    /**
     * @param TicketPricing $object The event of the pricing
     * @return void Delete all the pricings of the event to the database
     */
    function delete($object): void
    {
        $this->deleteQuery("TICKET_PRICING", "ID_TICKET_PRICING", $object->getIdTicketPricing());
    }
}