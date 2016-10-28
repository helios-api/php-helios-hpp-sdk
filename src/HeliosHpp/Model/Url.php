<?php

namespace HeliosHpp\Model;

/**
 * Class Url
 *
 * @package HeliosHpp\Model
 */
class Url
{
    /**
     * Transaction cancel url
     *
     * @var string
     */
    protected $cancel;

    /**
     * Transaction complete url
     *
     * @var string
     */
    protected $complete;

    /**
     * Transaction callback url
     *
     * @var string
     */
    protected $callback;

    /**
     * Url constructor.
     *
     * @param $cancel
     * @param $complete
     */
    public function __construct($cancel = '', $complete = '', $callback = '')
    {
        $this->cancel = $cancel;
        $this->complete = $complete;
        $this->callback = $callback;
    }

    /**
     * @return string
     */
    public function getCancel()
    {
        return $this->cancel;
    }

    /**
     * @param string $cancel
     *
     * @return Url
     */
    public function setCancel($cancel)
    {
        $this->cancel = $cancel;
        return $this;
    }

    /**
     * @return string
     */
    public function getComplete()
    {
        return $this->complete;
    }

    /**
     * @param string $complete
     *
     * @return Url
     */
    public function setComplete($complete)
    {
        $this->complete = $complete;
        return $this;
    }

    /**
     * @return string
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * @param string $callback
     *
     * @return Url
     */
    public function setCallback($callback)
    {
        $this->callback = $callback;
        return $this;
    }
}
