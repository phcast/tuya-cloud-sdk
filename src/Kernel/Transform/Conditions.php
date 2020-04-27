<?php

namespace Phpcast\TuyaCloudSdk\Kernel\Transform;

use Phpcast\TuyaCloudSdk\Kernel\Exceptions\InvalidArgumentException;

class Conditions extends Property
{
    const ENTITY_TYPE_EQUIPMENT = 1;
    const ENTITY_TYPE_OUT = 15;
    const ENTITY_TYPE_WEATHER = 3;
    const ENTITY_TYPE_TIMING = 6;
    /**
     * Messages type.
     *
     * @var string
     */
    protected $type = 'conditions';

    /**
     * Properties.
     *
     * @var array
     */
    protected $properties = [
        'entity_type',
        'entity_id',
        'display',
        'order_num',
    ];

    protected $required = [
        'entity_type',
        'display',
        'order_num',
    ];


    public function transformForRequest(): array
    {
        $data = parent::transformForRequest();

        return $this->toJsonArray($data);
    }

    public function toJsonArray($data)
    {
        if(!($this->get('display') instanceof Display || $this->get('display') instanceof TimingDisplay)){
            throw new InvalidArgumentException('display param must construct from Dispaly or TimingDisplay class');
        }
        $arr = [
            'entity_type' => $this->get('entity_type'),
            'entity_id' => $this->get('entity_id'),
            'display' => $this->get('display')->transformForRequest(),
            'order_num' => $this->get('order_num'),
        ];
        $entity_type = $this->get('entity_type');
        if(in_array($entity_type,[self::ENTITY_TYPE_EQUIPMENT,self::ENTITY_TYPE_OUT,self::ENTITY_TYPE_TIMING])){
            $entity_id = $this->get('entity_id');
            if($entity_type == self::ENTITY_TYPE_TIMING){
                $entity_id = 'timer';
            }
            return $arr + [
                    'entity_id' => $entity_id,
                ];
        }

        return $arr;
    }
}