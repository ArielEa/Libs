<?php
if(strpos($_SERVER['SCRIPT_NAME'], 'index.php') === false){
    echo "error";
    exit;
}

$routingFile = file_get_contents(__DIR__."/route/route.yml");

$routing = yaml_parse($routingFile);

require_once __DIR__."/../src/openPath.php";

require_once __DIR__."/../vendor/autoload.php";

$files = openpath(__DIR__."/../src/Http/ApiController/Controllers");

$routeArr = $_SERVER['REQUEST_URI'];

/**
 * 第一个路由为目录地址, 第二个第三个才是
 */
if (!empty($routeArr)) {
    $routeArr = substr($routeArr, 1);

    $routers = explode('/', $routeArr);

    lib_dump( $routers, $routing );
}
