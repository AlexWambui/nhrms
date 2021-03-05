<?php
$connection=mysqli_connect("localhost","root","","naomishrms2");
$link = mysqli_connect("localhost", "root", "", "naomishrms2");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['edit_feedback'])){
    $id=$_POST['edit_id'];
    $reply = mysqli_real_escape_string($link, $_REQUEST['reply']);

    $sql=
    "UPDATE
        tbl_feedbacks
    SET 
        reply = '$reply'
    WHERE feedback_id='$id' ";

    if(mysqli_query($connection, $sql)){
       echo "updated";
        header('location:feedbacks.php?success=updated');
    }else{
        // echo "not updated";
        // header('location:employees.php?error=somethingwentwrong');
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
    }
}else{
    header('location: feedbacks.php?error=attemptfailed');
}