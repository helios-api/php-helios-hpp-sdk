<?php


namespace HeliosApi\Model\Charge;

use HeliosHpp\Model\Url;
use JMS\Serializer\Annotation\Type;

/**
 * Class EpsCharge
 *
 * @package HeliosApi\Model\Charge
 */
class EpsCharge extends AbstractCharge
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
     * @return EpsCharge
     */
    public function setUrls($urls)
    {
        $this->urls = $urls;
        return $this;
    }
}
