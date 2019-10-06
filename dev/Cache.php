<?php

namespace dev;

class Cache
{
    protected $di = null;
    protected $connection = null;
    protected $options = [];

    public function __construct($options = null)
    {
        $this->options = $options;
    }

    public function setDi($di)
    {
        $this->di = $di;
    }

    protected function connect()
    {
        $service = "memorycache";
        $options = $this->options;
        if (isset($options['connect'])) {
            $service = $options['connect'];
        }
        $obj = $this->di->get($service);
        return $obj;
    }

    public function get($key)
    {
        if (!is_object($this->connection)) {
            $this->connection = $this->connect();
        }
        return $this->connection->find($key);
    }

    public function save($key, $value, $lifetime)
    {
        if (!is_object($this->connection)) {
            $this->connection = $this->connect();
        }
        return $this->connection->save($key, $value, $lifetime);
    }

    public function delete($key)
    {
        if (!is_object($this->connection)) {
            $this->connection = $this->connect();
        }
        return $this->connection->delete($key);
    }
}
