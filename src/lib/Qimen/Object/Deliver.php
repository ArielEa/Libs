<?php

namespace MethodRequest\lib\Qimen\Object;

/**
 * 批量完成发货单任务进程
 */
class Deliver
{
	private $code = [];

	private $url = "https://zhao.b2c.omnixdb.com/ApiQueue/DirectDelivery";

	public function __construct($code)
	{
		$this->code = $code;
	}

	public function deliver()
	{
		$code = [ 'deliveryCode' => implode(',', $this->code) ];
		$result = $this->request( $this->url, $code );
		print_r($result);die;
		return $result;
	}

	public function request( $url, $data, $requestType = 'post' )
	{
        $url = $this->url;
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_POST, 1 );
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
		$return = curl_exec ( $ch );
		curl_close ( $ch );
		return $return;
	}
}
/**
 * @param $argc - 参数个数
 * @param $argv - 参数
 */
//if ( $argc == 1 )  {
//	print_r([ 'code' => 500, 'msg' => '请传入参数' ]); die;
//}
//
//unset($argv[0]);
//
//$codes = array_values($argv);
//
//// $codes = [201123220000001,201123220000002,201123220000003,201123220000004,201123220000005];
//
//$deliver = new Deliver( $codes );
//
//print_r( $deliver->deliver() );
