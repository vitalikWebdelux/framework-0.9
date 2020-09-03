<?php

namespace vetalshop\base;

class View
{
	
	public $route;
	public $controller;
	public $model;
	public $view;
	public $prefix;
	public $data = [];
	public $meta = [];

	public function __construct($route, $layout = '', $view = '', $meta)
	{
		$this->route = $route;
		$this->controller = $route['controller'];
		$this->model = $route['controller'];
		$this->view = $view;
		$this->prefix = $route['prefix'];
		$this->meta = $meta;
		if($layout === false){
			$this->layout = $layout;
		} else {
			$this->layout = $layout ?: LAYOUT;	
		}
	}

	public function render($data)
	{
		if(is_array($data)) extract($data);
		$viewFile = APP . '/views/'.$this->prefix.$this->controller.'/'.$this->view.'.php';
		if(is_file($viewFile)){
			ob_start();
			require_once $viewFile;
			$content = ob_get_clean();	
		} else {
			throw new \Exception("Не знайдений вид (контент): {viewFile}", 500);
		}

		if(false !== $this->layout){
			$layoutFile = APP . '/views/layouts/'.$this->layout.'.php';
			if(is_file($layoutFile)){
				require_once $layoutFile;
			} else {
				throw new \Exception("Не знайдений шаблон: {$this->layout}", 500);
			}
		}



	}

	public function getMeta()
	{
		$output	 = '<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">';
		$output .= '<title>'.$this->meta['title'].'</title>';
		$output .= '<meta name="description" content="'.$this->meta['description'].'">';
		$output .= '<meta name="keywords" content="'.$this->meta['keyWorlds'].'">';
		return $output;
	}

} ?>