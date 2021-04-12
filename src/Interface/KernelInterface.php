<?php

namespace Libs\Interface;

/**
 * 服务容器
 * Interface KernelInterface
 * @package Libs\Interface
 */
interface KernelInterface
{
    public function container();

    public function get(string $id): mixed;

    public function set(string $id): bool;

    public function getParameter(string $id): mixed;

    public function getParameters(...$id): array;
}
