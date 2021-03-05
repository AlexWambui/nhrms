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
            if(isset($_POST['edit_dpt'])){
                $connection=mysqli_connect("localhost","root","","naomishrms2");
                $id=$_POST['edit_id'];
                $query= "SELECT * FROM tbl_departments WHERE dpt_id='$id' ";
                $query_run = mysqli_query($connection,$query);
                foreach($query_run as $row){
        ?>
        <form autocomplete="off" action="_update_dpt_code.php" method="post">
            <input type="hidden" name="edit_id" value="<?php echo $row['dpt_id'] ?>">
            <div class="form-group">
                <label for ="dpt_name">Occupation:</label>
                <input type="text" class="form-control" name="dpt_name" id="dpt_name" placeholder="Occupation" value = "<?php echo $row['dpt_name'] ?>" autofocus required>
            </div>         
            <div class="form-group">
                <label for ="hod">HOD:</label>
                <input type="text" class="form-control" name="hod" id="hod" placeholder="HOD" value = "<?php echo $row['hod'] ?>" required>
            </div>      
            <div class="submit_buttons">
                <button type="submit" class="save_btn" name="edit_dpt">Update</button>
                <a href="settings.php"><button type="button" class="cancel_btn" class="cancelbtn">Cancel</button></a>
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

