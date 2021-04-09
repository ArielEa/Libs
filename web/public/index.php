<?php

date_default_timezone_set("Asia/Shanghai");

header("Content-Type:text/html;charset=utf-8");

define("BASE_DIR_PATH", dirname(__FILE__)."/../../");

require_once __DIR__."/../../vendor/autoload.php";

require_once __DIR__."/../../app/route.php";
