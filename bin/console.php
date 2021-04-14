<?php

abstract class console
{
    public static function serve(string $command, int $port = PROJECT_PORT)
    {
        require_once __DIR__."/{$command}.php";
        server_exec();
    }
}
