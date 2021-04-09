<?php

namespace Libs\lib\Qimen;


final class ObjectInstance
{
    protected static $requestInterface;

    public static function send( string $postType, RequestInterface $request)
    {
        self::$requestInterface[$postType] = $request;
    }

    public static function get( string $postType )
    {
        return self::$requestInterface[$postType];
    }

    public static function has( string $postType)
    {
        return isset( self::$requestInterface[$postType] ) ? true : false;
    }
}
