<?php

namespace dev;

class RedisDB
{
    protected $di = null;
    protected $options = [];

    public function __construct($options = null)
    {
        $this->options = $options;
    }

    public function setDi($di)
    {
        $this->di = $di;
    }

    public function find($key)
    {
        var_dump("redis find key:{$key}");
    }

    public function save($key, $value, $lifetime)
    {
        var_dump("redis save key:{$key}, value:{$value}, lifetime:{$lifetime}");
    }

    public function delete($key)
    {
        var_dump("redis delete key:{$key}");
    }
}
