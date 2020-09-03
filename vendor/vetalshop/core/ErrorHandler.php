<?php 

namespace vetalshop;

class ErrorHandler
{
	
	function __construct()
	{
		if(DEBUG){
			error_reporting(-1);
		} else {
			error_reporting(0);
		}

		set_exception_handler([$this, 'exeptionError']);
	}

	public function exeptionError($e){
		$this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
		$this->displayErrors('Виключення', $e->getMessage(), $e->getFile(), $e->getLine(),  $e->getCode());
	}

	protected function logErrors($message = '', $file = '', $line = ''){
		error_log("[".date('Y-m-d H:i:s')."] Текст помилки: {$message} | Файл: {$file} | Рядок: {$line} \n--------------------\n", 3, ROOT . '/tmp/errors.log');
	}

	protected function displayErrors($err_name, $err_str, $err_file, $err_line, $response = 404){
		http_response_code($response);
		if($response == 404 && !DEBUG){
			require WWW . '/errors/404.php';
			die;
		}
		if(!DEBUG){
			require WWW . '/errors/prod.php';
			
		} else {
			require WWW . '/errors/dev.php';

		}
		die;

	}

}