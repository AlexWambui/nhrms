<?php
$conn=mysqli_connect("localhost","root","","naomishrms2");
$link = mysqli_connect("localhost", "root", "", "naomishrms2");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$id=$_POST['edit_id'];
// $sql = "DELETE FROM tbl_departments WHERE dpt_id='$id' ";
$sql = "DELETE FROM `tbl_occupations` WHERE `tbl_occupations`.`id` = '$id' ";
        //execute the query
        if(mysqli_query($conn, $sql))
            header("refresh:1; url=settings.php");
        else 
            echo 'not deleted';
            header('location: settings.php?error=somethingwentwrong')
?>
