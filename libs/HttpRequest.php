<?php

namespace libs;

class HttpRequest {
	public static function request($url, $params, $method = 'GET') {
		$response = null;

		if ($url) {
			$method = strtoupper($method);
		}

		switch ($method) {
			case 'GET':
			if (is_array($params) && count($params)) {
				$url = trim($url, '?');

				if (strrpos($url, '?')) {
					$url .= '&' . http_build_query($params);
				} else {
					$url .= '?' . http_build_query($params);
				}
			}

			// var_dump($url);
			$response = file_get_contents($url);
				break;
			case 'POST':
				break;			
			default:
				break;
		}

		return $response;
	}
}