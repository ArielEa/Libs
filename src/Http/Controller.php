<?php

namespace Libs\Http;

use Libs\Interface\ControllerInterface;
use Libs\public\RequestStack;
use Libs\public\SqlConnection;

/**
 * Class Controller
 * @package Libs\Http
 */
class Controller implements ControllerInterface
{
    public $redis;

    /**
     * @var SqlConnection
     */
    public $conn;

    public $container;

    /**
     * @var RequestStack
     */
    public $getRequest;

    public function __construct() {
        $this->getRequest = new RequestStack();
        $this->conn = new SqlConnection();
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

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function getRequest()
    {
        return $this;
    }
}
