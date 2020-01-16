<?php
class Controller{
    function __construct(){
        //echo "base Controller";
        $this->view = new View();
        $this->dirLevel = dirname(__DIR__,1);
    }

    function loadModel($model){
        $this->url = '/Model/' . $model .'.php';
        if (file_exists($this->dirLevel.$this->url)){
            require $this->dirLevel.$this->url;
            $modelName = $model;
            $this->model= new $modelName;
        }
    }
}
?>