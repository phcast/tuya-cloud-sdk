<?php

namespace Phpcast\TuyaCloudSdk\Kernel\Transform;

use Phpcast\TuyaCloudSdk\Contracts\PropertyInterface;
use Phpcast\TuyaCloudSdk\Kernel\Exceptions\InvalidArgumentException;
use Phpcast\TuyaCloudSdk\Kernel\Traits\HasAttributes;

abstract class Property implements PropertyInterface
{
    use HasAttributes;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $to;

    /**
     * @var array
     */
    protected $properties = [];

    /**
     * @var array
     */
    protected $jsonAliases = [];

    public function __construct(array $attributes = [])
    {
        $this->setAttributes($attributes);
    }

    public function transformForRequest(): array
    {
        return $this->propertiesToArray([], $this->jsonAliases);
    }

    /**
     * @return array|mixed
     *
     * @throws InvalidArgumentException
     */
    protected function propertiesToArray(array $data, array $aliases = []): array
    {
        $this->checkRequiredAttributes();

        foreach ($this->attributes as $property => $value) {
            if (is_null($value) && !$this->isRequired($property)) {
                continue;
            }
            $alias = array_search($property, $aliases, true);

            $data[$alias ?: $property] = $this->get($property);
        }

        return $data;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * Magic getter.
     *
     * @param string $property
     *
     * @return mixed
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }

        return $this->getAttribute($property);
    }

    /**
     * Magic setter.
     *
     * @param string $property
     * @param mixed  $value
     *
     * @return Property
     */
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        } else {
            $this->setAttribute($property, $value);
        }

        return $this;
    }
}
