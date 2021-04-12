<?php
if(strpos($_SERVER['SCRIPT_NAME'], 'index.php') === false){
    echo "error";
    exit;
}

define('ROUTE_DIR', __DIR__."/../src/");
define("DEFAULT_CLASS", "\Libs\\");

$routingFile = file_get_contents(__DIR__."/route/route.yml");
// yaml解析，需要安装php yaml
$routing = yaml_parse($routingFile);

if (empty($routing)) {
    return false; // 后续编写页面
}
$default = array_column($routing, 'default');

if (count($default) == 0) {
    echo '1.error';die(null); // 如果没有设置默认的路由，不允许访问
} else if (count($default) > 1) {
    foreach ($default as $key => $value) {
        if ($value == true) {
            $trueList[] = $value;
        }
    }
    if (empty($trueList)) {
        echo "3.error";die(null); // 可有默认路由
    }
    if (!empty($trueList) && count($trueList) > 2) {
        echo "2.error";die(null); // 如果有两个默认路由true，不允许访问
    }
}
$defaultTargetRoute = "";
foreach ($routing as $kk => $vv) {
    if ($vv['default'] == true) {
        $defaultTargetRoute = "/{$vv['prefix']}/{$vv['method']}";
    }
}
$routeArr = $_SERVER['REQUEST_URI'];

/**
 * 第一个路由为目录地址, 第二个第三个才是
 * 第二个路由
 */
$phpmodel = php_sapi_name();
if ($routeArr == '/' || !in_array($phpmodel, ["cli-server", "fpm-fcgi"])) {
    $routeArr = $defaultTargetRoute;
}
$routeArr = substr($routeArr, 1);
if (strstr($routeArr, '?')) {
    $routeArr = substr($routeArr, 0,strripos($routeArr,"?"));
}

$routers = explode('/', $routeArr);

if (!isset($routers[0], $routing)) {
    echo '4.error';die(null); // 路由错误。 后期写错误页面
}
$route = $routing[$routers[0]];
$targetRoute = isset($routers[1]) ? $routers[1]."Action" : $route['method'];
$resource = $route['resource'];
$path = $route['path'];
$filePath = ROUTE_DIR.$path."/{$resource}";
$files = openpath($filePath);
if (empty($files)) {
    echo '5.error';die(null); // 文件Controller错误， 没有文件
};
$resourceClass = str_replace('/', '\\', $route['resource']);
foreach ($files['file_names'] as $k => $file) {
    $class = DEFAULT_CLASS.$path."\\".$resourceClass;
    $fileName  = substr($file,0,strrpos($file,"."));
    $model = $class.$fileName;
    $modelSet = new $model();
    $res = get_class_methods($modelSet);
    if (!in_array($targetRoute, $res) ) {
        echo "6.error";die(null); // 路由不存在， 路由错误页面，后期写
    }
    $modelSet->$targetRoute();
}
