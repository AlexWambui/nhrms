<?php
$connection=mysqli_connect("localhost","root","","naomishrms2");
$link = mysqli_connect("localhost", "root", "", "naomishrms2");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['edit_leave'])){
    $id=$_POST['edit_id'];
    $leave_type= $_POST['leave_type'];
    $description=$_POST['description'];
    $from_date=$_POST['from_date'];
    $to_date = $_POST['to_date'];

    $sql=
    "UPDATE
        tbl_leaves
    SET 
        leave_type = '$leave_type',
        description = '$description',
        from_date = '$from_date',
        to_date = '$to_date'

    WHERE leave_id='$id' ";

    if(mysqli_query($connection, $sql)){
       echo "updated";
        header('location:leaves.php?success=updated');
    }else{
        // echo "not updated";
        // header('location:employees.php?error=somethingwentwrong');
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
    }
}else{
    header('location: leaves.php?error=attemptfailed');
}