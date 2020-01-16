<?php
class View{
    function __construct(){
        //
    }
    function render($name){
        $dirLevel = dirname(__DIR__,1);
        require $dirLevel . '/views/' . $name . '.php';

    }
}
?>