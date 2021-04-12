<?php

namespace Libs\public;

use Libs\Interface\SqlConnectionInterface;

/**
 * 数据库连接类
 * Class SqlConnection
 * @package Libs\public
 */
class SqlConnection implements SqlConnectionInterface
{
    protected $conn;

    public function getConn()
    {
        $this->conn = new \Doctrine\DBAL\Driver\PDO\Connection(
            "mysql:localhost:3306;dbname=project", 'root', 'eternal673770'
        );
    }

    public function exec()
    {
    }
}
