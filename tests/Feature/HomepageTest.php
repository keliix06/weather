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
}
