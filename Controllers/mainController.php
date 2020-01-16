<?php

class mainController extends Controller{
    function __construct(){
        parent::__construct();
       // parent::loadModel();
        $this->view->header=$this->dirLevel.'/views/header.php';
        $this->view->footer=$this->dirLevel.'/views/footer.php';
        $this->view->render('main/main');
    }
}

?>