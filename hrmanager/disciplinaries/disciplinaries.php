<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Disciplinaries</title>
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
            ?>
        </header>
        <section>
            <div class="container-fluid">
                <div class="table_header">
                    <div class="heading">
                        <h1>Disciplinaries</h1>
                    </div>
                    <div class="action">
                        <button onclick="document.getElementById('pop_form').style.display='block'" class="btn btn-success"><span class="icon-plus-circle"></span> Add</button>
                    </div>
                </div>
<?php
$sql= "SELECT * FROM tbl_disciplinaries 
LEFT JOIN tbl_employees_info ON tbl_disciplinaries.emp_id_fk = tbl_employees_info.id
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
                            <th>Violation Name</th>
                            <th>Violation Remarks</th>
                            <th>Date of Incidence</th>
                            <th>Appealed</th>
                            <th>Verdict</th>
                            <th>Action</th>
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
                            <td><?php echo htmlentities($result->violation_name); ?></td>
                            <td><?php echo htmlentities($result->violation_remarks); ?></td>
                            <td><?php echo htmlentities($result->date_of_incidence); ?></td>
                            <td><?php echo htmlentities($result->appealed); ?></td>       
                            <td><?php echo htmlentities($result->verdict); ?></td>                            
                            <td>
                                <form action="_update_disciplinary.php" method="post"> 
                                    <input type="hidden" name="edit_id" value="<?php echo htmlentities($result->disciplinary_id); ?>">
                                    <button class="btn btn-link btn-sm " type="submit" name="edit_disciplinary"><span class="icon-edit"></span> Edit</button>
                                </form>
                        </td>
                        </tr>
                    </tbody>
                    <?php
            }
    }else{
        //   echo "no record found";
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }  
?>
                </table>
            </div>
            <div id="pop_form" class="modal pop_form_container">
                <form autocomplete="on" class="pop_form animate" action="_add_disciplinary.php" method="post" enctype="multipart/form-data">
                <label for="emp_id_fk">Emp Id:</label>
                    <select name="emp_id_fk">
                    <option value = "none selected" selected disabled>Select Emp ID</option>
                    <?php echo selectEmpId(); ?>
                    </select>
                    <!-- <div class="form-group">
                        <label for="full_names">Full Names:</label>
                        <input type="button" name="full_names" value="<?php echo htmlentities($result->first_name); echo " "; echo htmlentities($result->last_name); ?>" readonly>
                    </div> -->
                    <div class="form-group">
                        <label for ="violation_name">Violation Name:</label>
                        <input type="text" class="form-control" name="violation_name" id="violation_name" placeholder="Violation Name">
                    </div>    
                    <div class="form-group">
                        <label for="violation_remarks">Violation Remarks:</label>
                        <input type="text" class="form-control" name="violation_remarks" id="violation_remarks" placeholder="Violation Remarks">
                    </div>       
                    <div class="form-group">
                        <label for ="date_of_incidence">Date of Incidence:</label>
                        <input type="date" class="form-control" name="date_of_incidence" id="date_of_incidence" placeholder="Date of Incidence">
                    </div>      
                    <div class="form-gruop">
                        <label for="appealed">Appealed:</label>
                        <select name="appealed" id="appealed">
                            <option value="none_selected">None Selected</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="form-gruop">
                        <label for="verdict">Verdict:</label>
                        <select name="verdict" id="verdict">
                            <option value="none_selected">None Selected</option>
                            <option value="innocent">Innocent</option>
                            <option value="guilty">Guilty</option>
                        </select>
                    </div>
                    <div class="submit_buttons">
                        <button type="submit" class="save_btn" name="add_disciplinary">Save</button>
                        <button type="button" class="cancel_btn" onclick="document.getElementById('pop_form').style.display='none'" class="cancelbtn">Cancel</button>
                    </div>
                </form>
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

    