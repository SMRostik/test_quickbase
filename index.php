<?php
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/tools/autoload.php');
require_once(ROOT.'/libs/quickbase/qbFunc.php');

ini_set('display_errors',1);
error_reporting(E_ALL);

function de($value, $exit = 0){
    echo("<pre>");
    print_r($value);
    echo("</pre>");
    if($exit) die;
}

$route = isset($_GET['r']) ? $_GET['r'] : '';
if(!$route) $route = 'product/index';
$temp = explode('/', $route);

$controller = array_shift($temp) . 'Controller';
$controller = ucfirst($controller);
$action = array_shift($temp);

$controllerObject = new $controller;

$parameters = $_GET;
array_shift($parameters);
call_user_func_array(array($controllerObject, $action), $parameters);




