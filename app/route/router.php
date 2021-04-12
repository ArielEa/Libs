<?php

abstract class router
{
    private static $uri_factory = [];

    private static $uri_id = [];

    private static $uri_combine = [];

    public static function get(string $uri, $action)
    {
        self::$uri_factory[$uri] = $action;
        self::$uri_id[] = $uri;
        self::$uri_combine[] = [
            'method' => 'GET',
            'uri'   => $uri,
            'uriFactory' => self::getMethod($uri)
        ];
    }

    public static function post(string $uri, $action)
    {
        self::$uri_factory[$uri] = $action;
        self::$uri_id[] = $uri;
        self::$uri_combine[] = [
            'method' => 'POST',
            'uri'   => $uri,
            'uriFactory' => self::getMethod($uri)
        ];
    }

    public static function put(string $uri, $action)
    {
        self::$uri_factory[$uri] = $action;
        self::$uri_id[] = $uri;
        self::$uri_combine[] = [
            'method' => 'PUT',
            'uri'   => $uri,
            'uriFactory' => self::getMethod($uri)
        ];
    }

    /**
     * 暂不使用
     * @param string $uri
     * @param $action
     */
    public static function any(string $uri, $action)
    {
        self::$uri_factory[$uri] = $action;
        self::$uri_id[] = $uri;
        self::$uri_combine[] = [
            'method' => 'ANY',
            'uri'   => $uri,
            'uriFactory' => self::getMethod($uri)
        ];
    }

    public static function getMethod(string $id)
    {
        $uri = self::$uri_factory[$id];
        return $uri();
    }

    public static function all()
    {
        $uriId = self::$uri_id;
        $uriList = [];
        foreach ($uriId as $id) {
            $uri = self::getMethod($id)->getUri();
            $uriList[] = $uri;
        }
        return $uriList;
    }
}
