<?php

class PaymentMethodDAO extends DAO implements IObjectDAO
{

    function getById(int $id)
    {
        $result = $this->queryRow('SELECT * FROM payment_method WHERE ID_PAYMENT_METHOD = ?', [$id]);
        if ($result) {
            return new PaymentMethod($result['ID_PAYMENT_METHOD'], $result['PAYMENT_METHOD_NAME']);
        } else {
            return null;
        }
    }

    function getAll(): array
    {
        $result = $this->queryAll('SELECT * FROM payment_method');
        $paymentMethods = [];
        foreach ($result as $row) {
            $paymentMethods[] = new PaymentMethod($row['ID_PAYMENT_METHOD'], $row['PAYMENT_METHOD_NAME']);
        }
        return $paymentMethods;
    }

    function getLastId(): int
    {
        return $this->getTableLastId('payment_method', "ID_PAYMENT_METHOD");
    }
}