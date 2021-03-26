<?php

namespace App;

class User
{
    private $ipAddress;

    public function setIp($ipAddress)
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
}
