<?php
$link = mysqli_connect("localhost", "root", "", "naomishrms2");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$emp_id_fk = mysqli_real_escape_string($link, $_REQUEST['emp_id_fk']);
$violation_name = mysqli_real_escape_string($link, $_REQUEST['violation_name']);
$violation_remarks = mysqli_real_escape_string($link, $_REQUEST['violation_remarks']);
$date_of_incidence= mysqli_real_escape_string($link, $_REQUEST['date_of_incidence']);
$verdict=mysqli_real_escape_string($link,$_REQUEST['verdict']);
$appealed=mysqli_real_escape_string($link,$_REQUEST['appealed']);
 
// Attempt insert query execution
$sql = "INSERT INTO `tbl_disciplinaries` (
`emp_id_fk`, 
`violation_name`, 
`violation_remarks`, 
`date_of_incidence`, 
`verdict`, 
`appealed`
) 
VALUES (
'$emp_id_fk', 
'$violation_name',
'$violation_remarks',
'$date_of_incidence',
'$verdict',
'$appealed'
)";
if(mysqli_query($link, $sql)){
    echo "Disciplinary was added successfully.";
    header('location:disciplinaries.php?succes=inserted');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>