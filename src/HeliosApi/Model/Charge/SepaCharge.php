<?php

namespace HeliosApi\Model\Charge;

use HeliosApi\Model\Sepa;
use JMS\Serializer\Annotation\Type;

/**
 * Class SepaCharge
 *
 * @package HeliosApi\Model\Charge
 */
class SepaCharge extends AbstractCharge
{
    /**
     * @Type("HeliosApi\Model\Sepa")
     * @var Sepa
     */
    protected $sepa;

    /**
     * @return Sepa
     */
    public function getSepa()
    {
        return $this->sepa;
    }

    /**
     * @param Sepa $sepa
     *
     * @return SepaCharge
     */
    public function setSepa($sepa)
    {
        $this->sepa = $sepa;
        return $this;
    }
}
