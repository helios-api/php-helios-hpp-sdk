<?php

namespace HeliosHpp\Model;

/**
 * Class AbstractSerializableModel
 *
 * @TODO     consider using serializer service
 *
 * @package  HeliosHpp\Model
 */
abstract class AbstractSerializableModel
{
    const PREFIX = 'x_';

    /**
     * @return array
     */
    public function toArray()
    {
        $objectArray = array();
        $reflection = new \ReflectionClass($this);
        $properties = $reflection->getProperties();

        foreach($properties as $property) {
            $getter = "get" . ucfirst($property->getName());
            if(method_exists($this, $getter)) {
                if($this->$getter() instanceof AbstractSerializableModel) {
                    $objectArray = array_merge($objectArray, $this->$getter()->toArray());
                } else {
                    $objectArray[$this->keyFromProperty($property->getName())] = $this->$getter();
                }
            }
        }

        return $objectArray;
    }

    /**
     * @return string
     */
    public function toJson()
    {
        $objectArray = $this->toArray();
        return json_encode($objectArray);
    }

    /**
     * @param string $json
     *
     * @return $this
     */
    public function fromJson($jsonString)
    {
        $decoded = \GuzzleHttp\json_decode($jsonString);

        foreach($decoded as $key => $value) {
            $setter = "set" . ucfirst($this->propertyFromKey($key));
            if(method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }

        return $this;
    }

    /**
     * @param string $propertyName
     *
     * @return string
     */
    protected function keyFromProperty($propertyName)
    {
        return self::PREFIX . ltrim(strtolower(preg_replace('/[A-Z]/', '_$0', $propertyName)), '_');
    }

    /**
     * @param string $key
     *
     * @return string
     */
    protected function propertyFromKey($key)
    {
        $str = str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
        return $str;
    }
}