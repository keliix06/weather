<?php

namespace App;

use Illuminate\Support\Facades\Http;

class Weather
{
    private $apiBase = 'https://www.metaweather.com/api/location/search/?lattlong=%s,%s';
    private $latitude;
    private $longitude;

    public function __construct(string $latitude, string $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function get()
    {
        $request = Http::get(sprintf($this->apiBase, $this->latitude, $this->longitude));
        return $request->json();
    }

    public function getClosest()
    {
        return $this->get()[0];
    }
}
