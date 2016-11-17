<?php


namespace HeliosApi\Model\Charge;

use HeliosApi\Model\Ideal;
use HeliosHpp\Model\Url;
use JMS\Serializer\Annotation\Type;

/**
 * Class IdealCharge
 *
 * @package HeliosApi\Model\Charge
 */
class IdealCharge extends AbstractCharge
{
    /**
     * @Type("HeliosApi\Model\Ideal")
     * @var Ideal
     */
    protected $bankAccount;

    /**
     * @Type("HeliosApi\Model\Urls")
     * @var Url
     */
    protected $urls;

    /**
     * @return Ideal
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * @param Ideal $bankAccount
     *
     * @return ElvCharge
     */
    public function setBankAccount($bankAccount)
    {
        $this->bankAccount = $bankAccount;
        return $this;
    }

    /**
     * @return Url
     */
    public function getUrls()
    {
        return $this->urls;
    }

    /**
     * @param Url $urls
     *
     * @return SofortCharge
     */
    public function setUrls($urls)
    {
        $this->urls = $urls;
        return $this;
    }
}
