<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "naomishrms2");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$gender= mysqli_real_escape_string($link, $_REQUEST['gender']);
$dob=mysqli_real_escape_string($link,$_REQUEST['dob']);
$id_number=mysqli_real_escape_string($link,$_REQUEST['id_number']);
$email=mysqli_real_escape_string($link,$_REQUEST['email_address']);
$phonenumber=mysqli_real_escape_string($link,$_REQUEST['phone_number']);
$job_applied=mysqli_real_escape_string($link,$_REQUEST['job_applied']);
$occupation=mysqli_real_escape_string($link,$_REQUEST['occupation_applied']);
$description = mysqli_real_escape_string($link, $_REQUEST['description']);
$rating = mysqli_real_escape_string($link, $_REQUEST['rating']);
$interview_date=mysqli_real_escape_string($link,$_REQUEST['interview_date']);
$interview_place = mysqli_real_escape_string($link, $_REQUEST['interview_place']);
$interview_result = mysqli_real_escape_string($link, $_REQUEST['result']);

// Attempt insert query execution
$sql = "INSERT INTO `tbl_recruitments` (
`first_name`, 
`last_name`, 
`gender`, 
`dob`, 
`id_number`,
`email_address`, 
`phone_number`, 
`dpt_fk`, 
`occupation_fk`,
`brief_description`,
`skills_rating`,
`interview_date`, 
`interview_place`,
`interview_result`
) 
VALUES (
'$first_name',
'$last_name',
'$gender',
'$dob',
'$id_number',
'$email',
'$phonenumber',
'$job_applied',
'$occupation',
'$description', 
'$rating',
'$interview_date',
'$interview_place',
'$interview_result'
)";
if(mysqli_query($link, $sql)){
    echo "Recruit was added successfully.";
    header('location:recruitments.php?succes=inserted');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>