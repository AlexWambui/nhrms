<?php
$link = mysqli_connect("localhost", "root", "", "naomishrms2");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$occupation = mysqli_real_escape_string($link, $_REQUEST['occupation']);
$responsibilities = mysqli_real_escape_string($link, $_REQUEST['responsibilities']);
$basic_salary = mysqli_real_escape_string($link, $_REQUEST['basic_salary']);
$house_allowance = mysqli_real_escape_string($link, $_REQUEST['house_allowance']);
$medical_allowance = mysqli_real_escape_string($link, $_REQUEST['medical_allowance']);
$travel_allowance = mysqli_real_escape_string($link, $_REQUEST['travel_allowance']);

// Attempt insert query execution
$sql = "INSERT INTO `tbl_occupations` (
`occupation_name`, 
`responsibilities`,
`basic_salary`,
`house_allowance`,
`medical_allowance`,
`travel_allowance`
) 
VALUES (
'$occupation', 
'$responsibilities',
'$basic_salary',
'$house_allowance',
'$medical_allowance',
'$travel_allowance'
)";

if(mysqli_query($link, $sql)){
    echo "occupation was added successfully.";
    header('location: responsibilities.php?succes=inserted');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>