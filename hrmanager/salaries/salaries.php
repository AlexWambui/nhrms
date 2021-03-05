<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Salaries</title>
    <link rel='stylesheet' href='../../resources/css/bootstrap.min.css'>
    <link rel='stylesheet' href='../../resources/css/icomoon.css'>
    <link rel='stylesheet' href='../../resources/css/styles.css'>
    <script src="../../app/ajax search/jquery.min.js"></script>
    <script src="../../app/ajax search/search.js"></script>
</head>
<body>
    <div class="main_content container employees">
        <header>
            <?php 
                require_once "../includes/side_nav.php";
                include_once "../../app/search_bar.php";
                include_once "../../app/dbh.php";
                include "../../app/functions.php";
                
            ?>
        </header>
        <section>
            <div class="container-fluid">
                <div class="table_header">
                    <div class="heading">
                        <h1>Salaries</h1>
                    </div>
                    <!-- <div class="action">
                        <h1>unallocated</h1>
                    </div> -->
                </div>
<?php
$sql= "SELECT * FROM tbl_employees_info AS employee 
LEFT JOIN tbl_occupations ON employee.occupations_fk = tbl_occupations.occupations_id
WHERE emp_status_fk = 1";
$query = $dbh -> prepare($sql);
$query->bindParam(':bid',$bid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
 ?>                
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Emp ID</th>
                            <th>Full Names</th>
                            <th>Basic Salary</th>
                            <th>House Allowance</th>
                            <th>Medical Allowance</th>
                            <th>Travel Allowance</th>
                            <!-- <th>Action</th> -->
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
                            <td><?php echo htmlentities($result->basic_salary); ?></td>
                            <td><?php echo htmlentities($result->house_allowance); ?></td>
                            <td><?php echo htmlentities($result->medical_allowance); ?></td>
                            <td><?php echo htmlentities($result->travel_allowance); ?></td>
                            <!-- <td>
                                <form action="_update_salary.php" method="post"> 
                                    <input type="hidden" name="edit_id" value="<?php echo htmlentities($result->id); ?>">
                                    <button onclick="document.getElementById('pop_form').style.display='none'" class="btn btn-link btn-sm " type="submit" name="edit_employee_info"><span class="icon-edit"></span> Edit</button>
                                </form>
                        </td> -->
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
        </section>
    </div>       
    
    <script>
// Get the modal
var modal = document.getElementById('pop_form');

// When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//     }
// }
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
</body>
</html>

    