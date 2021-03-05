<!DOCTYPE html>
    <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Print Recruitments</title>
            <link rel='stylesheet' href='../../resources/css/bootstrap.min.css'>
            <link rel='stylesheet' href='../../resources/css/icomoon.css'>
            <link rel='stylesheet' href='../../resources/css/styles.css'>
        </head>
    <body onload = window.print();>
        <div class="container-fluid print_page">
            <div class="print_header">
                <h1>NHRMS Recruitments Report</h1>
                <h2><i>Date: <?php echo date('d - m - yy'); ?></i></h2>
            </div> 
            <div class="container-fluid table">
            <?php 
                include_once "../../app/dbh.php";
                include "../../app/functions.php";
                $sql= "SELECT * FROM  tbl_recruitments AS recruits 
                LEFT JOIN tbl_departments ON recruits.dpt_fk = dpt_id 
                LEFT JOIN tbl_occupations ON recruits.occupation_fk = occupations_id
                ORDER BY interview_result ASC ";
                $query = $dbh -> prepare($sql);
                $query->bindParam(':bid',$bid, PDO::PARAM_STR);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                ?>                
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Full Names</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Occupation</th>
                            <th>Interview Date</th>
                            <th>Interview Result</th>
                        </tr>
                    </thead>
                    <?php
                    if($query->rowCount() > 0){
                        foreach($results as $result){ 
                    ?>                    
                    <tbody id="table">
                        <tr>
                            <td><?php echo htmlentities($result->first_name); echo " "; echo htmlentities($result->last_name); ?></td>
                            <td><?php echo htmlentities($result->email_address); ?></td>
                            <td><?php echo htmlentities($result->dpt_name); ?></td>
                            <td><?php echo htmlentities($result->occupation_name); ?></td>
                            <td><?php echo htmlentities($result->interview_date); ?></td>
                            <td><?php echo htmlentities($result->interview_result); ?></td>                            
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