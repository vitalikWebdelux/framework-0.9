<?php

namespace vetalshop;

class Cache
{
	use TSingeltone;
	function set($key, $data, $seconds = 3600)
	{
		if($seconds){
			$content['data'] = $data;
			$content['end_time'] = time() + $seconds;
			if(file_put_contents(CACHE.'/'.md5($key).'.txt', serialize($content))){
				return true;
			}
		}
		return false;
	}
	function get($key)
	{
		$file = CACHE.'/'.md5($key).'.txt';
		if(file_exists($file)){
			$content = unserialize(file_get_contents($file));
			if(time() <= $content['end_time']){
				return $content;
			}
			unlink($file);
		}
		return false;
	}
	function delete($key)
	{
		$file = CACHE.'/'.md5($key).'.txt';
		if(file_exists($file)){
			unlink($file);
		}

	}
} ?>