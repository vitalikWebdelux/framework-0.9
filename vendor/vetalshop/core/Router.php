<?php

namespace vetalshop;

class Router
{
	// Таблиця маршрутів
	protected static $routes = [];
	// Маршрут
	protected static $route = [];

	// Записує маршрут в таблицю маршрутів
	public static function add($regxp, $route = [])
	{
		self::$routes[$regxp] = $route;
	}

	// Вертає таблицю маршрутів
	public static function getRoutes()
	{
		return self::$routes;
	}

	// Вертає поточний маршрут
	public static function getRoute()
	{
		return self::$route;
	}

	public static function disPath($url)
	{
		$url = self::removeQueryString($url);
		if(self::matchRoute($url)){
			$controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
			if(class_exists($controller)){
				$current_object = new $controller(self::$route);
				// $current_object->index();
				$action = self::lowerCamelCase(self::$route['action']) . 'Action';
				if(method_exists($current_object, $action)){
					$current_object->$action();
					$current_object->getView();
				} else {
					throw new \Exception("Метод: {$controller::$action} не знайдений", 404);
				}
			} else {
				throw new \Exception("Контроллер: {$controller} не знайдений", 404);
			}
		} else {
			throw new \Exception("Сторінка не знайдена", 404);
		}

	}

	public static function matchRoute($url)
	{
		foreach (self::$routes as $pattern => $route) {
			if(preg_match("#{$pattern}#", $url, $matches)){
				foreach ($matches as $k => $v) {
					if (is_string($k)) {
						$route[$k] = $v;
					}
				}
				if(empty($route['action'])){ 
					$route['action'] = 'index';
				}
				if(!isset($route['prefix'])){
					$route['prefix'] = '';
				} else {
					$route['prefix'] .= '\\';
				}
				
				
				
				$route['controller'] = self::upperCamelCase($route['controller']);
				self::lowerCamelCase($route['controller']);
				self::$route = $route;
				return true;
			}
		}
		return false;
	}

	// CamelCase
	protected static function upperCamelCase($name){
		return str_replace('-', '', ucwords($name, '-'));
	}
	// camelCase
	protected static function lowerCamelCase($name){
		return lcfirst(self::upperCamelCase($name));
	}

	protected static function removeQueryString($url){
		if($url){
			$params = explode('&', $url, 2);
			if(false === strpos($params[0], '=')){
				return rtrim($params[0], '/');
			}
			return '';
		}
	}
}