<?php 

namespace vetalshop;

class App
{
	public static $app;
	function __construct()
	{
		$query = trim($_SERVER['QUERY_STRING'], '/');
		self::$app = Registry::instance();
		$this->getParams();
		new ErrorHandler();
		Router::disPath($query);
		
	}

	protected function getParams(){
		$params = require_once CONFIG . '/params.php';
		if(!empty($params)){
			foreach ($params as $key => $value) {
				self::$app->setProperty($key, $value);
			}
		} 
	}


}