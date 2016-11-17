<?php

namespace HeliosApi\Model;

use JMS\Serializer\Annotation\Type;

/**
 * Class Sepa
 *
 * @package HeliosApi\Model
 */
class Sepa
{
    /**
     * @Type("string")
     * @var string
     */
    protected $iban;

    /**
     * @Type("string")
     * @var string
     */
    protected $bic;

    /**
     * Sepa constructor.
     *
     * @param string $iban
     * @param string $bic
     */
    public function __construct($iban = null, $bic = null)
    {
        $this->iban = $iban;
        $this->bic = $bic;
    }

    /**
     * @return string
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @param string $iban
     *
     * @return Sepa
     */
    public function setIban($iban)
    {
        $this->iban = $iban;
        return $this;
    }

    /**
     * @return string
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * @param string $bic
     *
     * @return Sepa
     */
    public function setBic($bic)
    {
        $this->bic = $bic;
        return $this;
    }
}
