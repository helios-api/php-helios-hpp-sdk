<?php

namespace HeliosHpp\Serializer;

use HeliosApi\Exception\HeliosApiResponseException;
use JMS\Serializer\SerializerBuilder;

/**
 * Class JsonSerializer
 *
 * @package HeliosHpp\Serializer
 */
class JsonSerializer
{
    /**
     * @var \JMS\Serializer\Serializer
     */
    protected $serializer;

    /**
     * @var string
     */
    protected $mode = "json";

    /**
     * JsonSerializer constructor.
     */
    public function __construct()
    {
        $builder = new SerializerBuilder();
        $builder
            ->addDefaultListeners()
            ->addDefaultHandlers()
            ->addDefaultSerializationVisitors()
            ->addDefaultDeserializationVisitors();
        $this->serializer = $builder->build();
    }

    /**
     * @param $object
     *
     * @return mixed|string
     * @throws \HeliosApi\Exception\HeliosApiResponseException
     */
    public function serialize($object)
    {
        try {
            return $this->serializer->serialize($object, $this->mode);
        } catch (\Exception $exception) {
            throw new HeliosApiResponseException("JSON Serializer exception", 0, $exception);
        }
    }

    /**
     * @param string $jsonData
     * @param string $className
     *
     * @return array|\JMS\Serializer\scalar|mixed|object
     * @throws \HeliosApi\Exception\HeliosApiResponseException
     */
    public function deserialize($jsonData, $className = '')
    {
        try {
            return $this->serializer->deserialize($jsonData, $className, $this->mode);
        } catch (\Exception $exception) {
            throw new HeliosApiResponseException("JSON Serializer exception", 0, $exception);
        }
    }
}
