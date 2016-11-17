<?php

namespace HeliosApi\Model\Charge;

use HeliosApi\Model\CreditCard;
use JMS\Serializer\Annotation\Type;

/**
 * Class CreditCardCharge
 *
 * @package HeliosApi\Model
 */
class CreditCardCharge extends AbstractCharge
{
    /**
     * @Type("HeliosApi\Model\CreditCard")
     * @var CreditCard
     */
    protected $creditCard;

    /**
     * @return CreditCard
     */
    public function getCreditCard()
    {
        return $this->creditCard;
    }

    /**
     * @param CreditCard $creditCard
     *
     * @return CreditCardCharge
     */
    public function setCreditCard($creditCard)
    {
        $this->creditCard = $creditCard;
        return $this;
    }
}
