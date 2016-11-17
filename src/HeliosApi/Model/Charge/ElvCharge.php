<?php


namespace HeliosApi\Model\Charge;

use HeliosApi\Model\BankAccount;
use JMS\Serializer\Annotation\Type;

/**
 * Class ElvCharge
 *
 * @package HeliosApi\Model\Charge
 */
class ElvCharge extends AbstractCharge
{
    /**
     * @Type("HeliosApi\Model\BankAccount")
     * @var BankAccount
     */
    protected $bankAccount;

    /**
     * @return BankAccount
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * @param BankAccount $bankAccount
     *
     * @return ElvCharge
     */
    public function setBankAccount($bankAccount)
    {
        $this->bankAccount = $bankAccount;
        return $this;
    }
}
