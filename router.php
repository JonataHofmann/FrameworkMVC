<?php 
    //require __DIR__.'/vendor/autoload.php';
// router.php


$router = explode('/',trim( $_SERVER[ 'REQUEST_URI' ], '/' ));
//dd($router);


if($_GET['controller'] !== NULL){
    $GET['controller'] = filter_input(INPUT_GET, 'controller');
}else{
    $GET['controller'] = $router[0];
}
if($_GET['action'] !== NULL){
    $GET['action'] = filter_input(INPUT_GET, 'action');
}else{
    
    $GET['action'] = !empty($router[1])? "index": $router[1];
}

if($_GET['id'] !== NULL){
    $GET['id'] = filter_input(INPUT_GET, 'id');
}else{
    $GET['id'] = $router[2];
}

<<<<<<< HEAD
dd($GET)
=======
//dd($GET)
>>>>>>> origin
