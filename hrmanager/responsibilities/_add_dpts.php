<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "naomishrms2");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$dpt_name = mysqli_real_escape_string($link, $_REQUEST['dpt_name']);
$hod_name = mysqli_real_escape_string($link, $_REQUEST['hod_name']);
 
// Attempt insert query execution
$sql = "INSERT INTO `tbl_departments` (
`dpt_name`, 
`hod`
) 
VALUES (
'$dpt_name', 
'$hod_name'
)";
if(mysqli_query($link, $sql)){
    echo "dpt was added successfully.";
    header('location:settings.php?succes=inserted');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>