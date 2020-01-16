<?php
$dirLevel = dirname(__DIR__,1);
include_once $dirLevel .'/Model/EmployeeData.php';
class Main extends Model{
    public function __construct(){
        parent::__construct();
        try{
            $query = $this->db->connect()->query('SELECT * FROM Employee');
            $rows = $query->fetchall();
            foreach ($rows as $row) {
                $data = new EmployeeData();
            }

        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }

    }
}
?>