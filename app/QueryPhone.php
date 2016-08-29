<?php  

namespace app;

use libs\HttpRequest;

/**
* 手机号码归属地查询模块
*/
class QueryPhone
{
	const TAOBAO_API = 'https://tcc.taobao.com/cc/json/mobile_tel_segment.htm?';

	public static function query($phone) {
		if (self::verifyPhone($phone)) {
			$response = HttpRequest::request(self::TAOBAO_API, array('tel' => $phone));
			$response = self::formatData($response);

			return $response;
		}
	}

	public static function verifyPhone($phone) {
		$ret = false;
		$ret = preg_match('/1[3-8]\d{9}/', $phone);

		return $ret;
	}

	public static function formatData($data = null) {
		$ret = null;

		if (!is_null($data)) {
		    preg_match_all("/(\w+):'([^']+)/", $data, $res);
		    $items = array_combine($res[1], $res[2]);

            foreach ($items as $itemKey => $itemVal) {
                $ret[$itemKey] = iconv('GB2312', 'UTF-8', $itemVal);
            }

		}

		return $ret;
	}
}