<?php

function server_exec()
{
    $indexPath = dirname(__FILE__).'/../web/public/index.php';

    define('LIBS_COMMAND', 'php -S '.DEFAULT_ADDRESS. " {$indexPath}");

    exec(LIBS_COMMAND);
}
