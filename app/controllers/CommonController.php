<?php

namespace app\controllers;

class CommonController extends \ishop\base\Controller
{
	function __construct($r)
	{
		parent:: __construct($r);
		new \app\models\AppModels();
	}
}