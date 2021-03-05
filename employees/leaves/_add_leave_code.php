<?php
$link = mysqli_connect("localhost", "root", "", "naomishrms2");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
session_start();
$emp_id = $_SESSION['user'];
$leave_type = mysqli_real_escape_string($link, $_REQUEST['leave_type']);
$description = mysqli_real_escape_string($link, $_REQUEST['description']);
$from_date= mysqli_real_escape_string($link, $_REQUEST['from_date']);
$to_date=mysqli_real_escape_string($link,$_REQUEST['to_date']);
 
// Attempt insert query execution
$sql = "INSERT INTO `tbl_leaves` (
`emp_id`,
`leave_type`, 
`description`, 
`from_date`, 
`to_date`
) 
VALUES (
'$emp_id',
'$leave_type',
'$description',
'$from_date',
'$to_date'
)";
if(mysqli_query($link, $sql)){
    echo "Leave was added successfully.";
    header('location:leaves.php?succes=inserted');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>