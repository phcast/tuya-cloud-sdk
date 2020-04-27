<?php

namespace Phpcast\TuyaCloudSdk\Kernel\Transform;

use Phpcast\TuyaCloudSdk\Kernel\Exceptions\InvalidArgumentException;

class PreConditions extends Property
{
    /**
     * Messages type.
     *
     * @var string
     */
    protected $type = 'preconditions';

    /**
     * Properties.
     *
     * @var array
     */
    protected $properties = [
        'cond_type',
        'display',
    ];

    protected $required = [
        'cond_type',
        'display',
    ];

    public function transformForRequest(): array
    {
        $data = parent::transformForRequest();

        return $this->toJsonArray($data);
    }

    protected function toJsonArray($data)
    {
        if(!$data['display'] instanceof PreDisplay){
            throw new InvalidArgumentException('display parmam must a PreDisplay class');
        }
        $data['display'] = $data['display']->transformForRequest();

        return $data;
    }
}