<?php

ini_set("display_errors", "On");
error_reporting(E_ALL);

require_once("autoload.php");

$phone = isset($_POST['phone']) ? $_POST['phone'] : null;
$info = app\QueryPhone::query($phone);

$data = array();
$info['phone'] = $phone;
if ($info) {
	$data = $info;
	$data['code'] = 200;
} else {
	$data['msg'] = '手机号不正确';
	$data['code'] = 400;
}

echo json_encode($data);