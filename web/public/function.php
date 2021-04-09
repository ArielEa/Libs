<?php

if (!function_exists('convertMes'))
{
    function convertMes( $data, $root = true, $xmlType = "" )
    {
        $str = "";
        if( $root ) {
            $str .= "<request>";
        }
        foreach($data as $key => $val) {
            if( is_array( $val ) ) {
                $child = convertMes( $val, false, $xmlType );

                if ( $xmlType != '' ) {
                    if (is_numeric( $key )) {
                        $key = $xmlType;
                    }
                }
                $str .= "<$key>{$child}</$key>";
            } else {
                $str .= "<$key>{$val}</$key>";
            }
        }
        if( $root ) {
            $str .= "</request>";
        }
        return $str;
    }
}

if (!function_exists('convertXml'))
{
    function convertXml( $param )
    {
        return "<?xml version=\"1.0\" encoding=\"utf-8\"?><response>". convertMes( $param, false ) . "</response>";
    }
}

if (!function_exists('xmlParsing'))
{
    function xmlParsing( $xml )
    {
        libxml_disable_entity_loader(true);
        $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $values;
    }
}


if (!function_exists('lib_dump')) {
    /**
     * - i.e. 断点调试
     * - e.g.
     *
     * @param mixed ...$args
     */
    function lib_dump(...$args)
    {
        $trace = debug_backtrace();
        dump($trace[0]['file'].': '.$trace[0]['line'], ...$args);
        die;
    }
}
