<?php
$dbh = mysqli_connect("localhost","root","","naomishrms2");

if($dbh === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['edit_emp_details'])){
    $id=$_POST['edit_id'];
    $password = $_POST['password'];
    $email_address = $_POST['email_address'];

    $sql = "UPDATE tbl_admin
    SET 
        email_address = '$email_address', 
        password= '$password' 
    WHERE 
        id='$id' ";
    $query_run = mysqli_query($dbh, $sql);
    if($query_run){
       echo "updated";
        header('location: logout.php');
    }else{
        echo "not updated";
        header('location: login_details.php');
    }
}