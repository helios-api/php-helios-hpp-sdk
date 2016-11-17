<?php

namespace HeliosApi\Model;

/**
 * Class Urls
 *
 * @package HeliosApi\Model
 */
class Urls
{
    /**
     * @var string
     */
    protected $success;

    /**
     * @var string
     */
    protected $failure;

    /**
     * @var string
     */
    protected $cancel;

    /**
     * Urls constructor.
     *
     * @param string $success
     * @param string $failure
     * @param string $cancel
     */
    public function __construct($success = null, $failure = null, $cancel = null)
    {
        $this->success = $success;
        $this->failure = $failure;
        $this->cancel = $cancel;
    }

    /**
     * @return string
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * @return string
     */
    public function getFailure()
    {
        return $this->failure;
    }

    /**
     * @return string
     */
    public function getCancel()
    {
        return $this->cancel;
    }
}
