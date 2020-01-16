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
            $controller->defaultView();
        }

        //proceed with the options of urls;
        //if(isset($url[0]))
        $controllerDirectory = $this->dirLevel . '/Controllers/' .$url[0].'.php';
        if (file_exists($controllerDirectory)){
            require_once $controllerDirectory;
            $controller = new $url[0];
            $controller->loadModel('updateSal');
            //using the parameters of the array
            $nparam =sizeof($url);
            if($nparam>1){
                if($nparam>2){
                    $param=[];
                    for($i=2; $i<$nparam; $i++){
                        array_push($param,$url[$i]);
                    }
                    $controller->{$url[1]}($param);
                }else{
                    $controller->{$url[1]}();
                }
            $controller->defaultView();
            }else{
                $controller->render();
            }
        }
    }
}
?>