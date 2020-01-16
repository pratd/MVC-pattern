<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "MVCexample";
//sql to create table
$table1 = "CREATE TABLE IF NOT EXISTS Employee ( emp_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
emp_first_name VARCHAR(60) , emp_surname VARCHAR(60) NOT NULL, emp_email VARCHAR(60) NOT NULL, emp_department VARCHAR(60) ,
emp_position VARCHAR(60) )";

$table2 = "CREATE TABLE IF NOT EXISTS Salary( salary_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, emp_salary VARCHAR(60),
emp_name VARCHAR(60), emp_id INT(6) )";
$tables=[$table1, $table2];
//Create Connection
foreach ($tables as $key => $sql) {
    try{
        $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
        //setting PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //use exec() because no results are returned\
        $conn->exec($sql);
        //echo "Table have been created successfully";
    }catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
}
?>