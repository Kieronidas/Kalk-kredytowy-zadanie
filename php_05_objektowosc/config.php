<?php
define('_SERVER_NAME', 'localhost:80');
define('_SERVER_URL', 'http://'._SERVER_NAME);
define('_APP_ROOT', '/php_05_objektowosc');
define('_APP_URL', _SERVER_URL._APP_ROOT);
define("_ROOT_PATH", dirname(__FILE__));

function out(&$param){
	if (isset($param)){
		echo $param;
	}
}



require_once _ROOT_PATH.'/libs/Smarty/Smarty.class.php';

$smarty = new Smarty();


$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
$smarty->setCacheDir('cache/');
$smarty->setConfigDir('configs/');


if (!file_exists($smarty->getCompileDir())) mkdir($smarty->getCompileDir(), 0777, true);
if (!file_exists($smarty->getCacheDir())) mkdir($smarty->getCacheDir(), 0777, true);
?>
