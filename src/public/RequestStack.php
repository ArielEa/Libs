<?php

namespace Libs\public;

use Libs\config\IoException;
use Libs\Interface\RequestStackInterface;

/**
 * 后期文件只能设置为可读，不可修改
 * 想要修改，那就继承
 * $_GET ['GET', 'POST']
 * $_POST
 * Class RequestStack
 * @package Libs\public
 */
class RequestStack implements RequestStackInterface
{
    protected $parameters = [];

    protected $method;

    /* RequestStack constructor.*/
    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        if (in_array($this->method, ['GET', 'PUT'])) {
            $this->parameters = $_GET;
        } else if ($this->method == 'POST') {
            $this->parameters = $_POST;
        }
    }

    /**
     * @param string $id
     * @return string
     */
    public function get(string $id): string
    {
        $array = $this->parameters;

        if (empty($array)) return  "";

        $keys = array_keys($array);

        return !in_array($id, $keys) ? "" : $array[$id];
    }

    public function post(string $id):string
    {
        $array = $this->parameters;

        if (empty($array)) return  "";

        $keys = array_keys($array);

        return !in_array($id, $keys) ? "" : $array[$id];
    }

    public function all(): array
    {
        return $this->parameters;
    }

    public function add(array $value): bool
    {
        if (count($value) != count($value, 1)) {
            throw new IoException("No Standard Array");
        }
        // 给参数添加新增的数据
        foreach ($value as $key => $val) {
            $this->parameters[$key] = $val;
            $_GET[$key] = $val;
        }
        return true;
    }

    public function remove(string $id): bool
    {
    }

    public function getKeys(): array
    {
    }

    public function getContent(): array
    {
    }

    public function getMethod(): string
    {
    }

    public function getSteam(): string
    {
    }

    public function replace(string $id):bool
    {
    }
}
