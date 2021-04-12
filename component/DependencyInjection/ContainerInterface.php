<?php

namespace Libs\component\DependencyInjection;

/**
 * Libs 获取服务类或者服务配置
 * Interface ContainerInterface
 * @package MethodRequest\component\DependencyInjection
 */
interface ContainerInterface
{
    const EXCEPTION_ON_INVALID_REFERENCE = 1;
    const NULL_ON_INVALID_REFERENCE = 2;
    const IGNORE_ON_INVALID_REFERENCE = 3;

    public function get(string $id, int $invalidBehavior = self::EXCEPTION_ON_INVALID_REFERENCE);

    public function getParameter(string $name);

    public function set(string $id, $service);

    public function has(string $id);

    public function hasParameter(string $name);

    public function setParameter(string $name, $value);

    public function initialized(string $id);
}
