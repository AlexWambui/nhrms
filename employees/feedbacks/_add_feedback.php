<?php
$link = mysqli_connect("localhost", "root", "", "naomishrms2");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
session_start();
$emp_id = $_SESSION['user'];
$comment = mysqli_real_escape_string($link, $_REQUEST['comment']);
 
// Attempt insert query execution
$sql = "INSERT INTO `tbl_feedbacks` (
`emp_id`,
`comment`
) 
VALUES (
'$emp_id',
'$comment'
)";
if(mysqli_query($link, $sql)){
    echo "Feedback was added successfully.";
    header('location:feedbacks.php?succes=inserted');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>