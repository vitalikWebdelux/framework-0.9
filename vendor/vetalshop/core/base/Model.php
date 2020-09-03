<?php 

namespace vetalshop\base;

use vetalshop\Db;

abstract class Model {
	public $attributes = [];
	public $errors = [];
	public $rules = [];

	public function __construct()
	{
		Db::instance();
	}
}