<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "naomishrms2");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$emp_id = mysqli_real_escape_string($link, $_REQUEST['emp_id']);
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$gender= mysqli_real_escape_string($link, $_REQUEST['gender']);
$dob=mysqli_real_escape_string($link,$_REQUEST['dob']);
$id_number=mysqli_real_escape_string($link,$_REQUEST['id_number']);
$email=mysqli_real_escape_string($link,$_REQUEST['email_address']);
$phonenumber=mysqli_real_escape_string($link,$_REQUEST['phone_number']);
$department=mysqli_real_escape_string($link,$_REQUEST['department']);
$emp_status=mysqli_real_escape_string($link,$_REQUEST['emp_status']);
$occupation=mysqli_real_escape_string($link,$_REQUEST['occupation']);
$date_joined=mysqli_real_escape_string($link,$_REQUEST['date_joined']);
$profile_picture = $_FILES['profile_picture']['name'];

move_uploaded_file($_FILES['profile_picture']['tmp_name'],'../../resources/images/user_images/'.$_FILES['profile_picture']['name']);

// Attempt insert query execution
$sql = "INSERT INTO `tbl_employees_info` (
`emp_id`, 
`first_name`, 
`last_name`, 
`gender`, 
`dob`, 
`id_number`,
`email_address`, 
`phone_number`, 
`dpt_fk`, 
`emp_status_fk`,
`occupations_fk`,
`date_joined`, 
`profile_picture`
) 
VALUES (
'$emp_id', 
'$first_name',
'$last_name',
'$gender',
'$dob',
'$id_number',
'$email',
'$phonenumber',
'$department',
'$emp_status',
'$occupation',
'$date_joined', 
'$profile_picture'
)";
if(mysqli_query($link, $sql)){
    echo "Employee was added successfully.";
    header('location:employees.php?succes=inserted');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>