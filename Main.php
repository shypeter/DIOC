<?php

include_once __DIR__ . "/autoload.php";

$di = new dev\Di();

$di->set("redis", function(){
    $redisObj = new dev\RedisDB([
        "host" => "127.0.0.1",
        "db" => "0",
        "port" => 6379,
    ]);
    return $redisObj;
});

$di->set("cache", function() use ($di) {
    $cacheObj = new dev\Cache([
        "connect" => "redis",
    ]);

    $cacheObj->setDi($di);
    return $cacheObj;
});

$cache = $di->get("cache");
$cache->get("Peter");
$cache->save("Paul", "senior", "999999");
$cache->delete("Tiger");