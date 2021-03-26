<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    /**
     * @test
     */
    public function homepage_loads_with_default_data()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('127.0.0.1'); // We expect to see the user's IP address
        $response->assertSee('Weather for Abidjan'); // We expect to see the city name we're getting weather for
    }

    /**
     * @test
     */
    public function if_there_is_an_ip_address_in_the_query_params_it_is_used()
    {
        $response = $this->get('/?ip_address=123.123.123.123');

        $response->assertStatus(200);
        $response->assertSee('123.123.123.123'); // We expect to see the user's IP address
        $response->assertSee('Weather for Beijing'); // We expect to see the city name we're getting weather for
    }
}
