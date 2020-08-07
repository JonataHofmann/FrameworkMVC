<?php
namespace App\Core;
class Controller {
   
    protected $authenticar = false;

    


    function view($filename,$data=[])
   {
       extract($data);
    
       include "app/views/$filename".".php";
   }
    
    
}
