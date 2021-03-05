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
            include "../includes/side_nav.php";
            if(isset($_POST['edit_employee_info'])){
                $connection=mysqli_connect("localhost","root","","naomishrms2");
                $id=$_POST['edit_id'];
                // $query= "SELECT * FROM tbl_employees_info WHERE id='$id' ";
                $query= "SELECT * FROM tbl_employees_info AS employee 
                LEFT JOIN tbl_departments ON employee.dpt_fk = dpt_id 
                LEFT JOIN tbl_emp_status ON employee.emp_status_fk = emp_status_id
                LEFT JOIN tbl_occupations ON employee.occupations_fk = occupations_id 
                WHERE id='$id' ";

                $query_run = mysqli_query($connection,$query);
                foreach($query_run as $row){
        ?>
        <form autocomplete="off" action="_update_employee_code.php" method="post">
            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
            <div class="form-group">
                <label for ="emp_id">Emp Id:</label>
                <input type="text" class="form-control" name="emp_id" id="empt_id" placeholder="Emp ID" value = "<?php echo $row['emp_id'] ?>" required>
            </div>   
            <div class="form-group">
                <label for ="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value = "<?php echo $row['first_name'] ?>" required>
            </div>      
            <div class="form-group">
                <label for ="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value = "<?php echo $row['last_name'] ?>" required>
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
                <input type="date" class="form-control" name="dob" id="dob" value = "<?php echo $row['dob'] ?>" required>
            </div>
            <div class="form-group">
                <label for="id_number">National Id Number:</label>
                <input type="number" class="form-control" name="id_number" id="id_number" placeholder="National ID number" value = "<?php echo $row['id_number'] ?>" required>
            </div> 
            <div class="form-group">
                <label for="email_address">Email Address:</label>
                <input type="email" class="form-control" name="email_address" id="email_address" placeholder="Email Address" value = "<?php echo $row['email_address'] ?>" required>
            </div>   
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="number" class="form-control" name="phone_number" id="phone_number" placeholder="Phone Number" value = "<?php echo $row['phone_number'] ?>" required>
            </div>
            <div class="form-group">
                <label for="department">Department:</label>
                <select name="department" class="select">
                <option value="<?php echo $row['dpt_id'] ?>" selected><?php echo $row['dpt_name'] ?></option>
                    <?php echo selectDepartments(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="emp_status">Emp Status:</label>
                <select name="emp_status" class="select">
                <option value="<?php echo $row['emp_status_id'] ?>" selected><?php echo $row['status'] ?></option>
                    <?php echo selectEmpStatus(); ?>
                </select>   
            </div>
            <div class="form-group">
                <label for="occupation">Occupation:</label>
                <select name="occupation" class="select">
                <option value="<?php echo $row['occupations_id'] ?>" selected><?php echo $row['occupation_name'] ?></option>
                    <?php echo selectOccupation(); ?>
                </select>  
            </div>
            <div class="form-group">
            <div class="form-group">
                <label for="date_joined">Date Joined:</label>
                <input type="date" class="form-control" name="date_joined" id="date_joined" value = "<?php echo $row['date_joined'] ?>" required>
            </div>   
            <div class="submit_buttons">
                <button type="submit" class="save_btn" name="edit_employee">Update</button>
                <a href="employees.php"><button type="button" class="cancel_btn" class="cancelbtn">Cancel</button></a>
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

