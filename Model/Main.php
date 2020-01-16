<?php
$dirLevel = dirname(__DIR__,1);
include_once $dirLevel .'/Model/EmployeeData.php';
class Main extends Model{
    public function __construct(){
        parent::__construct();

    }
    public function getData(){
        $items=[];
        try{
            $query = $this->db->connect()->query('SELECT * FROM Employee');
            $rows = $query->fetchAll();
            foreach ($rows as $row) {
                $data               = new EmployeeData();
                $data->empID        = $row['emp_id'];
                $data->empFirstName = $row['emp_first_name'];
                $data->empSurname   = $row['emp_surname'];
                $data->empEmail     = $row['emp_email'];
                $data->empDept      = $row['emp_department'];
                $data->empPost      = $row['emp_position'];
                array_push($items, $data);
            }
        return $items;

        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
    }
}
?>