<?php

namespace Phpcast\TuyaCloudSdk\Kernel\Transform;

class ExternalAction extends Property
{
    protected $type = 'externalAction';

    /**
     * Properties.
     *
     * @var array
     */
    protected $properties = [
        'executor_property',
        'action_executor',
    ];

    protected $required = [
        'executor_property',
        'action_executor',
    ];
}
