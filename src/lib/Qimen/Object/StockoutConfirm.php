<?php

namespace MethodRequest\lib\Qimen\Object;

use MethodRequest\config\Client;
/**
 * Class stockoutConfirm
 * @package MethodRequest\Qimen
 */
class StockoutConfirm extends Client
{
	public function stockout(): string
    {
		$body = $this->body();

        $result = $this->request($body, 'post');

		return $result;
	}

	public function body()
  {
		$body = <<<XML
<?xml version="1.0" encoding="utf-8"?>

<request>
  <deliveryOrder>
    <deliveryOrderCode>A202103031693</deliveryOrderCode>
    <deliveryOrderId>A202103031693</deliveryOrderId>
    <warehouseCode>WarehouseNo1</warehouseCode>
    <outBizCode>A202103031693</outBizCode>
    <orderType>PTCK</orderType>
    <status>DELIVERED</status>
    <orderConfirmTime>2020-03-05 17:47:00</orderConfirmTime>
  </deliveryOrder>
  <orderLines>

    <orderLine>
      <itemCode>FBAV151</itemCode>
      <inventoryType>ZP</inventoryType>
      <actualQty>348</actualQty>
      <batchs></batchs>
    </orderLine>
    
    <orderLine>
      <itemCode>FBAV052</itemCode>
      <inventoryType>ZP</inventoryType>
      <actualQty>3000</actualQty>
      <batchs></batchs>
    </orderLine>

  </orderLines>
</request>

XML;
		return $body;
	}

  public function D_body()
  {
    $data = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<request>
  <deliveryOrder>
    <deliveryOrderCode>A2019120976306</deliveryOrderCode>
    <deliveryOrderId>A2019120976306</deliveryOrderId>
    <warehouseCode>WH42</warehouseCode>
    <outBizCode>A2019120976306</outBizCode>
    <orderType>PTCK</orderType>
    <status>DELIVERED</status>
    <orderConfirmTime>2019-06-06 17:47:00</orderConfirmTime>
  </deliveryOrder>
  <packages>
    <package>
      <items>
       
        <item>
          <itemCode>FBAV125</itemCode>
          <quantity>1000</quantity>
        </item>
       
        <item>
          <itemCode>FCAL049</itemCode>
          <quantity>2000</quantity>
        </item>

        <item>
          <itemCode>FCAL050</itemCode>
          <quantity>2000</quantity>
        </item>

      </items>
    </package>
  </packages>
  <orderLines>

    <orderLine> 
      <itemCode>FCAL049</itemCode>  
      <itemId>SKU0009970200</itemId>  
      <actualQty>2000</actualQty>  
      <batchs> 
        <batch> 
          <batchCode>FCAL049-1</batchCode>  
          <expireDate>2021-01-01 00:00:00</expireDate>  
          <inventoryType>ZP</inventoryType>  
          <actualQty>1000</actualQty> 
        </batch> 

        <batch> 
          <batchCode>47P04</batchCode>  
          <expireDate>2021-01-01 00:00:00</expireDate>  
          <inventoryType>ZP</inventoryType>  
          <actualQty>1000</actualQty> 
        </batch> 

      </batchs> 
    </orderLine>  

     <orderLine> 
      <itemCode>FCAL050</itemCode>  
      <itemId>SKU0009970200</itemId>  
      <actualQty>1000</actualQty>  
      <batchs> 
        <batch> 
          <batchCode>FCAL050-1</batchCode>  
          <expireDate>2021-01-01 00:00:00</expireDate>  
          <inventoryType>ZP</inventoryType>  
          <actualQty>1000</actualQty> 
        </batch> 
      </batchs> 
    </orderLine>  

    <orderLine> 
      <itemCode>FBAV125</itemCode>  
      <itemId>SKU0009970200</itemId>  
      <actualQty>1000</actualQty>  
      <batchs> 
        <batch> 
          <batchCode>FBAV125-1</batchCode>  
          <expireDate>2021-01-01 00:00:00</expireDate>  
          <inventoryType>ZP</inventoryType>  
          <actualQty>1000</actualQty> 
        </batch> 
      </batchs> 
    </orderLine>  

  </orderLines>
</request>
XML;

    return $data;

  }
}

//( new stockoutConfirm(\MethodExplain::OUT_STOCK_CONFIRM) )->stockout();
