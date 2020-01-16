<?php

class App{
    function __construct(){
        //storing the url
        $url = isset($_GET['url']) ? $_GET['url']:null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        $url;
        $this->dirLevel =dirname(__DIR__,1);
        //check is url[0] exists;
        if(empty($url[0])){
            $controllerDirectory = $this->dirLevel . '/Controllers/mainController.php';
            require_once $controllerDirectory;
            $controller = new mainController();
           // print_r($controller) ;
            $controller->loadModel('Main');
        }

        //proceed if the $url exists;
        //if(isset($url[0]))
    }
}
?>