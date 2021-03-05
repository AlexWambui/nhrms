<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link href="../../resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="../resources/css/icomoon.css" rel="stylesheet">
    <link href="../resources/css/style.css" rel="stylesheet">
</head>
<body>
<div class="main_content">
    <div class="container update_forms update_forms_employee">
        <?php
            include "../includes/user_sidenav.php";
            $sql="SELECT * FROM tbl_employees_info AS employee 
            LEFT JOIN tbl_departments ON employee.dpt_fk = dpt_id 
            LEFT JOIN tbl_emp_status ON employee.emp_status_fk = emp_status_id
            LEFT JOIN tbl_occupations ON employee.occupations_fk = occupations_id 
            WHERE emp_id = '$_SESSION[user]' ";
            $query = $dbh -> prepare($sql);
            $query->bindParam(':bid',$bid, PDO::PARAM_STR);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0){
                foreach($results as $result){ 
        ?>
        <form autocomplete="off" action="_update_employee_code.php" method="post">
            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
            <div class="user_image_box">
                <img class="card-img-top" src="../../resources/images/user_images/<?php echo htmlentities($result->profile_picture);?>" class="img-responsive" alt="image" style="width:100px; height:100px; border-radius:50%;">
            </div>
            <div class="form-group">
                <label for ="emp_id">Emp Id:</label>
                <input type="text" class="form-control" name="emp_id" id="empt_id" placeholder="Emp ID" value = "<?php echo htmlentities($result->emp_id) ?>" required readonly>
            </div>   
            <div class="form-group">
                <label for ="first_name">First Name:</label>
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value = "<?php echo htmlentities($result->first_name) ?>" required>
            </div>      
            <div class="form-group">
                <label for ="last_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value = "<?php echo htmlentities($result->last_name) ?>" required>
            </div>      
            <div class="form-group">
                <label for="email_address">Email Address:</label>
                <input type="email" class="form-control" name="email_address" id="email_address" placeholder="Email Address" value = "<?php echo htmlentities($result->email_address) ?>" required>
            </div>   
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="number" class="form-control" name="phone_number" id="phone_number" placeholder="Phone Number" value = "<?php echo htmlentities($result->phone_number) ?>" required>
            </div>
            <div class="form-group">
            <div class="submit_buttons">
                <button type="submit" class="save_btn" name="edit_employee">Update</button>
                <a href="profile.php"><button type="button" class="cancel_btn" class="cancelbtn">Cancel</button></a>
            </div>
        </form>
    </div>
    <?php
            }
        }
    ?>
</div>
</body>
</html>

