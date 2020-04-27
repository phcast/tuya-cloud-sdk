<?php

namespace Phpcast\TuyaCloudSdk\Kernel\Transform;

class DeviceAction extends Property
{
    protected $type = 'deviceAction';

    /**
     * Properties.
     *
     * @var array
     */
    protected $properties = [
        'entity_id',
        'executor_property',
        'action_executor',
    ];

    protected $required = [
        'entity_id',
        'executor_property',
        'action_executor',
    ];
}
