<?php

if (!function_exists('errorReport'))
{
    function errorReport()
    {
        return json_encode("", JSON_UNESCAPED_UNICODE);
    }
}
