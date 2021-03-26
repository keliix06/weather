<?php

namespace Tests\Unit;

use App\Weather;
use Tests\TestCase;

class WeatherTest extends TestCase
{
    /**
     * @test
     */
    public function we_can_get_the_weather_for_a_given_location()
    {
        $weather = new Weather('0','0');
        $data = $weather->get();

        $this->assertTrue(is_array($data));
        $this->assertEquals('Abidjan', $data[0]['title']);
    }

    /**
     * @test
     */
    public function we_can_get_just_the_closest_location_info()
    {
        $weather = new Weather('0','0');
        $data = $weather->getClosest();

        $this->assertEquals('Abidjan', $data['title']);
    }
}
