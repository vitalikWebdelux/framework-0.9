<?php

namespace vetalshop;

class Registry
{
	
	use TSingeltone;

	public static $properties;
	
	public static function setProperty ($paramsArray)
	{
		self::$properties = $paramsArray;
	}

	public function getProperty($name)
	{
		if(isset(self::$properties[$name])){
			return self::$properties[$name];
		}
		return null;
	}

	public function getProperties()
	{
		return  self::$properties;
	}
}