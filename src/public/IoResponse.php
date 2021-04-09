<?php

namespace Libs\public;

class IoResponse
{
    protected static $config = [
        'code' => 200,
        'msg' => '',
        'headers' => [
            'Content-Type' => 'text/json'
        ]
    ];

    protected static $exception = [
        'code' => 400,
        'msg' => '',
        'headers' => [
            'Content-Type' => 'text/json'
        ]
    ];

    public function __construct( string $message = null, bool $exception = false)
    {
        $param = $exception ? self::$exception : self::$config;
        $param['msg'] = $message;
        echo json_encode($param, JSON_UNESCAPED_UNICODE);
        die(null);
    }
}
