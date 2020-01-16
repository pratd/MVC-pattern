<?php include_once $this->employee;?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <?php require $this->header;?>
        <div>
            <h2 class="text-center"><?php echo "main view"?>
        </div>
        <div id="Main">
            <h1 class="text-center">Employees</h1>
            <table width='100%'>
                <thead>
                    <tr>
                        <th>Employeed Id </th>
                        <th>Employee First Name </th>
                        <th>Employee Surname </th>
                        <th>Employee Email </th>
                        <th>Department   </th>
                        <th>Position </th>
                        <th>Salary </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($this->salary as $value) {
                        $item = new EmployeeData();
                        $item = $value;
                        if(isset($item->empSalary)){?>
                            <tr>
                                <td><?php echo $item->empID;?></td>
                                <td><?php echo $item->empFirstName;?></td>
                                <td><?php echo $item->empSurname;?></td>
                                <td><?php echo $item->empEmail;?></td>
                                <td><?php echo $item->empDept;?></td>
                                <td><?php echo $item->empPost;?></td>
                                <td><?php echo $item->empSalary;?></td>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <td><?php echo $item->empID;?></td>
                                <td><?php echo $item->empFirstName;?></td>
                                <td><?php echo $item->empSurname;?></td>
                                <td><?php echo $item->empEmail;?></td>
                                <td><?php echo $item->empDept;?></td>
                                <td><?php echo $item->empPost;?></td>
                                <td> <form action="<?php echo constant('URL') .'updateSalary/getSalary/' . $item->empID;?>"
                                method="POST" class="createSalary">
                                <div class="row">
                                    <div class="col-7 mt-2">
                                        <input type="text" class="text-input createSalary" name="createSalary">
                                    </div>
                                    <div class="col-3 mt-2 ml-2">
                                        <input type="submit" value="Add">
                                    </div>
                            </form>
                                </td>
                        <?php } ?>

                    <?php }?>
                </tbody>
            </table>
        </div>
        <!--<script src="" async defer></script>-->
        <?php  require $this->footer; ?>
    </body>
</html>