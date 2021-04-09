<?php

define('LIBS_START', microtime(true));

define('PROJECT_PORT', 9001);

define('HTTP_ADDRESS', 'localhost');

define("DEFAULT_ADDRESS", HTTP_ADDRESS.":".PROJECT_PORT);

$indexPath = dirname(__FILE__).'/../../web/public/index.php';

define('LIBS_COMMAND', 'php -S '.DEFAULT_ADDRESS. " {$indexPath}");
