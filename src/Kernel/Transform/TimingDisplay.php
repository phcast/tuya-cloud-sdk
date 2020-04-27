<?php

namespace Phpcast\TuyaCloudSdk\Kernel\Transform;

class TimingDisplay extends Property
{
    protected $type = 'timingdisplay';

    /**
     * Properties.
     *
     * @var array
     */
    protected $properties = [
        'date',
        'loops',
        'time',
        'timezone_id',
    ];

    protected $required = [];
}