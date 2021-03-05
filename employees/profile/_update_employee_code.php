<?php
$connection=mysqli_connect("localhost","root","","naomishrms2");
$link = mysqli_connect("localhost", "root", "", "naomishrms2");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['edit_employee'])){
    $id=$_POST['edit_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email=$_POST['email_address'];
    $phone_number=$_POST['phone_number'];

    $sql=
    "UPDATE
        tbl_employees_info
    SET 
        first_name = '$first_name',
        last_name = '$last_name',
        email_address = '$email',
        phone_number = '$phone_number'
    WHERE id='$id' ";

    if(mysqli_query($connection, $sql)){
       echo "updated";
        header('location:profile.php?success=updated');
    }else{
        // echo "not updated";
        // header('location:employees.php?error=somethingwentwrong');
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
    }
}