<?php

namespace Phpcast\TuyaCloudSdk\Tests\Cloud\Auth;

use Phpcast\TuyaCloudSdk\Cloud\Auth\AccessToken;
use Phpcast\TuyaCloudSdk\Kernel\ServiceContainer;
use Phpcast\TuyaCloudSdk\Tests\TestCase;

class AccessTokenTest extends TestCase
{
    public function testGetCredentials()
    {
        $app = new ServiceContainer([
            'grant_type' => '1',
        ]);
        $token = \Mockery::mock(AccessToken::class, [$app])->makePartial()->shouldAllowMockingProtectedMethods();

        $this->assertSame([
            'grant_type' => '1',
        ], $token->getCredentials());
    }
}
