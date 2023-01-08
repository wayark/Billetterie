<?php

class NumberOfTicketsService
{
    public static function computeMaxNumberofPlace(PricingList $pricings) : int
    {
        $max = 0;
        foreach ($pricings->getPricingList() as $pricing) {
            $max += $pricing->getMaxQuantity();
        }
        return $max;
    }

    public static function getTotalNumberOfRemainingTickets(Event $event) : int
    {
        $ticketDAO = new TicketDAO();
        $pricingDAO = new TicketPricingDAO();
        $pricings = $pricingDAO->getPricingsForEventId($event->getIdEvent());
        return self::computeMaxNumberofPlace($pricings) - $ticketDAO->getNumberOfTicketsBought($event);
    }

    public static function getNumberOfRemainingTicketsForPricing(TicketPricing $pricing) : int
    {
        $ticketDAO = new TicketDAO();
        return $pricing->getMaxQuantity() - $ticketDAO->getNumberOfTicketsBought($pricing->getEvent(), $pricing);
    }
}