<?php

namespace MethodRequest\config;

abstract class MethodExplain
{
    const REFUND_CONFIRM = 'refund';

    const ENTRY_CONFIRM = 'entry';

    const DELIVERY_CONFIRM = 'delivery';

    const OUT_STOCK_CONFIRM = 'stockout';

    private static $MethodCombineArr = [
        self::REFUND_CONFIRM => 'returnorder.confirm',
        self::ENTRY_CONFIRM => 'entryorder.confirm',
        self::DELIVERY_CONFIRM => 'deliveryorder.confirm',
        self::OUT_STOCK_CONFIRM => 'stockout.confirm'
    ];

    public static $params = [
        'app_key'       => 'testerp_appkey',
        'customerId'    => 'c12222',
        'format'        => 'xml',
        'method'        => '',
        'sign'          => '13C7B82226A6E396AFBA211DFBCB32F8',
        'sign_method'   => 'md5',
        'timestamp'     => '2020-10-20 15:15:00',
        'v'             => 2.0,
        'version'       => 1
    ];

    /**
     * 获取KEY
     * @param string $key
     * @return string
     * @throws Exception
     */
    public static function getMethodName(string $key): string
    {
        if (isset(self::$MethodCombineArr[$key])) {
            return self::$MethodCombineArr[$key];
        }
        throw new IoException("Invalid Key", 1001);
    }

    /**
     * 接口传递值
     * @param string $key
     * @return array
     * @throws Exception
     */
    public static function getInterfaceParams(string $key): array
    {
        if (!isset(self::$MethodCombineArr[$key])) {
           throw new \Exception("Invalid Key");
        }
        $params = self::$params;
        $params['method'] = self::$MethodCombineArr[$key];
        return $params;
    }
}
