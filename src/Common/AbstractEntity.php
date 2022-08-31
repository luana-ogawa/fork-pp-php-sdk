<?php

namespace MercadoPago\PP\Sdk\Common;

/**
 * Class AbstractEntity
 *
 * @package MercadoPago\PP\Sdk\Common
 */
abstract class AbstractEntity implements \JsonSerializable
{
    /**
     * @param $name
     *
     * @return mixed
     */
    public function get($name)
    {
        return $this->{$name};
    }

    /**
     * @param $name
     * @param $value
     *
     */
    public function set($name, $value)
    {
        if ($this->propertyExists($name)) {
            $this->{$name} = $value;
        }
    }

    /**
     * @param $property
     *
     * @return bool
     */
    protected function propertyExists($property)
    {
        return array_key_exists($property, get_object_vars($this));
    }

    /**
     * Fill entity from data with nested object creation
     *
     * @param $entity
     * @param $data
     */
    protected function fillFromArray($entity, $data)
    {
        if ($data) {
            foreach ($data as $key => $value) {
                if (!is_null($value)) {
                    if (is_array($value)) {
                        $className = 'MercadoPago\\PP\\Sdk\\Entity\\' . $this->camelize($key);
                        if (class_exists($className, true)) {
                            $entity->set($key, new $className);
                            $entity->fillFromArray($this->{$key}, $value);
                        } else {
                            $entity->set($key, json_decode(json_encode($value)));
                        }
                        continue;
                    }
                    $entity->set($key, $value);
                }
            }
        }
    }

    /**
     * @param        $input
     * @param string $separator
     *
     * @return mixed
     */
    protected function camelize($input, $separator = '_')
    {
        return str_replace($separator, '', ucwords($input, $separator));
    }

    /**
     * Get an array from an object
     *
     * @param null $attributes
     *
     * @return array
     */
    public function toArray($attributes = null)
    {
        $result = null;

        if (is_null($attributes)) {
            $result = get_object_vars($this);
        } else {
            $result = array_intersect_key(get_object_vars($this), $attributes);
        }

        return $result;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
