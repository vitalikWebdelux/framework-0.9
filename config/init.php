<?php

// 1 - development
// 0 - prodaction
define("DEBUG", 1);

// Корінь нашого сайта
define("ROOT", dirname(__DIR__));

// Корінь публічної папки
define("WWW", ROOT . "/public");

// Корінь програми
define("APP", ROOT . "/app");

// Корінь публічної папки
define("CORE", ROOT . "/vendor/ishop/core");

// Шлях до бібліотек
define("LIBS", ROOT . "/vendor/ishop/core/libs");

// Шлях для файлів кеша
define("CACHE", ROOT . "/tmp/cache");

// Шлях до конфігураціонних файлів
define("CONFIG", ROOT . "/config");

// ШАБЛОН сайта
define("LAYOUT", "default");

// http://ishop/public/index.php

if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443){
	$app_path = "https";
} else {
	$app_path = "http";
}
$app_path .= "://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";

// http://ishop/public/
$app_path = preg_replace('#[^/]+$#', '', $app_path);


// http://ishop/
$app_path = str_replace('/public', '', $app_path);

// http://ishop/
define("PATH",  $app_path);

// Шлях для адмінки в адресній строці
define("ADMIN",  PATH . '/admin');

// Підключити класси з комповзера
require_once ROOT . '/vendor/autoload.php';