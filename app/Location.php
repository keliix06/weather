<?php

namespace App;

use Illuminate\Support\Facades\Http;

class Location
{
    // I decided to make these public instead of using getters just to make it behave more like a model
    public $latitude = '';
    public $longitude = '';

    private $ipAddress;
    private $apiBase = 'https://freegeoip.app/json/';

    public function __construct(string $ipAddress)
    {
        $this->ipAddress = $ipAddress;
    }

    public function get()
    {
        $response = Http::get($this->apiBase . $this->ipAddress);
        $body = $response->json();
        $this->latitude = $body['latitude'];
        $this->longitude = $body['longitude'];
    }
}
