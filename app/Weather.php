<?php

namespace App;

use Illuminate\Support\Facades\Http;

/**
 * All of the interaction with the metaweather API lives here
 *
 * Class Weather
 * @package App
 */
class Weather
{
    private $locationSearch = 'https://www.metaweather.com/api/location/search/?lattlong=%s,%s';
    private $location = 'https://www.metaweather.com/api/location/%s/';
    private string $latitude;
    private string $longitude;

    public function __construct(string $latitude, string $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function get()
    {
        $location = $this->getClosestLocation();
        $request = Http::get(sprintf($this->location, $location['woeid']));
        $json = $request->json();

        // In a more complex app I would turn this in to a model and return that. Leaving it as a simple array here.
        return [
            'title' => $json['title'],
            'weather' => $json['consolidated_weather']
        ];
    }

    // Only leaving these public because I have them tested, and in a real world app there may be things that want to access
    public function getLocations()
    {
        $request = Http::get(sprintf($this->locationSearch, $this->latitude, $this->longitude));
        return $request->json();
    }

    public function getClosestLocation()
    {
        return $this->getLocations()[0];
    }
}
