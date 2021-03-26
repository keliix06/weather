<?php

namespace App;

/**
 * The user is the hub of the app. The user is responsible for having all of the data. The IP address, the location, and
 * the weather.
 *
 * Class User
 * @package App
 */
class User
{
    private string $ipAddress;

    public function setIp(string $ipAddress)
    {
        $this->ipAddress = $ipAddress;
    }

    /**
     * Default to the user's IP address unless one has been supplied
     * @return string
     */
    public function getIp()
    {
        return $this->ipAddress ?? $_SERVER['REMOTE_ADDR'];
    }

    /**
     * Note if running Docker... your default IP address will not be publically accessible, and you
     * will get 0, 0 for lat,long
     *
     * @return array
     */
    public function location()
    {
        $location = new Location($this->getIp());
        $location->get();
        return $location;
    }

    public function weather()
    {
        $location = $this->location();
        $weather = new Weather($location->latitude, $location->longitude);
        return $weather->get();
    }
}
