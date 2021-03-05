<?php
$connection=mysqli_connect("localhost","root","","naomishrms2");
$link = mysqli_connect("localhost", "root", "", "naomishrms2");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['edit_salary'])){
    $id=$_POST['edit_id'];
    $allowances = $_POST['allowances'];
    $basic_salary = $_POST['basic_salary'];


    $sql=
    "UPDATE
        tbl_employees_info
    SET 
        allowances = '$allowances', 
        basic_salary = '$basic_salary'
    WHERE id='$id' ";

    if(mysqli_query($connection, $sql)){
       echo "updated";
        header('location:salaries.php?success=updated');
    }else{
        // echo "not updated";
        // header('location:settings.php?error=somethingwentwrong');
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
    }
}