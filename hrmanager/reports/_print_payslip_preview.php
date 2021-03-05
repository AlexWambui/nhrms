<!DOCTYPE html>
    <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Print Payslip</title>
            <link rel='stylesheet' href='../../resources/css/bootstrap.min.css'>
            <link rel='stylesheet' href='css/icomoon.css'>
            <link rel='stylesheet' href='print.css'>
        </head>
<body onload=window.print()>
    <?php 
        include_once "../../app/dbh.php";
        include "../../app/functions.php";
        $id=$_POST['edit_id'];
        $sql= "SELECT * FROM tbl_employees_info AS employee 
        LEFT JOIN tbl_departments AS dpts ON employee.dpt_fk=dpts.dpt_id 
        LEFT JOIN tbl_occupations ON employee.occupations_fk = occupations_id 
        WHERE id='$id' ";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':bid',$bid, PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
    ?>
    <div class="main_container">
        <div class="header">
            <h1>NAOMIS HUMAN RESOURCE MANAGEMENT SYSTEM EMPLOYEE PAYSLIP</h1>
            <?php 
                if($query ->rowCount() >0){
                    foreach($results as $row){
                        ?>
                        <p>Date Created : <?php echo htmlentities($row->created_at); ?></p>
                        <?php
                    }
                }
            ?>
        </div>
        <div class="header_info">
            <?php 
                if($query ->rowCount() >0){
                    foreach($results as $row){
                        ?>
                        <p>Emp ID : <?php echo htmlentities($row->emp_id) ?></p>
                        <p>Names : <?php echo htmlentities($row->first_name); echo ""; echo htmlentities($row->last_name); ?></p>
                        <p>Phone Number : +254 <?php echo htmlentities($row->phone_number) ?></p>
                        <p>Email Address : <?php echo htmlentities($row->email_address) ?></p>
                        <?php
                    }
                }
            ?>
        </div>
        <hr/>
        <div class="content row">
            <div class="col">
                <h1>Payments & Allowances</h1>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Payment</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <?php
                        if($query->rowCount() > 0){
                            foreach($results as $result){ 
                    ?>                    
                    <tbody id="table">
                        <tr>
                            <td>Basic Salary</td>
                            <td><?php echo htmlentities($result->basic_salary); ?></td>
                        </tr>
                        <tr>
                            <td>House Allowance</td>
                            <td><?php echo htmlentities($result->house_allowance); ?></td>
                        </tr>
                        <tr>
                            <td>Medical Allowance</td>
                            <td><?php echo htmlentities($result->medical_allowance); ?></td>
                        </tr>
                        <tr>
                            <td>Travel Allowance</td>
                            <td><?php echo htmlentities($result->travel_allowance); ?></td>
                        </tr>
                        <tr>
                            <td><b>TOTAL</b>:</td>
                            <td><?php echo htmlentities($result->basic_salary) + htmlentities($result->house_allowance) + htmlentities($result->medical_allowance) + htmlentities($result->travel_allowance)?></td>
                        </tr>
                    </tbody>
                    <?php
                            }
                        }
                    ?>
                </table>
            </div>
            <div class="col">
                <h1>Deductions</h1>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Deduction</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>PAYE</td>
                            <td>200</td>
                        </tr>
                        <tr>
                            <td>NHIF</td>
                            <td>300</td>
                        </tr>
                        <tr>
                            <td>Insurance</td>
                            <td>200</td>
                        </tr>
                        <tr>
                            <td>Pension</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td><b>TOTAL</b>:</td>
                            <td>800</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <hr/>
        <div class="totals">
        <?php 
                if($query ->rowCount() >0){
                    foreach($results as $result){
                        ?>
                            <p>Net Salary : <?php echo htmlentities($result->basic_salary) + htmlentities($result->house_allowance) + htmlentities($result->medical_allowance) + htmlentities($result->travel_allowance) - 800 ?></p>
                        <?php
                    }
                }
            ?>
        </div>
    </div> 
</body>
</html>