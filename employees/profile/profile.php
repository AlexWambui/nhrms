<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee Details</title>
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
        <form  autocomplete="off" action="_update_employee_code.php" method="post">
            <div class="user_image_box">
                <img class="card-img-top" src="../../resources/images/user_images/<?php echo htmlentities($result->profile_picture);?>" class="img-responsive" alt="image" style="width:100px; height:100px; border-radius:50%;">
            </div>
            <div class="form-group">
                <label for ="emp_id">Emp Id:</label>
                <input type="text" class="form-control" name="emp_id" id="empt_id" placeholder="Emp ID" value = "<?php echo htmlentities($result->emp_id) ?>" required readonly>
            </div>   
            <div class="form-group">
                <label for="emp_status">Emp Status:</label>
                <input type="text" class="form-control" name="emp_status" id="emp_status" placeholder="Emp Status" value = "<?php echo htmlentities($result->status) ?>" required readonly>
            </div>
            <div class="form-group">
                <label for ="first_name">First Name:</label>
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value = "<?php echo htmlentities($result->first_name) ?>" required readonly>
            </div>      
            <div class="form-group">
                <label for ="last_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value = "<?php echo htmlentities($result->last_name) ?>" required readonly>
            </div>      
            <div class="form-group">
                <label for="dob">D.O.B:</label>
                <input type="date" class="form-control" name="dob" id="dob" value = "<?php echo htmlentities($result->dob) ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="id_number">National Id Number:</label>
                <input type="number" class="form-control" name="id_number" id="id_number" placeholder="National ID number" value = "<?php echo htmlentities($result->id_number) ?>" required readonly>
            </div> 
            <div class="form-group">
                <label for="email_address">Email Address:</label>
                <input type="email" class="form-control" name="email_address" id="email_address" placeholder="Email Address" value = "<?php echo htmlentities($result->email_address) ?>" required readonly>
            </div>   
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="number" class="form-control" name="phone_number" id="phone_number" placeholder="Phone Number" value = "<?php echo htmlentities($result->phone_number) ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="department">Department:</label>
                <input type="text" class="form-control" name="department" id="department" placeholder="Department" value = "<?php echo htmlentities($result->dpt_name) ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="occupation">Occupation:</label>
                <input type="text" class="form-control" name="occupation" id="occupation" placeholder="Occupation" value = "<?php echo htmlentities($result->occupation_name) ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="date_joined">Date Joined:</label>
                <input type="date" class="form-control" name="date_joined" id="date_joined" value = "<?php echo htmlentities($result->date_joined) ?>" required readonly>
            </div>   
            <div class="form-group">
                <label for="basic_salary">Basic Salary:</label>
                <input type="text" class="form-control" name="basic_salary" id="basic_salary" value = "<?php echo htmlentities($result->basic_salary) ?>" required readonly>
            </div>   
            <div class="form-group">
                <label for="allowances">Allowances:</label>
                <input type="text" class="form-control" name="allowances" id="allowances" value = "<?php echo htmlentities($result->house_allowance) + htmlentities($result->medical_allowance) + htmlentities($result->travel_allowance) ?>" required readonly>
            </div>   
            <div class="form-group">
                <label for="net_salary">Net Salary:</label>
                <input type="text" class="form-control" name="net_salary" id="net_salary" value = "<?php echo htmlentities($result->basic_salary) + htmlentities($result->house_allowance) + htmlentities($result->medical_allowance) + htmlentities($result->travel_allowance) - 800?>" required readonly>
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

