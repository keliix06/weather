<?php

namespace App;

class User
{
    private $ipAddress;

    public function setIp(string $ipAddress)
    {
        $this->ipAddress = $ipAddress;
    }

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
