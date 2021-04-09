<?php

namespace Libs\Interface;

/**
 * config.yaml
 * dd.yaml
 * Interface ControllerInterface
 * @package Libs\Interface
 */
interface ControllerInterface
{
    /**
     * 设置一个常用参数
     * @param string $name
     */
    public function set(string $name): void;

    /**
     * 获取一个已经定义的服务
     * @param string $id
     * @return mixed
     */
    public function get(string $id);

    /**
     * 获取一个已经定义的配置参数
     * @param string $id
     * @return mixed
     */
    public function getParameter(string $id);

    /**
     * 获取一个已经定义的参数配置数组
     * @param array $ids
     * @return mixed
     */
    public function getParameters(array $ids);

    /**
     * 容器
     * @param string $name
     * @return mixed
     */
    public function container(string $name);

    /**
     * 数据库连接
     * @param string $defaultDbName
     * @return mixed
     */
    public function getConn(string $defaultDbName);

    /**
     * Redis连接
     * @param string $redisConnect
     * @return mixed
     */
    public function getRedis(string $redisConnect);
}
