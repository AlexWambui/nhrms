<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Recruitements</title>
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
                        <h1>Recruitements</h1>
                    </div>
                    <div class="action">
                        <button onclick="document.getElementById('pop_form').style.display='block'" class="btn btn-success"><span class="icon-plus-circle"></span> Add</button>
                    </div>
                </div>
<?php
$sql= "SELECT * FROM tbl_recruitments AS recruits 
LEFT JOIN tbl_departments ON recruits.dpt_fk = tbl_departments.dpt_id 
LEFT JOIN tbl_occupations ON recruits.occupation_fk = tbl_occupations.occupations_id
ORDER BY interview_result ASC ";
$query = $dbh -> prepare($sql);
$query->bindParam(':bid',$bid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
 ?>                
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Full Names</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Occupation</th>
                            <th>Interview Date</th>
                            <th>Interview Result</th>
                            <th>Action</th>
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
                            <td>
                                <form action="_update_recruit.php" method="post"> 
                                    <input type="hidden" name="edit_id" value="<?php echo htmlentities($result->recruit_id); ?>">
                                    <button class="btn btn-link btn-sm " type="submit" name="edit_recruit"><span class="icon-edit"></span> Edit</button>
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
                <form autocomplete="off" class="pop_form animate" action="_add_recruit.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for ="first_name">First Name:</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                    </div>      
                    <div class="form-group">
                        <label for ="last_name">Last Name:</label>
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
                        <input type="date" class="form-control" name="dob" id="dob">
                    </div>      
                    <div class="form-group">
                        <label for ="id_number">ID Number:</label>
                        <input type="number" class="form-control" name="id_number" id="id_number" placeholder="ID Number" autocomplete="off">
                    </div>             
                    <div class="form-group">
                        <label for="email_address">Email Address:</label>
                        <input type="email" class="form-control" name="email_address" id="email_address" placeholder="Email Address">
                    </div>   
                    <div class="form-group">
                        <label for="phone_number">Phone Number:</label>
                        <input type="number" class="form-control" name="phone_number" id="phone_number" placeholder="Phone Number">
                    </div>   
                    <label for="department">Job Applied:</label>
                    <select name="job_applied">
                    <option value = "none selected" selected disabled>Select Department</option>
                    <?php echo selectDepartments(); ?>
                    </select>
                    <label for="emp_status">Occupation:</label>
                    <select name="occupation_applied">
                    <option value = "none selected" selected disabled>Select Occupation</option>
                    <?php echo selectOccupation(); ?>
                    </select>    
                    <div class="form-group">
                        <label for ="description">Description:</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Description">
                    </div>           
                    <div class="form-group">
                        <label for ="rating">Rating:</label>
                        <select name="rating" id="rating" class="select">
                            <option value = "none selected" selected>None Selected</option>
                            <option value="professional">Professinal</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="intern">Intern</option>
                            <option value="beginner">Beginner</option>
                        </select>
                    </div>    
                    <div class="form-group">
                        <label for="interview_date">Interview Date:</label>
                        <input type="date" class="form-control" name="interview_date" id="interview_date">
                    </div>   
                    <div class="form-group">
                        <label for="interview_place">Interview Place</label>
                        <input type="text" class="form-control" name="interview_place" id="interview_place" placeholder="Interview Place:">
                    </div>    
                    <div class="form-group">
                        <label for ="result">Interview Result:</label>
                        <select name="result" id="result" class="select">
                            <option value = "p" selected>Pending</option>
                            <option value="hired">Hired</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>    
                    <div class="submit_buttons">
                        <button type="submit" class="save_btn" name="add_recruit">Save</button>
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

    