<?php
$dirLevel = dirname(__DIR__,1);
include_once $dirLevel .'/Model/EmployeeData.php';
class updateSal extends Model{
    public function __construct(){
        parent::__construct();

    }
    public function putSalary($data){
        $empId      = intval($data['employee_id']);
        $empSalary  = $data['empSalary'];
        
        $items  = [];
        //echo $empId;
        try{
            $query=$this->db->connect()->query("SELECT * FROM Employee");
            $emp_data = $query->fetchAll();
            foreach ($emp_data as $row) {
                $data = new EmployeeData();
                $data->empID        = $row['emp_id'];
                $data->empFirstName = $row['emp_first_name'];
                $data->empSurname   = $row['emp_surname'];
                $data->empFirstName = $row['emp_first_name'];
                $data->empSurname   = $row['emp_surname'];
                $data->empEmail     = $row['emp_email'];
                $data->empDept      = $row['emp_department'];
                $data->empPost      = $row['emp_position'];
                //inserting salary for the empid
                $empName    = $data->empFirstName . ' ' .$data->empSurname;
                $queryEmp = $this->db->connect()->prepare('INSERT INTO Salary(emp_salary,
                emp_name, emp_id) VALUES (:emp_salary, :emp_name, :emp_id)');
                $queryEmp->execute(['emp_salary'=>$empSalary, 'emp_name'=>$empName, 'emp_id'=>$empId]);
                $returnSalary = $queryEmp->fetchAll(); //return all the salary values and update the view
                if( $data->empID == $empId){
                    $querySalary = $this->db->connect()->query("SELECT * FROM Salary WHERE emp_id='$empId'");
                    foreach($querySalary as $row){
                        $data->empSalary = $row['emp_salary'];
                    }
                }
                array_push($items,$data);
            }
        return $items;
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
    }
}
?>