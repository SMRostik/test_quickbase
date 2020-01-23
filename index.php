<?php
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/tools/autoload.php');
require_once(ROOT.'/libs/quickbase/qbFunc.php');

ini_set('display_errors',1);
error_reporting(E_ALL);

$update = $qb->DoQuery("bp9hkyvvu", "{''.EX.''}");

$route = isset($_GET['r'])?$_GET['r']:'';
if(!$route) $route = 'product/index';
$temp = explode('/', $route);

$controller = array_shift($temp) . 'Controller';
$controller = ucfirst($controller);
$action = array_shift($temp);

$controllerObject = new $controller;

$parameters = $_GET;
call_user_func_array(array($controllerObject, $action), $parameters);




