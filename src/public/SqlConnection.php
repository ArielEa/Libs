<?php

namespace Libs\public;

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
use Libs\Interface\SqlConnectionInterface;

/**
 * 数据库连接类
 * Class SqlConnection
 * @package Libs\public
 */
class SqlConnection implements SqlConnectionInterface
{
    protected $connector;

    public function getConn()
    {
        $config = new Configuration();
        $doctrine = DriverManager::getConnection([], $config);

        $this->connector = new \Doctrine\DBAL\Driver\PDO\Connection(
            "mysql:localhost:3306;dbname=project", 'root', 'eternal673770'
        );
    }

    public function createQueryBuilderName(string $alias)
    {

    }

    public function leftjoin($class, string $alias, string $model, string $condition )
    {

    }

    public function where(string $where)
    {

    }

    public function andwhere(string $where)
    {

    }

    public function setParameter(string $alias, $condition)
    {

    }

    public function setParameters(array $conditions)
    {

    }

    public function setFirstResult(int $limit)
    {

    }

    public function setMaxResult(int $limit)
    {

    }

    public function getQuery()
    {

    }

    public function getArrayResult(): array
    {

    }

    public function getOneOrNullResult()
    {

    }

    public function exec()
    {
    }
}
