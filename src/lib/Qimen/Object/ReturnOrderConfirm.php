<?php

namespace MethodRequest\lib\Qimen\Object;

use MethodRequest\config\Client;
/**
 * Class ReturnOrderConfirm
 * @package MethodRequest\Qimen
 */
class ReturnOrderConfirm extends Client
{
    /**
     * 退货确认
     * @return array
     */
    public function ReturnConfirm(): string
    {
        $body = $this->body();

       try {
           $result = $this->request( $body, 'post' );
       } catch (\Exception $e) {
           $result = '请求失败' . $e->getMessage();
       }
//        print_r( $result );die(null);
        return $result;
    }

    /**
     * - {奇门类数据}
     * @return string
     */
    protected function body()
    {
        return <<<XML
<?xml version="1.0" encoding="utf-8"?>
<request>
  <returnOrder>
    <returnOrderCode>202103231067000003</returnOrderCode>
    <returnOrderId>202103231067000003</returnOrderId>
    <warehouseCode>shenyi_xdb</warehouseCode>
    <orderType>THRK</orderType>
    <expressCode>215764899803</expressCode>
    <senderInfo> 
      <name>黄肉肉</name>
      <mobile>18678787000</mobile>
      <province>山东省</province>
      <city>济南市</city>
      <detailAddress>舜华路街道经十路9777号国奥城3号楼6楼</detailAddress>
    </senderInfo>
  </returnOrder>
  <orderLines>
    <orderLine>
      <itemCode>SAJH049</itemCode>
      <inventoryType>ZP</inventoryType>
      <actualQty>1</actualQty>
      <batchs>
        <batch>
          <batchCode>SAJH049-001</batchCode>
          <productDate>2019-01-01 00:00:00</productDate>
          <expireDate>2021-01-01 00:00:00</expireDate>
          <actualQty>2</actualQty>
          <inventoryType>ZP</inventoryType>
        </batch>
      </batchs>
    </orderLine>
  </orderLines>
</request>

XML;
    }

    /**
     * - {万维云仓类数据}
     * @return string
     */
    protected function D_body ()
    {
      return <<<XML
<?xml version="1.0" encoding="utf-8"?>

<request>
  <returnOrder>
    <returnOrderCode>202001026460000022</returnOrderCode>
    <returnOrderId>202001026460000022</returnOrderId>
    <warehouseCode>WH42</warehouseCode>
    <orderType>THRK</orderType>
    <expressCode> </expressCode>
    <senderInfo> 
      <name>Test</name>
      <mobile>13900000000</mobile>
      <province>Test</province>
      <city>Test</city>
      <detailAddress>Test Address</detailAddress>
    </senderInfo>
  </returnOrder>
  <orderLines>
    
    <orderLine>
      <itemCode>FCCB003</itemCode>
      <inventoryType>ZP</inventoryType>
      <actualQty>1</actualQty>
      <batchCode>1811036</batchCode>
      <expireDate>2023-10-01 00:00:00</expireDate>
    </orderLine>

  </orderLines>
</request>
XML;
    }
}
//$result = ( new ReturnOrderConfirm(\MethodExplain::REFUND_CONFIRM) )->ReturnConfirm();
//print_r( $result );
//echo PHP_EOL;
