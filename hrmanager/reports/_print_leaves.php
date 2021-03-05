<!DOCTYPE html>
    <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Print Leaves</title>
            <link rel='stylesheet' href='../../resources/css/bootstrap.min.css'>
            <link rel='stylesheet' href='../../resources/css/icomoon.css'>
            <link rel='stylesheet' href='../../resources/css/styles.css'>
        </head>
    <body onload = window.print();>
        <div class="container-fluid print_page">
            <div class="print_header">
                <h1>NHRMS Leaves Report</h1>
                <h2><i>Date: <?php echo date('d - m - yy'); ?></i></h2>
            </div> 
            <div class="container-fluid table">
            <?php 
                include_once "../../app/dbh.php";
                include "../../app/functions.php";
                $sql= "SELECT * FROM tbl_leaves 
                LEFT JOIN tbl_employees_info ON tbl_leaves.emp_id = tbl_employees_info.emp_id
                WHERE emp_status_fk = 1 ";
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
                            <th>Leave Type</th>
                            <th>Description</th>
                            <th>From Date</th>
                            <th>To Date</th>
                            <th>Approval Status</th>
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
                            <td><?php echo htmlentities($result->leave_type); ?></td>
                            <td><?php echo htmlentities($result->description); ?></td>
                            <td><?php echo htmlentities($result->from_date); ?></td>
                            <td><?php echo htmlentities($result->to_date); ?></td> 
                            <td><?php echo htmlentities($result->approval_status); ?></td>                            
                           
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