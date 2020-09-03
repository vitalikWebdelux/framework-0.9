<?php

namespace app\controllers;

use vetalshop\App;

class MainController extends CommonController
{
	public function indexAction()
	{
		$posts = \R::findAll('test');
		$post = \R::findOne('test', 'id = ?', [2]);
		$m = ['Головна', 'Опис сторінки', 'Ключi сторінки'];
		$this->setMeta('Головна', 'Опис сторінки', 'Ключi сторінки');
		$name = 'Nixon';
		$age = 45;

		$cache = \ishop\Cache::instance();
		$cache->set('test', $m);
		$this->setData(compact('name', 'age', 'posts'));
	}
}