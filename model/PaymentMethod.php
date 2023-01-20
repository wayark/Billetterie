<?php

class PaymentMethod
{
    private int $idPaymentMethod;
    private string $paymentMethodName;

    public function __construct(int $idPaymentMethod = 0, string $paymentMethodName = "None")
    {
        $this->idPaymentMethod = $idPaymentMethod;
        $this->paymentMethodName = $paymentMethodName;
    }

    /**
     * @return int
     */
    public function getIdPaymentMethod(): int
    {
        return $this->idPaymentMethod;
    }

    /**
     * @param int $idPaymentMethod
     */
    public function setIdPaymentMethod(int $idPaymentMethod): void
    {
        $this->idPaymentMethod = $idPaymentMethod;
    }

    /**
     * @return string
     */
    public function getPaymentMethodName(): string
    {
        return $this->paymentMethodName;
    }

    /**
     * @param string $paymentMethodName
     */
    public function setPaymentMethodName(string $paymentMethodName): void
    {
        $this->paymentMethodName = $paymentMethodName;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->paymentMethodName;
    }

}