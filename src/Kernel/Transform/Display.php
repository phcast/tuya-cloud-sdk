<?php

namespace Phpcast\TuyaCloudSdk\Kernel\Transform;

class Display extends Property
{
    /**
     * Messages type.
     *
     * @var string
     */
    protected $type = 'display';

    /**
     * Properties.
     *
     * @var array
     */
    protected $properties = [
        'code',
        'operator',
        'value',
    ];

    protected $required = [
        'code',
        'operator',
        'value',
    ];
    
    public function toJsonArray()
    {
        $arr = [
            'code' => $this->get('code'),
            'operator' => $this->get('operator'),
            'value' => $this->get('value'),
        ];

        return arrayFilter($arr);
    }
}