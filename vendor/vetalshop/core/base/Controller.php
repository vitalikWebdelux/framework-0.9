<?php

namespace vetalshop\base;

abstract class Controller
{
	public $route;
	public $controller;
	public $model;
	public $view;
	public $prefix;
	public $layout;
	public $data = [];
	public $meta = ['title' => '', 'description' => '', 'keyWords' => ''];

	public function __construct($route)
	{
		$this->route = $route;
		$this->controller = $route['controller'];
		$this->model = $route['controller'];
		$this->view = $route['action'];
		$this->prefix = $route['prefix'];
	}

	public function setData($data)
	{
		$this->data = $data;
	}


	public function getView()
	{
		$viewObject = new View($this->route, $this->layout, $this->view, $this->meta);
		$viewObject->render($this->data);
	}

	
	public function setMeta($title = '', $description = '', $keyWorlds = '')
	{
		$this->meta['title'] = $title;
		$this->meta['description'] = $description;
		$this->meta['keyWorlds'] = $keyWorlds;
	}


}