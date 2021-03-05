<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Leave</title>
    <link href="../../resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="../resources/css/icomoon.css" rel="stylesheet">
    <link href="../resources/css/style.css" rel="stylesheet">
</head>
<body>
<div class="main_content">
    <div class="container update_forms update_forms_employee">
        <?php
                require_once "../includes/user_sidenav.php";
                include_once "../../app/dbh.php";
                include "../../app/functions.php";

            if(isset($_POST['edit_leave'])){
                $connection=mysqli_connect("localhost","root","","naomishrms2");
                $id=$_POST['edit_id'];
                // $query= "SELECT * FROM tbl_employees_info WHERE id='$id' ";
                $query= "SELECT * FROM tbl_leaves 
                LEFT JOIN tbl_employees_info ON tbl_leaves.emp_id = tbl_employees_info.emp_id
                WHERE leave_id = '$id' ";
                
                $query_run = mysqli_query($connection,$query);
                foreach($query_run as $row){
        ?>
        <form autocomplete="off" action="_update_leave_code.php" method="post">
            <input type="hidden" name="edit_id" value="<?php echo $row['leave_id'] ?>">
                    <div class="form-gruop">
                        <label for="leave_type">Leave Type:</label>
                        <select name="leave_type" id="leave_type">
                            <option value="<?php echo $row['leave_type'] ?>" selected><?php echo $row['leave_type'] ?></option>
                            <option value="sick">Sick</option>
                            <option value="maternal">Maternal</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Leave Description" value="<?php echo $row['description'] ?>">
                    </div>
                    <div class="form-group">
                        <label for ="from_date">From Date:</label>
                        <input type="date" class="form-control" name="from_date" id="from_date" placeholder="From Date" value="<?php echo $row['from_date'] ?>">
                    </div>    
                    <div class="form-group">
                        <label for="to_date">To Date:</label>
                        <input type="date" class="form-control" name="to_date" id="to_date" placeholder="To Date" value="<?php echo $row['to_date'] ?>">
                    </div>       
            <div class="submit_buttons">
                <button type="submit" class="save_btn" name="edit_leave">Update</button>
                <a href="leaves.php"><button type="button" class="cancel_btn" class="cancelbtn">Cancel</button></a>
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

