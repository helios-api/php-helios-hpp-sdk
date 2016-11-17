<?php

namespace HeliosHpp\Model;

use JMS\Serializer\Annotation\Type;

/**
 * Class PaymentStatusChange
 *
 * @package HeliosHpp\Model
 */
class PaymentStatusChange
{
    /**
     * @Type("integer")
     * @var integer
     */
    protected $id;

    /**
     * @Type("string")
     * @var string
     */
    protected $eventType;

    /**
     * @Type("string")
     * @var string
     */
    protected $sourceType;

    /**
     * @Type("string")
     * @var string
     */
    protected $payment;

    /**
     * @Type("string")
     * @var string
     */
    protected $sourceId;

    /**
     * @Type("DateTime<'Y-m-d\TH:i:s.uP'>")
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * PaymentStatusChange constructor.
     *
     * @param int       $id
     * @param string    $eventType
     * @param string    $sourceType
     * @param string    $payment
     * @param string    $sourceId
     * @param \DateTime $createdAt
     */
    public function __construct(
        $id = null,
        $eventType = '',
        $sourceType = '',
        $payment = '',
        $sourceId = '',
        \DateTime $createdAt = null
    ) {
        $this->id = $id;
        $this->eventType = $eventType;
        $this->sourceType = $sourceType;
        $this->payment = $payment;
        $this->sourceId = $sourceId;
        $this->createdAt = $createdAt;
    }

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
     * @return PaymentStatusChange
     */
    public function setId($id)
    {
        $this->id = intval($id);
        return $this;
    }

    /**
     * @return string
     */
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * @param string $eventType
     *
     * @return PaymentStatusChange
     */
    public function setEventType($eventType)
    {
        $this->eventType = $eventType;
        return $this;
    }

    /**
     * @return string
     */
    public function getSourceType()
    {
        return $this->sourceType;
    }

    /**
     * @param string $sourceType
     *
     * @return PaymentStatusChange
     */
    public function setSourceType($sourceType)
    {
        $this->sourceType = $sourceType;
        return $this;
    }

    /**
     * @return string
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @param string $payment
     *
     * @return PaymentStatusChange
     */
    public function setPayment($payment)
    {
        $this->payment = $payment;
        return $this;
    }

    /**
     * @return string
     */
    public function getSourceId()
    {
        return $this->sourceId;
    }

    /**
     * @param string $sourceId
     *
     * @return PaymentStatusChange
     */
    public function setSourceId($sourceId)
    {
        $this->sourceId = $sourceId;
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
     * @return PaymentStatusChange
     */
    public function setCreatedAt($createdAt)
    {
        if (is_string($createdAt)) {
            $createdAt = new \DateTime($createdAt);
        }
        $this->createdAt = $createdAt;
        return $this;
    }
}
