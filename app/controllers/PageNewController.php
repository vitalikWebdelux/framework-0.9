<?php

namespace app\controllers;

class PageNewController extends CommonController
{
	public function indexAction()
	{
		echo 'PageNew->indexAction() <br>   '.__METHOD__;
	}

	 public function viewAction(){
        echo __METHOD__;
    }
	
} ?>