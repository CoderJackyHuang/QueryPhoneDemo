<?php

/*
class autoload 
{
	public static function load($className)	
	{
		$name = str_replace('\\', '/', $className);
		$fileName = sprintf('%s.php', $name);
		if (is_file($fileName)) {
			require_once $fileName;
		}
		// var_dump($fileName);
	}
}


// spl_autoload_register(array("autoload", "load"));
spl_autoload_register("autoload::load");
*/


function __autoload($className) {

	$name = str_replace('\\', '/', $className);
	$fileName = sprintf('%s.php', $name);

	if (is_file($fileName)) {
		require_once($fileName);
	}
}
