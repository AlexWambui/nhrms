<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Employees</title>
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
                        <h1>Employees</h1>
                    </div>
                    <div class="action">
                        <button onclick="document.getElementById('pop_form').style.display='block'" class="btn btn-success"><span class="icon-plus-circle"></span> Add</button>
                    </div>
                </div>
<?php
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
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Emp ID</th>
                            <th>Full Names</th>
                            <th>Email</th>
                            <th>National ID</th>
                            <th>Department</th>
                            <th>Occupation</th>
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
                            <td><?php echo htmlentities($result->email_address); ?></td>
                            <td><?php echo htmlentities($result->id_number); ?></td>
                            <td><?php echo htmlentities($result->dpt_name); ?></td>
                            <td><?php echo htmlentities($result->occupation_name); ?></td>                            
                            <td>
                                <form action="_update_employee.php" method="post"> 
                                    <input type="hidden" name="edit_id" value="<?php echo htmlentities($result->id); ?>">
                                    <button class="btn btn-link btn-sm " type="submit" name="edit_employee_info"><span class="icon-edit"></span> Edit</button>
                                </form>
                        </td>
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
            <div id="pop_form" class="modal pop_form_container">
                <!-- <div class="top_nav">
                    <span onclick="document.getElementById('pop_form').style.display='none'" class="close" title="Close Modal">&times;</span>
                </div> -->

                <form autocomplete="on" class="pop_form animate" action="_add_employee.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for ="emp_id">Emp ID</label>
                        <input type="text" class="form-control" name="emp_id" id="emp_id" placeholder="Employee ID" autocomplete="off">
                    </div>         
                    <div class="form-group">
                        <label for ="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                    </div>      
                    <div class="form-group">
                        <label for ="last_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                    </div>      
                    <div class="form-group">
                    <label for="gender">Gender:</label>
                    <div class="custom_radio">
                        <label class="custom_radio_label">Male
                            <input type="radio" name="gender" value="m">
                            <span class="checkmark"></span>
                        </label>
                        <label class="custom_radio_label">Female
                            <input type="radio" name="gender" value="f">
                            <span class="checkmark"></span>
                        </label>
                        <label class="custom_radio_label">Other
                        <input type="radio"  name="gender" value="o">
                        <span class="checkmark"></span>
                    </label>
                    </div>
                    </div>   
                    <div class="form-group">
                        <label for="dob">D.O.B:</label>
                        <input type="date" class="form-control" name="dob" id="dob" min="1900-01-01" max="1999-12-01">
                    </div>       
                    <div class="form-group">
                        <label for="id_number">National Id Number:</label>
                        <input type="number" class="form-control" name="id_number" id="id_number" placeholder="National ID number" min="0" max="99999999">
                    </div>   
                    <div class="form-group">
                        <label for="email_address">Email Address:</label>
                        <input type="email" class="form-control" name="email_address" id="email_address" placeholder="Email Address">
                    </div>   
                    <div class="form-group">
                        <label for="phone_number">Phone Number:</label>
                        <input type="number" class="form-control" name="phone_number" id="phone_number" placeholder="Phone Number">
                    </div>   
                    <label for="department">Department:</label>
                    <select name="department">
                    <option value = "none selected" selected disabled>Select Department</option>
                    <?php echo selectDepartments(); ?>
                    </select>
                    <label for="emp_status">Emp Status:</label>
                    <select name="emp_status">
                    <option value = "none selected" selected disabled>Select Status</option>
                    <?php echo selectEmpStatus(); ?>
                    </select>   
                    <label for="emp_status">Occupation:</label>
                    <select name="occupation">
                    <option value = "none selected" selected disabled>Select Occupation</option>
                    <?php echo selectOccupation(); ?>
                    </select>                         
                    <div class="form-group">
                        <label for="date_joined">Date Joined:</label>
                        <input type="date" class="form-control" name="date_joined" id="date_joined" min="1979-01-01"> 
                    </div>   
                    <div class="form-group">
                    <label for="proflie_pic">Profile Picture:</label>
                    <div class="custom-file">
                        <input type="file" name="profile_picture" id="customFile"class="custom-file-input" >
                        <label class="custom-file-label" for="customFile">Choose Proflie Picture</label>
                    </div>     
                    </div>
                    <div class="submit_buttons">
                        <button type="submit" class="save_btn" name="add_employee">Save</button>
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

    