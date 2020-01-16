<?php

class updateSalary extends Controller{
    function __construct(){
        parent::__construct();
       // parent::loadModel();
        $this->view->header=$this->dirLevel.'/views/header.php';
        $this->view->footer=$this->dirLevel.'/views/footer.php';
        $this->view->employee=$this->dirLevel.'./Model/EmployeeData.php';
    }
    function getSalary($param=null){
        $empId      = $param['0']   ;
        $empSalary  = $_POST['createSalary'];
        $updatedSalary = $this->model->putSalary(['employee_id'=>$empId, 'empSalary'=>$empSalary]);
        $this->view->salary = $updatedSalary;
    }
    function defaultView(){
        //$this->view->result = $this->model->putSalary();
        $this->view->render('branches/main');
    }
}

?>