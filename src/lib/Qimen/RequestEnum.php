<?php

namespace MethodRequest\lib\Qimen;

abstract class RequestEnum
{
    const DELIVERY_PART = 'deliveryorder.confirm';

    const DELIVERY_QUEUE_PART = 'deliveryorder.queue.confirm';

    const STOCK_OUT_PART = 'stockout.confirm';

    const ENTRY_PART = 'entryorder.confirm';

    const REFUND_PART = 'returnorder.confirm';

    public static $methodName = [

    ];
}
