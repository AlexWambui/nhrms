<?php
require_once "../../app/dbh.php";

if(isset($_POST['add_employee'])){
$emp_id = $_POST['emp_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$id_number = $_POST['id_number'];
$email = $_POST['email_address'];
$phone_number=$_POST['phone_number'];
$department = $_POST['department'];
$emp_status = $_POST['emp_status'];
$occupation = $_POST['occupation'];
$responsibilities = $_POST['responsibilities'];
$date_joined = $_POST['date_joined'];
$profile_picture=$_FILES["profile_pic"]["name"];
$allowances = $_POST['allowances'];
$basic_salary = $_POST['basic_salary'];
 
move_uploaded_file($_FILES["profile_pic"]["tmp_name"],"../../resources/images/user_images".$_FILES["profile_pic"]["name"]);


$sql = "INSERT INTO tbl_emp_details (
    emp_id, 
    first_name, 
    last_name, 
    gender, 
    dob, 
    id_number, 
    email_address, 
    phone_number, 
    dpt_fk, 
    emp_status_fk, 
    occupation, 
    responsibilites, 
    date_joined, 
    user_image, 
    allowances, 
    basic_salary
    ) 
VALUES (
    :emp_id,
    :first_name,
    :last_name,
    :gender,
    :dob,
    :id_number,
    :email,
    :phone_number,
    :department,
    :emp_status,
    :occupation,
    :responsibilities,
    :date_joined,
    :profile_picture,
    :allowances,
    :basic_salary
    )";

$query = $dbh->prepare($sql);
$query->bindParam(':emp_id',$emp_id,PDO::PARAM_STR);
$query->bindParam(':first_name',$first_name,PDO::PARAM_STR);
$query->bindParam(':last_name',$last_name,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':id_number',$id_number,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':phone_number',$phone_number,PDO::PARAM_STR);
$query->bindParam(':department',$department,PDO::PARAM_STR);
$query->bindParam(':emp_status',$emp_status,PDO::PARAM_STR);
$query->bindParam(':occupation',$occupation,PDO::PARAM_STR);
$query->bindParam(':responsibilities',$responsibilities,PDO::PARAM_STR);
$query->bindParam(':date_joined',$date_joined,PDO::PARAM_STR);
$query->bindParam(':profile_picture',$profile_picture,PDO::PARAM_STR);
$query->bindParam(':allowances',$allowances,PDO::PARAM_STR);
$query->bindParam(':basic_salary',$basic_salary,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId){
    $msg="Successful";
    header('location: employees.php?success=inserted');
}
else{
    $error="Something went wrong. Please try again";
    header('location: employees.php?error=somethingwentwrong');
}
}else{
    header('location: employees.php');
}
?>