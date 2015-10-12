<?php

namespace Prophetz\Memcached;

class Memcached
{
    /**
     * @var \Memcached
     */
    private $memcached;
    /**
     * @var bool
     */
    private $isDisable;

    /**
     * @return boolean
     */
    public function getIsDisable()
    {
        return $this->isDisable;
    }

    /**
     * @param boolean $isDisable
     */
    public function setIsDisable($isDisable)
    {
        $this->isDisable = $isDisable;
    }

    public function __construct()
    {
        $this->memcached = new \Memcached();
    }

    public function setServers($servers)
    {
        $this->memcached->addServers($servers);
    }

    public function get($key)
    {
        if ($this->isDisable) {
            $value = false;
        } else {
            $value = $this->memcached->get($key);
        }

        return $value;
    }

    public function set($key, $value, $expiration)
    {
        return $this->memcached->set($key, $value, $expiration);
    }
}