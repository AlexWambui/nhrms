<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Disciplinary</title>
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
            if(isset($_POST['edit_disciplinary'])){
                $connection=mysqli_connect("localhost","root","","naomishrms2");
                $id=$_POST['edit_id'];
                // $query= "SELECT * FROM tbl_employees_info WHERE id='$id' ";
                $query= "SELECT * FROM tbl_disciplinaries
                LEFT JOIN tbl_employees_info ON tbl_disciplinaries.emp_id_fk = tbl_employees_info.id
                WHERE disciplinary_id='$id' ";

                $query_run = mysqli_query($connection,$query);
                foreach($query_run as $row){
        ?>
        <form autocomplete="off" action="_update_disciplinary_code.php" method="post">
            <input type="hidden" name="edit_id" value="<?php echo $row['disciplinary_id'] ?>">
            <label for="emp_id_fk">Emp Id:</label>
            <select name="emp_id_fk">
                <option value = "<?php echo$row['id']; ?>" selected><?php echo $row['emp_id']; ?></option>
                <?php echo selectEmpId(); ?>
            </select>
            <div class="form-group">
                <label for="violation_name">Violation Name:</label>
                <input type="text" class="form-control" name="violation_name" id="violation_name" value = "<?php echo $row['violation_name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="violation_remarks">Violation Remarks:</label>
                <input type="text" class="form-control" name="violation_remarks" id="violation_remarks" placeholder="Violation Remarks" value = "<?php echo $row['violation_remarks'] ?>" required>
            </div> 
            <div class="form-group">
                <label for="date_of_incidence">Date of Incidence:</label>
                <input type="date" class="form-control" name="date_of_incidence" id="date_of_incidence" placeholder=">Date of Incidence" value = "<?php echo $row['date_of_incidence'] ?>" required>
            </div> 
            <div class="form-group">
                <label for="appealed">Appealed:</label>
                <select name="appealed" class="select">
                    <option value="<?php echo $row['appealed'] ?>" selected><?php echo $row['appealed'] ?></option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="verdict">Verdict:</label>
                <select name="verdict" class="select">
                    <option value="<?php echo $row['verdict'] ?>" selected><?php echo $row['verdict'] ?></option>
                    <option value="innocent">Innocent</option>
                    <option value="guilty">Guilty</option>
                </select>   
            </div>
            <div class="submit_buttons">
                <button type="submit" class="save_btn" name="edit_disciplinary">Update</button>
                <a href="disciplinaries.php"><button type="button" class="cancel_btn" class="cancelbtn">Cancel</button></a>
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

