<?php

namespace MethodRequest\Qimen;

// 自动加载
//include_once "./src/autoload.php";

require 'vendor/autoload.php';

use MethodRequest\config\IoException;
use MethodRequest\config\MethodExplain;
use MethodRequest\lib\Qimen\RequestFactory;
use MethodRequest\public\IoResponse;
use MethodRequest\trait\LanguageTrait;

class script
{
    use LanguageTrait;

    protected static $printType = 'json'; // 如果没有print参数默认类型是json

    protected static $argument = '--status'; // 单据类型

    protected static $print = '--print'; // 打印类型

    protected $methodName;

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        try {
            $value = $_GET[self::$argument];
            $this->methodName = MethodExplain::getMethodName($value);
            if (isset($_GET[self::$print])) {
                if (!in_array($_GET[self::$print], $this->printArr)) {
                    throw new IoException("无效的输出模式， 请重新确认需要输出的模式", 1004);
                }
                self::$printType = $_GET[self::$print];
            }
        } catch (IoException $e) {
            return new IoResponse(json_encode($e->returnException(), JSON_UNESCAPED_UNICODE), true);
        }
        return true;
    }

    public function request()
    {
        $handle = new RequestFactory();
        $handle->handle();

        die;
        return new IoResponse($this->methodName);
    }
}
parse_str(implode('&', array_slice($argv, 1)), $_GET);

(new script())->request();
