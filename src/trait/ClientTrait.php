<?php

namespace MethodRequest\trait;

Trait ClientTrait
{
    public function convertMes( $data, $root = true, $xmlType = "" )
    {
        $str = "";
        if( $root ) $str .= "<request>";
        foreach($data as $key => $val) {
            if( is_array( $val ) ) {
                $child = $this->convertMes( $val, false, $xmlType );

                if ( $xmlType != '' ) if (is_numeric( $key )) $key = $xmlType;

                $str .= "<$key>{$child}</$key>";
            } else {
                $str.= "<$key>{$val}</$key>";
            }
        }
        if( $root ) $str .= "</request>";
        return $str;
    }

    /**
     * @param $param
     * @return string
     */
    public function convertXml( $param )
    {
        return "<?xml version=\"1.0\" encoding=\"utf-8\"?><response>". $this->convertMes( $param, false ) . "</response>";
    }

    /**
     * XML data Parsing.
     * @param $xml
     * @return mixed
     */
    public function xmlParsing( $xml )
    {
        libxml_disable_entity_loader(true);
        $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $values;
    }
}
