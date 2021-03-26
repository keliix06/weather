<?php

namespace Tests\Unit;

use App\Location;
use Tests\TestCase;

class LocationTest extends TestCase
{
    /**
     * @test
     */
    public function we_can_get_a_location_for_an_ip()
    {
        $location = new Location('127.0.0.1');

        $location->get();

        $this->assertEquals('0', $location->latitude);
        $this->assertEquals('0', $location->longitude);
    }
}
