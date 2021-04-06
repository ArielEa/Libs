<?php

namespace MethodRequest\lib\Qimen\Object;

use MethodRequest\config\Client;

/**
 * Delivery Batch Callback.
 * Class DeliveryConfirm
 * @package MethodRequest\Call
 */
class DeliveryConfirm extends Base
{
    private $courierCode = 'YTO';

    private $trackingNO = 'YT51111217440';

    private  $warehouseCode = 'shenyi_xdb';

    private $deliveryCodes = [
        210329220000004
    ];

    public function request(array $rows)
    {
    }

    public function deliveryConfirm(): bool
    {
        $data = $this->deliveryCodes;

        for ($i = 0; $i < count($data); $i++) {
            $deliveryCode = $data[$i];

            $xml = $this->tradeXMLBody($deliveryCode, $this->trackingNO);
            echo $xml;die;
            try {
                $result = $this->request( $xml, 'post' );
            } catch ( IoException $e ) {
                // \IoException 根据自己的要求重新异常报错
                $result = '请求失败: '. $e->getMessage();
            }
            $count = $i + 1;

            echo  "{$count}--->发货单：{$deliveryCode} 请求结果---->{$result}". PHP_EOL;
        }
        return true;
    }

    /**
     * 大贸类型
     * @param string $code
     * @param string $trackingNo
     * @return string
     */
      public function tradeXMLBody( string $code, string $trackingNo ): string
      {
          $body = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<request>
  <deliveryOrder>
    <deliveryOrderCode>{$code}</deliveryOrderCode>
    <deliveryOrderId>{$code}</deliveryOrderId>
    <warehouseCode>{$this->warehouseCode}</warehouseCode>
    <orderType>JYCK</orderType>
    <outBizCode>{$code}</outBizCode>
    <orderConfirmTime>2019-12-09 14:50:00</orderConfirmTime>
  </deliveryOrder>
  <packages>
    <package>
      <logisticsCode>{$this->courierCode}</logisticsCode>
      <expressCode>{$trackingNo}</expressCode>
      <weight>0.000</weight>
      <extendProps>
        <postage>0.0000</postage>
      </extendProps>
      <items>
        <item>
          <itemCode>FBAV149</itemCode>
          <quantity>1</quantity>
        </item>
      </items>
    </package>
  </packages>
  <orderLines>
    <orderLine>
      <itemCode>FBAV149</itemCode>
      <inventoryType>ZP</inventoryType>
      <actualQty>1</actualQty>
      <planQty>1</planQty>
      <batchCode>H20AA</batchCode>
      <batchs>
        <batch>
          <batchCode>SAJH049-001</batchCode>
          <expireDate>2021-08-07 00:00:00</expireDate>
          <actualQty>2</actualQty>
          <inventoryType>ZP</inventoryType>
        </batch>
      </batchs>
    </orderLine>

  </orderLines>
</request>

XML;
        return $body;
      }

    /**
     * 跨境类型
     * @return string
     */
      private function crossXMLBody(): string
      {
          $body = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<request>
    <deliveryOrder>
        <deliveryOrderCode>20200910199975234</deliveryOrderCode>
        <deliveryOrderId>DO0010370620</deliveryOrderId>
        <warehouseCode>WH42</warehouseCode>
        <orderType>JYCK</orderType>
        <outBizCode>DO=DO0010370620 stock out confirm</outBizCode>
        <confirmType>0</confirmType>
    </deliveryOrder>
    <packages>
        <package>
            <logisticsCode>ZTO</logisticsCode>
            <logisticsName>中通国际快递</logisticsName>
            <expressCode>77120894068754</expressCode>
            <weight>0.43</weight>
            <items>
                <item>
                    <itemCode>FCCB001</itemCode>
                    <itemId>clientsku-895803d8-413c-415c-b908-30b7e1d9ff46</itemId>
                    <quantity>1</quantity>
                </item>
            </items>
        </package>
    </packages>
    <orderLines>
        <orderLine>
            <itemCode>FCCH100</itemCode>
            <itemId>SKU0001007366</itemId>
            <inventoryType>ZP</inventoryType>
            <planQty>1</planQty>
            <actualQty>1</actualQty>
            <batchCode>G912</batchCode>
            <productDate>2020-04-11 00:00:00</productDate>
            <expireDate>2023-04-11 00:00:00</expireDate>
        </orderLine>
        
    </orderLines>
</request>
XML;
          return $body;
      }
}
// php DeliveryConfirm.php
/**
 * @params $argv
 * 0 -> file name
 * 1 -> courier code
 * 2 -> tracking no
 * 3 -> warehouse no
 */
//$Explain = \MethodExplain::DELIVERY_CONFIRM;
//if (count($argv) > 1) {
//    $deliveryConfirmClass = new DeliveryConfirm($Explain, $argv[1]??'', $argv[2]??'', $argv[3]??'' );
//} else {
//    $deliveryConfirmClass = new DeliveryConfirm(\MethodExplain::DELIVERY_CONFIRM);
//}
//$deliveryConfirmClass->deliveryConfirm();
