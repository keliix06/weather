<?php

namespace App;

use Illuminate\Support\Facades\Http;

/**
 * All of the interaction with the freegeoip Api lives here
 *
 * Class Location
 * @package App
 */
class Location
{
    // I decided to make these public instead of using getters just to make it behave more like a model
    public string $latitude = '';
    public string $longitude = '';

    private string $ipAddress;
    private string $apiBase = 'https://freegeoip.app/json/%s';

    public function __construct(string $ipAddress)
    {
        $this->ipAddress = $ipAddress;
    }

    public function get()
    {
        $response = Http::get(sprintf($this->apiBase, $this->ipAddress));
        $body = $response->json();
        $this->latitude = $body['latitude'];
        $this->longitude = $body['longitude'];
    }
}
