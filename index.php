<?php
<<<<<<< HEAD
/*
    require('./app/helper.php');
    require('./app/core/DB.php');
    require('./app/core/Model.php');
    require('./app/core/Controller.php');
    require('./app/controller/CandidatesController.php');
    require('./app/models/Candidate.php');
*/


require __DIR__ . '/vendor/autoload.php';
// phpinfo();
require_once("router.php");





$controllerName = 'App\\Controller\\' . ucfirst($GET['controller']) . "Controller";
$actionName = $GET['action'];

$controller = new $controllerName();
$controller->$actionName($GET['id']);
    //$basurl = $_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'];
=======

require __DIR__ . '/vendor/autoload.php';

if (isset($_GET['api'])) {
    $controllerName = getApi($_GET['api']);
    $actionName = strtolower($_SERVER['REQUEST_METHOD']);
} else {
    $controllerName = getController($_GET['controller']);
    $actionName = isset($_GET['action']) ? $_GET['action'] : 'index';
}


$controller = new $controllerName();
$controller->$actionName();
//$basurl = $_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'];
>>>>>>> origin
