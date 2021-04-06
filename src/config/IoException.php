<?php

namespace MethodRequest\config;

use Throwable;

class IoException extends \Exception
{
    const ERROR_CODE = [
        '1001' => 'Invalid Operation',
        '1002' => 'System Error',
        '1003' => 'Callback Message',
        '1004' => 'Invalid Print Type, Please Enter [json/xml]'
    ];

    const DEFAULT_CALLBACK_MESSAGE = 'NO_ERROR_CODE';

    protected static $msg = null;

    protected static $info = null;

    protected static $rCode = 0;

    // 后期根据自己的个性重新设置
    protected static $exception_flag = 'failure';

    public function __construct($message = "", $code = null, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        self::$msg = $message;
        self::$info = $code ?: self::DEFAULT_CALLBACK_MESSAGE;
        self::$rCode = $code ?: self::DEFAULT_CALLBACK_MESSAGE;
        $this->init();
    }

    protected function init()
    {
        $code = self::$rCode;
        if (in_array($code, self::ERROR_CODE) && $code != self::DEFAULT_CALLBACK_MESSAGE) {
            self::$rCode = self::ERROR_CODE[$code];
        }
    }

    protected static function returnMessageCode()
    {
        return self::$msg;
    }

    protected static function returnMessageInfo()
    {
        return self::$rCode;
    }

    public function returnException(): array
    {
        return [
            'exception' => [
                'flag' => self::$exception_flag,
                'code' => self::returnMessageCode(),
                'sub_code'  => 404,
                'message'  => self::returnMessageInfo(),
                'remark'   => '',
            ]
        ];
    }
}
