<?php

function classloader( $class )
{
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $fileNames = array_unique(openpath());
    foreach ( $fileNames as $key => $value ) {
        $value = substr($value, 1);
        $file = __DIR__ . "/.." . $value;
        if (file_exists($file)) {
            include_once $file;
        }
    }
}
spl_autoload_register('classloader');
