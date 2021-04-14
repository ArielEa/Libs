<?php

namespace Libs\Interface;

interface SqlConnectionInterface
{
    public function getConn();

    public function createQueryBuilderName(string $alias);

    public function leftjoin($class, string $alias, string $model, string $condition );

    public function where(string $where);

    public function andwhere(string $where);

    public function setParameter(string $alias, $condition);

    public function setParameters(array $conditions);

    public function setFirstResult(int $limit);

    public function setMaxResult(int $limit);

    public function getQuery();

    public function getArrayResult(): array;

    public function getOneOrNullResult();
}
