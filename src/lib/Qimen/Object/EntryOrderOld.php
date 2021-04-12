<?php
namespace Libs\lib\Qimen\Object;

use Libs\config\Client;

/**
 * - [ 入库单模版 ]
 * Class EntryOrder
 * @package MethodRequest
 */
class EntryOrderOld extends Client
{
  public function confirm() : string
  {
    $body = $this->body();

    $result = $this->request( $body, 'post');

    print_r( $result );die;

    return $result;
  }

  /**
   * 大贸仓库部分
   */
  public function body()
  {
    $body = <<<XML
<?xml version="1.0" encoding="UTF-8"?><root>
  <entryOrder>
    <entryOrderCode>E2021033080282</entryOrderCode>
    <entryOrderId>E2021033080282</entryOrderId>
    <warehouseCode>shenyi_xdb</warehouseCode>
    <ownerCode>ROG001WDT</ownerCode>
    <entryOrderType>CGRK</entryOrderType>
    <outBizCode>RK2103180955</outBizCode>
    <confirmType>1</confirmType>
    <status>FULFILLED</status>
    <operateTime>2021-03-18 19:01:32</operateTime>
    <remark>年前货拉拉到货入库-2，已出库</remark>
  </entryOrder>
  <orderLines>
    <orderLine>
      <itemCode>FBAV046</itemCode>
      <inventoryType>ZP</inventoryType>
      <actualQty>899</actualQty>
      <batchs>
        <batch>
          <batchCode>实物已发走</batchCode>
          <productDate>2021-01-01 00:00:00</productDate>
          <expireDate>2024-01-01 00:00:00</expireDate>
          <actualQty>2</actualQty>
          <inventoryType>ZP</inventoryType>
        </batch>
      </batchs>
    </orderLine>
    <orderLine>
      <itemCode>SBAV003</itemCode>
      <inventoryType>ZP</inventoryType>
      <actualQty>900</actualQty>
      <batchs>
        <batch>
          <batchCode>实物已发走</batchCode>
          <productDate>2021-01-01 00:00:00</productDate>
          <expireDate>2024-01-01 00:00:00</expireDate>
          <actualQty>2</actualQty>
          <inventoryType>ZP</inventoryType>
        </batch>
      </batchs>
    </orderLine>
  </orderLines>
</root>
XML;
    return $body;
  }

  /**
   * 跨境仓部分
   */
  public function D_body()
  {
    $body = <<<XML
<?xml version="1.0" encoding="utf-8"?>

<request> 
  <entryOrder> 
    <entryOrderCode>E2020082044083</entryOrderCode>  
    <warehouseCode>WH42</warehouseCode>  
    <entryOrderId>DB0010000295</entryOrderId>  
    <entryOrderType>DBRK</entryOrderType>  
    <outBizCode>purchase_confirm_DB0010000295</outBizCode>  
    <confirmType>0</confirmType>  
    <status>FULFILLED</status> 
  </entryOrder>  
  <orderLines> 
  
    <orderLine> 
      <itemCode>FAJH016</itemCode>  
      <itemId>SKU0001002924</itemId>  
      <inventoryType>ZP</inventoryType>  
      <actualQty>100000</actualQty>  
      <batchCode>AAAA</batchCode>
    </orderLine>
    
  </orderLines>
</request>
XML;
    return $body;
  }
}
//(new EntryOrder(\MethodExplain::ENTRY_CONFIRM)) -> confirm();
