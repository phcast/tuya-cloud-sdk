<?php

namespace Phpcast\TuyaCloudSdk\Tests;

use Phpcast\TuyaCloudSdk\Cloud\Application;
use Phpcast\TuyaCloudSdk\Factory;

class FactoryTest extends TestCase
{
    public function testStaticCall()
    {
        $cloud = Factory::cloud([
            'client_id' => 'corpid@123',
        ]);

        $cloudFromMake = Factory::make('cloud', [
            'client_id' => 'corpid@123',
        ]);

        $this->assertInstanceOf(Application::class, $cloud);
        $this->assertInstanceOf(Application::class, $cloudFromMake);

        $expected = [
            'client_id' => 'corpid@123',
        ];
        $this->assertArraySubset($expected, $cloud['config']->all());
        $this->assertArraySubset($expected, $cloudFromMake['config']->all());

        $this->assertInstanceOf(
            Application::class,
            Factory::cloud(['client_id' => 'appid@456'])
        );
    }
}
