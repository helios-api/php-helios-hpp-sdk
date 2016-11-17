<?php

namespace HeliosApi\Model;

use JMS\Serializer\Annotation\Type;

/**
 * Class Channel
 *
 * @package HeliosApi\Model
 */
class Channel
{
    /**
     * @Type("integer")
     * @var integer
     */
    protected $id;

    /**
     * @Type("integer")
     * @var integer
     */
    protected $merchantId;

    /**
     * @Type("integer")
     * @var integer
     */
    protected $priority;

    /**
     * @Type("string")
     * @var string
     */
    protected $name;

    /**
     * @Type("string")
     * @var string
     */
    protected $currency;

    /**
     * @Type("boolean")
     * @var boolean
     */
    protected $enabled;

    /**
     * @Type("DateTime<'Y-m-d\TH:i:sP'>")
     * @var \DateTime
     */
    protected $expiresAt;

    /**
     * @Type("DateTime<'Y-m-d\TH:i:s.uP'>")
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @Type("DateTime<'Y-m-d\TH:i:s.uP'>")
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Channel
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @param int $merchantId
     *
     * @return Channel
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     *
     * @return Channel
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Channel
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     *
     * @return Channel
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param boolean $enabled
     *
     * @return Channel
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * @param \DateTime $expiresAt
     *
     * @return Channel
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     *
     * @return Channel
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     *
     * @return Channel
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
