<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Departments</title>
    <link href="../../resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="../resources/css/icomoon.css" rel="stylesheet">
    <link href="../resources/css/style.css" rel="stylesheet">
</head>
<body>
<div class="main_content">
    <div class="container update_forms update_forms_employee">
<?php
            include "../includes/side_nav.php";
            include "../../app/functions.php";
            if(isset($_POST['edit_recruit'])){
                $connection=mysqli_connect("localhost","root","","naomishrms2");
                $id=$_POST['edit_id'];
                $query= "SELECT * FROM tbl_recruitments 
                LEFT JOIN tbl_departments ON dpt_fk = dpt_id
                LEFT JOIN tbl_occupations ON occupation_fk = occupations_id
                WHERE recruit_id='$id' ";
                $query_run = mysqli_query($connection,$query);
                foreach($query_run as $row){
        ?>
                <form autocomplete="off" action="_update_recruit_code.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['recruit_id'] ?>">
                    <div class="form-group">
                        <label for ="first_name">First Name:</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $row['first_name']; ?>" required>
                    </div>      
                    <div class="form-group">
                        <label for ="last_name">Last Name:</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name"  value="<?php echo $row['last_name']; ?>" required>
                    </div>   
                    <div class="form-group">
                        <label for ="Gender">Gender</label>
                        <select name="gender" id="gender" class="select">
                        <option value="<?php echo $row['gender'] ?>" selected><?php echo $row['gender'] ?></option>
                            <option value="m">male</option>
                            <option value="f">female</option>
                            <option value="o">other</option>
                        </select>
                    </div>    
                    <div class="form-group">
                        <label for="dob">D.O.B:</label>
                        <input type="date" class="form-control" name="dob" id="dob" value="<?php echo $row['dob']; ?>" required>
                    </div>      
                    <div class="form-group">
                        <label for ="id_number">ID Number:</label>
                        <input type="number" class="form-control" name="id_number" id="id_number" placeholder="ID Number" value="<?php echo $row['id_number']; ?>" required>
                    </div>             
                    <div class="form-group">
                        <label for="email_address">Email Address:</label>
                        <input type="email" class="form-control" name="email_address" id="email_address" placeholder="Email Address" value="<?php echo $row['email_address']; ?>" required>
                    </div>   
                    <div class="form-group">
                        <label for="phone_number">Phone Number:</label>
                        <input type="number" class="form-control" name="phone_number" id="phone_number" placeholder="Phone Number" value="<?php echo $row['phone_number']; ?>" required>
                    </div>   
                    <div class="form-group">
                        <label for="job_applied">Dpt Applied:</label>
                        <select name="job_applied" class="select">
                        <option value="<?php echo $row['dpt_id'] ?>" selected><?php echo $row['dpt_name'] ?></option>
                            <?php echo selectDepartments(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="occupation_applied">Occupation:</label>
                        <select name="occupation_applied" class="select">
                        <option value="<?php echo $row['occupations_id'] ?>" selected><?php echo $row['occupation_name'] ?></option>
                            <?php echo selectOccupation(); ?>
                        </select>  
                    </div>
                    <div class="form-group">
                        <label for ="description">Description:</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?php echo $row['brief_description']; ?>" required>
                    </div>           
                    <div class="form-group">
                        <label for ="rating">Rating:</label>
                        <select name="rating" id="rating" class="select">
                        <option value="<?php echo $row['skills_rating'] ?>" selected><?php echo $row['skills_rating'] ?></option>
                            <option value="professional">Professinal</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="intern">Intern</option>
                            <option value="beginner">Beginner</option>
                        </select>
                    </div>    
                    <div class="form-group">
                        <label for="interview_date">Interview Date:</label>
                        <input type="date" class="form-control" name="interview_date" id="interview_date" value="<?php echo $row['interview_date']; ?>" required>
                    </div>   
                    <div class="form-group">
                        <label for="interview_place">Interview Place</label>
                        <input type="text" class="form-control" name="interview_place" id="interview_place" placeholder="Interview Place:" value="<?php echo $row['interview_place']; ?>" required>
                    </div>    
                    <div class="form-group">
                        <label for ="result">Interview Result:</label>
                        <select name="result" id="result" class="select">
                        <option value="<?php echo $row['interview_result'] ?>" selected><?php echo $row['interview_result'] ?></option>
                            <option value="hired">Hired</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>    
                    <div class="submit_buttons">
                        <button type="submit" class="save_btn" name="edit_recruit">update</button>
                        <a href="recruitments.php"><button type="button" class="cancel_btn">Cancel</button></a>
                    </div>
                </form>
                <?php
                }
            }
    ?>
    </div>
</div>
</body>
</html>
