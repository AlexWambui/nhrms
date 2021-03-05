<?php
$connection=mysqli_connect("localhost","root","","naomishrms2");
$link = mysqli_connect("localhost", "root", "", "naomishrms2");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['edit_dpt'])){
    $id=$_POST['edit_id'];
    $dpt = $_POST['dpt_name'];
    $hod = $_POST['hod'];


    $sql=
    "UPDATE
        tbl_departments
    SET 
        dpt_name = '$dpt', 
        hod = '$hod'
    WHERE dpt_id='$id' ";

    if(mysqli_query($connection, $sql)){
       echo "updated";
        header('location:settings.php?success=updated');
    }else{
        // echo "not updated";
        // header('location:settings.php?error=somethingwentwrong');
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
    }
}