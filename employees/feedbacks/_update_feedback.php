<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Feedback</title>
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

            if(isset($_POST['edit_feedback'])){
                $connection=mysqli_connect("localhost","root","","naomishrms2");
                $id=$_POST['edit_id'];
                // $query= "SELECT * FROM tbl_employees_info WHERE id='$id' ";
                $query= "SELECT * FROM tbl_feedbacks 
                LEFT JOIN tbl_employees_info ON tbl_feedbacks.emp_id = tbl_employees_info.emp_id
                WHERE feedback_id = '$id' ";
                
                $query_run = mysqli_query($connection,$query);
                foreach($query_run as $row){
        ?>
        <form autocomplete="off" action="_update_feedback_code.php" method="post">
            <input type="hidden" name="edit_id" value="<?php echo $row['feedback_id'] ?>">
            <div class="form-group">
                <label for="comment">Comment:</label>
                <input type="text" class="form-control" name="comment" id="comment" placeholder="Comment" value="<?php echo $row['comment'] ?>">
            </div>
            <div class="submit_buttons">
                <button type="submit" class="save_btn" name="edit_feedback">Update</button>
                <a href="feedbacks.php"><button type="button" class="cancel_btn" class="cancelbtn">Cancel</button></a>
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

