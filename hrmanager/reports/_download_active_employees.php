<!DOCTYPE html>
    <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Download Active Employees</title>
            <link href='print.css' rel='stylesheet'>
        </head>
            <script type="text/javascript" src="tableExport/jquery.js"></script>
            <script type="text/javascript" src="tableExport/tableExport.js"></script>
            <script type="text/javascript" src="tableExport/jquery.base64.js"></script>
            <script type="text/javascript" src="tableExport/html2canvas.js"></script>
            <script type="text/javascript" src="tableExport/jspdf/jspdf.js"></script>
            <script type="text/javascript" src="tableExport/jspdf/libs/sprintf.js"></script>
            <script type="text/javascript" src="tableExport/jspdf/libs/base64.js"></script>

            <script type="text/javascript">
            $(document).ready(function(e){
                $("#json").click(function(e){
                    $("#myTable").tableExport({
                        type: 'json',
                        escape: 'false',
                    });
                });
                $("#xml").click(function(e){
                    $("#myTable").tableExport({
                        type: 'xml',
                        escape: 'false',
                    });
                });
                $("#text").click(function(e){
                    $("#myTable").tableExport({
                        type: 'text',
                        escape: 'false',
                    });
                });
                $("#csv").click(function(e){
                    $("#myTable").tableExport({
                        type: 'csv',
                        escape: 'false',
                    });
                });
                $("#png").click(function(e){
                    $("#myTable").tableExport({
                        type: 'png',
                        escape: 'false',
                    });
                });
                $("#word").click(function(e){
                    $("#myTable").tableExport({
                        type: 'doc',
                        escape: 'false',
                    });
                });
                $("#sql").click(function(e){
                    $("#myTable").tableExport({
                        type: 'sql',
                        escape: 'false',
                    });
                });
                $("#excel").click(function(e){
                    $("#myTable").tableExport({
                        type: 'excel',
                        escape: 'false',
                    });
                });
                $("#pdf").click(function(e){
                    $("#myTable").tableExport({
                        type: 'pdf',
                        escape: 'false',
                    });
                });
            });
            </script>
    <body>
        <div class="download_button">
            <button id="json">JSON</button> <!--not working-->
            <button id="xml">XML</button> <!--not working-->
            <button id="text">Text</button> <!--not working-->
            <button id="csv">CSV</button> 
            <button id="png">PNG</button> <!--not working-->
            <button id="word">MS Word</button>
            <button id="sql">SQL</button> 
            <button id="excel">Excel</button> 
            <button id="pdf" title="Download as PDF file">PDF </button> <!--not working-->
        </div>
                <?php
                    include "../../app/connection.php";
                    $sql="SELECT * FROM tbl_employees_info AS employees
                    LEFT JOIN tbl_departments ON employees.dpt_fk = tbl_departments.dpt_id
                    LEFT JOIN tbl_occupations ON employees.occupations_fk = tbl_occupations.occupations_id
                    WHERE emp_status_fk = 1
                    ORDER BY emp_id ASC";
                    $query_run = mysqli_query($dbh,$sql);
                ?>
                    <table class="stripped" id="myTable">
                        <tr>
                            <th>Employee ID</th>
                            <th>Full Names</th>
                            <th>Email Address</th>
                            <th>Phone Number</th>
                            <th>National ID</th>
                            <th>Department</th>
                            <th>Occupation</th>
                            <th>Salary</th>
                        </tr>
                <?php
                    if(mysqli_num_rows($query_run)>0) {
                        while($row=mysqli_fetch_assoc($query_run)){
                ?>
                    <tr>
                        <td><?php echo $row['emp_id']; ?></td>
                        <td><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['email_address']; ?></td>
                        <td><?php echo $row['phone_number']; ?></td>
                        <td><?php echo $row['id_number']; ?></td>
                        <td><?php echo $row['dpt_name']; ?></td>
                        <td><?php echo $row['occupation_name']; ?></td>
                        <td><?php echo $row['allowances'] + $row['basic_salary'];  ?></td>
                    </tr>
                <?php
                        }//end of while loop
                    }//end of if statement
                    else{
                        echo "no record found";
                    }
                ?>
    </body>
    </html>