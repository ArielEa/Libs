<?php

namespace Libs\Http;

use Libs\Interface\ControllerInterface;

/**
 * Class Controller
 * @package Libs\Http
 */
class Controller implements ControllerInterface
{
    public $redis;

    public $conn;

    public $container;

    public function __construct() {
    }

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

    public function getConn(string $defaultDbName = 'product')
    {
        $this->conn = new \Doctrine\DBAL\Driver\PDO\Connection(
            "mysql:localhost:3306;dbname={$defaultDbName}", 'root', 'eternal673770'
        );
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
