<!DOCTYPE html>
    <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Print Employees</title>
            <link rel='stylesheet' href='../../resources/css/bootstrap.min.css'>
            <link rel='stylesheet' href='../../resources/css/icomoon.css'>
            <link rel='stylesheet' href='../../resources/css/styles.css'>
        </head>
    <body onload = window.print();>
        <div class="container-fluid print_page">
            <div class="print_header">
                <h1>NHRMS Employees Report</h1>
                <h2><i>Date: <?php echo date('d - m - yy'); ?></i></h2>
            </div> 
            <div class="container-fluid table">
            <?php 
                include_once "../../app/dbh.php";
                include "../../app/functions.php";
                $sql= "SELECT * FROM tbl_employees_info AS employee 
                LEFT JOIN tbl_departments AS dpts ON employee.dpt_fk=dpts.dpt_id 
                LEFT JOIN tbl_occupations ON employee.occupations_fk = occupations_id
                WHERE emp_status_fk = 1";
                $query = $dbh -> prepare($sql);
                $query->bindParam(':bid',$bid, PDO::PARAM_STR);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                ?>                
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Emp ID</th>
                            <th>Full Names</th>
                            <th>Email Address</th>
                            <th>ID Number</th>
                            <th>Phone Number</th>
                            <th>Department</th>
                            <th>Occupation</th>
                        </tr>
                    </thead>
                    <?php
                    if($query->rowCount() > 0){
                        foreach($results as $result){ 
                    ?>                    
                    <tbody id="table">
                        <tr>
                        <td><?php echo htmlentities($result->emp_id); ?></td>
                            <td><?php echo htmlentities($result->first_name); echo " "; echo htmlentities($result->last_name); ?></td>
                            <td><?php echo htmlentities($result->phone_number); ?></td>
                            <td><?php echo htmlentities($result->email_address); ?></td>
                            <td><?php echo htmlentities($result->id_number); ?></td>
                            <td><?php echo htmlentities($result->dpt_name); ?></td>
                            <td><?php echo htmlentities($result->occupation_name); ?></td> 
                        </tr>
                    </tbody>
                    <?php
                        }
                    }else{
                        echo "no record found";
                    }  
                    ?>
                </table>
            </div>
            </div>
    </body>
    </html>