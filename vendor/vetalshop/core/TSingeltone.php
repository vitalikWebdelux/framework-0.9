<?php 

namespace vetalshop;

/**
*  Паттерн для всіх классів.
*  Трейт має створити не більше одного об'єкта данного сюди класса
*/

trait TSingeltone
{
	private static $instance;
	// Ми заповнюєм властивість ($instance) об'єктом якщо не має ($instance) 

	public static function instance()
	{
		if(self::$instance === null){
			self::$instance = new self;

		}
		return self::$instance;
	}
}
