<?php
$connection=mysqli_connect("localhost","root","","naomishrms2");
$link = mysqli_connect("localhost", "root", "", "naomishrms2");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['edit_disciplinary'])){
    $id=$_POST['edit_id'];
    $emp_id = $_POST['emp_id_fk'];
    $violation_name= $_POST['violation_name'];
    $violation_remarks=$_POST['violation_remarks'];
    $date_of_incidence=$_POST['date_of_incidence'];
    $appealed=$_POST['appealed'];
    $verdict=$_POST['verdict'];

    $sql=
    "UPDATE
        tbl_disciplinaries
    SET 
        emp_id_fk = '$emp_id', 
        violation_name = '$violation_name',
        violation_remarks = '$violation_remarks',
        date_of_incidence = '$date_of_incidence',
        appealed = '$appealed',
        verdict = '$verdict'
    WHERE disciplinary_id='$id' ";

    if(mysqli_query($connection, $sql)){
       echo "updated";
        header('location:disciplinaries.php?success=updated');
    }else{
        // echo "not updated";
        // header('location:employees.php?error=somethingwentwrong');
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
    }
}else{
    header('location: disciplinaries.php?error=attemptfailed');
}