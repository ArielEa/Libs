<?php

namespace Libs\Interface;

interface RequestStackInterface
{
    public function get(string $id):string;

    public function post(string $id): string;

    public function all(): array;

    public function add(array $value): bool;

    public function remove(string $id): bool;

    public function getContent(): array;

    public function getMethod(): string;

    public function getSteam(): string;

    public function getKeys(): array;

    public function replace(string $id): bool;
}
