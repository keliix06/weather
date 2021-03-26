<?php

namespace Tests\Unit;

use App\Location;
use App\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * @test
     */
    public function a_users_ip_can_be_set()
    {
        $user = new User();
        $user->setIp('123.123.123.123');

        $this->assertEquals('123.123.123.123', $user->getIp());
    }

    /**
     * @test
     */
    public function ip_address_defaults_to_users_ip_if_not_provided()
    {
        $user = new User();
        // 127.0.0.1 is set as REMTE_ADDR in phpunit.xml
        $this->assertEquals('127.0.0.1', $user->getIp());
    }

    /**
     * @test
     */
    public function a_user_can_have_a_location()
    {
        $user = new User();
        $location = $user->location();

        $this->assertEquals('0', $location->latitude);
        $this->assertEquals('0', $location->longitude);
        $this->assertInstanceOf(Location::class, $location);
    }
}
