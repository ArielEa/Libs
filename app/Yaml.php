<?php

abstract class Yaml
{
    const DIR_NAME = __DIR__;

    const DEFAULT_PATH = 'route/';

    public static function explain(string $filename = '', string $defaultPath = self::DEFAULT_PATH,  bool $returnType = false): array
    {
        $routingFile = file_get_contents(self::DIR_NAME."/".$defaultPath."/route.yml");

        return yaml_parse($routingFile);
    }
}
