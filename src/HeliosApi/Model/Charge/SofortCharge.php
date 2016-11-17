<?php


namespace HeliosApi\Model\Charge;

use HeliosHpp\Model\Url;
use JMS\Serializer\Annotation\Type;

/**
 * Class SofortCharge
 *
 * @package HeliosApi\Model\Charge
 */
class SofortCharge extends AbstractCharge
{
    /**
     * @Type("HeliosApi\Model\Urls")
     * @var Url
     */
    protected $urls;

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
