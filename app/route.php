<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo 123;die;
});


die;
if(strpos($_SERVER['SCRIPT_NAME'], 'index.php') === false){
    echo "error";
    exit;
}

$file = file_get_contents(__DIR__."/config.yaml");

$routeArr = $_SERVER['REQUEST_URI'];

if (!empty($routeArr)) {
    $routeArr = substr($routeArr, 1);

    $routers = explode('/', $routeArr);

    print_r( $routers );
}
