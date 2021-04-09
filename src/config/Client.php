<?php

namespace MethodRequest\config;

$fromurl = "http://localhost:8081/";
if( $_SERVER['HTTP_REFERER'] == "" ) {
    header("Location:".$fromurl); exit;
}

/**
 * 集中处理请求
 * Class Client
 * @package MethodRequest\Qimen
 */
class Client
{
    private static $defaultUrl = "https://zhao.b2c.omnixdb.com/wmsSync";

    private static $header = "Content-type: application/xml";

    protected static $methodName = '';

    public function __construct( string $methodName )
    {
        self::$methodName = $methodName;
        return $this;
    }

    /**
     * @param string $data
     * @param string $requestType
     * @return bool|string
     * @throws \Exception
     */
    public function request( string $data, string $requestType = 'get' )
    {
        $params = MethodExplain::getInterfaceParams(self::$methodName);
    	$ch = curl_init();
        $header[] = self::$header;
        $sendUrl = self::$defaultUrl .'?'. http_build_query( $params );
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_URL, $sendUrl);
        curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        if (strtolower($requestType) == 'post') {
            curl_setopt ( $ch, CURLOPT_POST, 1 );
            curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
        }
        $return = curl_exec($ch);
        curl_close($ch);
        return $return;
    }
}
