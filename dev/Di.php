<?php

namespace dev;

class Di
{
    protected $service = [];
    protected $instance = null;

    public function set($name, $definition)
    {
        $this->service[$name] = $definition;
    }

    public function get($name)
    {
        if (isset($this->service[$name])) {
            $definition = $this->service[$name];
        } else {
            throw new \Exception("Service '" . $name . " wasn't found in dependency injection container!");
        }

        if (is_object($definition)) {
            $this->instance = call_user_func($definition);
            var_dump($this->instance);
        }

        return $this->instance;
    }
}