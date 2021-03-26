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
        return $weather->getClosest();
    }
}
