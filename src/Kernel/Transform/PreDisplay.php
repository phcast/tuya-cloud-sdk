<?php

namespace Phpcast\TuyaCloudSdk\Kernel\Transform;

class PreDisplay extends Property
{
    /**
     * Messages type.
     *
     * @var string
     */
    protected $type = 'predisplay';

    /**
     * Properties.
     *
     * @var array
     */
    protected $properties = [
        'start',
        'end',
        'loops',
        'timezone_id',
    ];

    protected $required = [
        'start',
        'end',
        'loops',
        'timezone_id',
    ];
}