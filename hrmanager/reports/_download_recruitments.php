<!DOCTYPE html>
    <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Download Recruitments</title>
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
                    include "../../app/dbh.php";
                    $sql="SELECT * FROM tbl_recruitments AS recruits 
                    LEFT JOIN tbl_departments ON recruits.dpt_fk = dpt_id 
                    LEFT JOIN tbl_occupations ON recruits.occupation_fk = occupations_id
                    ORDER BY interview_result ASC";
                    $query = $dbh -> prepare($sql);
                    $query->bindParam(':bid',$bid, PDO::PARAM_STR);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                ?>
                    <table class="stripped" id="myTable">
                        <tr>
                            <th>Full Names</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Occupation</th>
                            <th>Interview Date</th>
                            <th>Interview Result</th>
                        </tr>
                <?php
                   if($query->rowCount() > 0){
                    foreach($results as $result){ 
                ?>
                    <tr>
                        <td><?php echo htmlentities($result->first_name); echo " "; echo htmlentities($result->last_name); ?></td>
                        <td><?php echo htmlentities($result->email_address); ?></td>
                        <td><?php echo htmlentities($result->dpt_name); ?></td>
                        <td><?php echo htmlentities($result->occupation_name); ?></td>
                        <td><?php echo htmlentities($result->interview_date); ?></td>
                        <td><?php echo htmlentities($result->interview_result); ?></td>                            
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