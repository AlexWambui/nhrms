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
    <div class="container update_forms">
        <?php
            include "../includes/side_nav.php";
            include "../../app/functions.php";
            if(isset($_POST['edit_occupation'])){
                $connection=mysqli_connect("localhost","root","","naomishrms2");
                $id=$_POST['edit_id'];
                $query= "SELECT * FROM tbl_occupations WHERE occupations_id='$id' ";
                $query_run = mysqli_query($connection,$query);
                foreach($query_run as $row){
        ?>
        <form autocomplete="off" action="_update_occupation_code.php" method="post">
            <input type="hidden" name="edit_id" value="<?php echo $row['occupations_id'] ?>">
            <div class="form-group">
                <label for ="occupation">Occupation:</label>
                <input type="text" class="form-control" name="occupation" id="occupation" placeholder="Occupation" value = "<?php echo $row['occupation_name'] ?>" autofocus required>
            </div>         
            <div class="form-group">
                <label for ="responsibilities">Responsibilites:</label>
                <input type="text" class="form-control" name="responsibilities" id="responsibilities" placeholder="Responsibilities" value = "<?php echo $row['responsibilities'] ?>" required>
            </div>      
            <div class="form-group">
                <label for ="basic_salary">Basic Salary:</label>
                <input type="number" class="form-control" name="basic_salary" id="basic_salary" placeholder="Basic Salary" value = "<?php echo $row['basic_salary'] ?>" required>
            </div>      
            <div class="form-group">
                <label for ="house_allowance">House Allowance:</label>
                <input type="number" class="form-control" name="house_allowance" id="house_allowance" placeholder="House Allowance" value = "<?php echo $row['house_allowance'] ?>" required>
            </div>      
            <div class="form-group">
                <label for ="medical_allowance">Medical Allowance:</label>
                <input type="number" class="form-control" name="medical_allowance" id="medical_allowance" placeholder="Medical Allowance" value = "<?php echo $row['medical_allowance'] ?>" required>
            </div>      
            <div class="form-group">
                <label for ="travel_allowance">Travel Allowance:</label>
                <input type="number" class="form-control" name="travel_allowance" id="travel_allowance" placeholder="Travel Allowance" value = "<?php echo $row['travel_allowance'] ?>" required>
            </div>      
            <div class="submit_buttons">
                <button type="submit" class="save_btn" name="edit_occupation">Update</button>
                <a href="responsibilities.php"><button type="button" class="cancel_btn" class="cancelbtn">Cancel</button></a>
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

