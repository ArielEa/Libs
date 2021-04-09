<?php

namespace Libs\Http;

use Libs\Interface\ControllerInterface;

class Controller implements ControllerInterface
{
    public $redis;

    public $conn;

    public $container;

    public function __construct() {}

    public function __get(string $name)
    {
        // TODO: Implement __get() method.
    }

    public function set(string $name): void
    {
        // TODO: Implement set() method.
    }

    public function get(string $id)
    {
        // TODO: Implement get() method.
    }

    public function getParameter(string $id)
    {
        // TODO: Implement getParameter() method.
    }

    public function getParameters(array $ids)
    {
        // TODO: Implement getParameters() method.
    }

    public function getConn(string $defaultDbName)
    {
        // TODO: Implement getConn() method.
    }

    public function getRedis(string $redisConnect)
    {
        // TODO: Implement getRedis() method.
    }

    public function container(string $name)
    {
        // TODO: Implement container() method.
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }
}
