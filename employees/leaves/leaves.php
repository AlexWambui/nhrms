<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Leaves</title>
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
                require_once "../includes/user_sidenav.php";
                include_once "../../app/search_bar.php";
                include_once "../../app/dbh.php";
            ?>
        </header>
        <section>
            <div class="container-fluid">
                <div class="table_header">
                    <div class="heading">
                        <h1>Leaves</h1>
                    </div>
                    <div class="action">
                        <button onclick="document.getElementById('pop_form').style.display='block'" class="btn btn-success"><span class="icon-plus-circle"></span> New Request</button>
                    </div>
                </div>
<?php
$id = $_SESSION['user'];
$sql= "SELECT * FROM tbl_leaves 
LEFT JOIN tbl_employees_info ON tbl_leaves.emp_id = tbl_employees_info.emp_id
WHERE tbl_leaves.emp_id = '$id' ORDER BY tbl_leaves.created_at DESC";
$query = $dbh -> prepare($sql);
$query->bindParam(':bid',$bid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
 ?>                
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Leave Type</th>
                            <th>From</th>
                            <th>Untill</th>
                            <th>Approval Status</th>
                            <th>Approval Date</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
<?php
    if($query->rowCount() > 0){
        foreach($results as $result){ 
?>                    
                    <tbody id="table">
                        <tr>
                            <td><?php echo htmlentities($result->leave_type); ?></td>
                            <td><?php echo htmlentities($result->from_date); ?></td>
                            <td><?php echo htmlentities($result->to_date); ?></td>
                            <td><?php echo htmlentities($result->approval_status); ?></td>       
                            <td><?php echo htmlentities($result->approval_date); ?></td>                            
                            <!-- <td>
                                <form action="_update_leave.php" method="post"> 
                                    <input type="hidden" name="edit_id" value="<?php echo htmlentities($result->leave_id); ?>">
                                    <button class="btn btn-link btn-sm " type="submit" name="edit_leave"><span class="icon-edit"></span> Edit</button>
                                </form>
                        </td> -->
                        </tr>
                    </tbody>
                    <?php
            }
    }else{
          echo "no record found";
        // echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }  
?>
                </table>
            </div>
            <div id="pop_form" class="modal pop_form_container">
                <form autocomplete="off" class="pop_form animate" action="_add_leave_code.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="leave_type">Leave Type:</label>
                        <select name="leave_type" id="leave_type" class="form-control">
                            <option value="none_selected">None Selected</option>
                            <option value="sick">Sick</option>
                            <option value="maternal">Maternal</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Leave Description">
                    </div>
                    <div class="form-group">
                        <label for ="from_date">From Date:</label>
                        <input type="date" class="form-control" name="from_date" id="from_date" placeholder="From Date">
                    </div>    
                    <div class="form-group">
                        <label for="to_date">To Date:</label>
                        <input type="date" class="form-control" name="to_date" id="to_date" placeholder="To Date">
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

    