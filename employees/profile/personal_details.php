<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="edit_viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information</title>
    <link href="../../resources/css/styles.css" rel="stylesheet">
</head>
<body>
<div class="main_content">
<div class="form">
<?php
include "../includes/user_sidenav.php";
include "../../app/dbh.php";

$sql="SELECT * FROM tbl_employees_info WHERE emp_id='$_SESSION[user]' ";
$query = $dbh -> prepare($sql);
$query->bindParam(':bid',$bid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0){
    foreach($results as $result){ 
    ?>
    <form action="_update_employee_details.php" method="post" class="form">
        <fieldset class="fieldsets">
            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
            <div class="user_image_box">
                <img class="card-img-top" src="../../resources/images/user_images<?php echo htmlentities($result->profile_picture); ?>" class="img-responsive" alt="image" style="width:200px; height:200px; border-radius:50%; ">
            </div>
        <div class="form-group">
            <label for="first_name">First Name</label>
        </div>

            <label class="form_labels" for="first_name">First Name:</label>
            <input class="form_inputs" type="text" name="edit_first_name" value="<?php echo $row['first_name'] ?>" value="<?php echo $row['id'] ?>" required><br><br>
            <label class="form_labels" for="last_name">Last Name:</label>
            <input class="form_inputs" type="text" name="edit_last_name" value="<?php echo $row['last_name'] ?>" required><br><br>
            <label class="form_labels" for ="gender">Gender:</label>
            <input class="form_inputs" type="text" name="edit_gender" value="<?php echo $row['gender'] ?>" required><br><br>
            <label class="form_labels" for="email_address">Email Address:</label>
            <input class="form_inputs" type="email" name="edit_email_address" value="<?php echo $row['email_address'] ?>" required><br><br>
            <label class="form_labels" for="phone_number">Phone Number:</label>
            <input class="form_inputs" type="text" name="edit_phone_number" value="<?php echo $row['phone_number'] ?>" required><br><br>
            <label class="form_labels" for="national_id">ID Number:</label>
            <input class="form_inputs" type="text" name="edit_national_id" value="<?php echo $row['national_id'] ?>" required><br><br>
            <label class="form_labels" for="dob">Date of Birth:</label>
            <input class="form_inputs" type="date" name="edit_dob" value="<?php echo $row['dob'] ?>" required><br><br>
            <label class="form_labels" for="department">Department:</label>
            <input class="form_inputs" name="department" value = "<?php echo $row['dpt_id_fk'] ?>"><br><br>
        <label class="form_labels" for="occupation">Occupation:</label>
        <input class="form_inputs" name="occupation" value = "<?php echo $row['occupation'] ?>"><br><br>
         <label class="form_labels" for="responsibilities">Responsibilities:</label>
         <input class="form_inputs" type="text" name="edit_responsibilities" value="<?php echo $row['responsibilities'] ?>" required><br><br>
         <label class="form_labels" for="emp_type">Employement Type:</label>
         <input class="form_inputs" name="emp_type" value = "<?php echo $row['emp_type'] ?>"><br><br>
        <div class="submitbtns">
        <input class="btnsubmits" type="submit" name="updatebtn" value="Update">
        <a href="../reports/single_employee.php"><input class="btnsubmits printbtn" type="button" name="print" value="print"></a>
        </div>
        </fieldset>
    </form>
</div>
<?php
}}
         
    ?>
</div>
</body>
</html>
