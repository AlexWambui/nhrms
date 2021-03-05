<?php
$connection=mysqli_connect("localhost","root","","naomishrms2");
$link = mysqli_connect("localhost", "root", "", "naomishrms2");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['edit_leave'])){
    $id=$_POST['edit_id'];
    $email = $_GET['email_address'];
    $from_date= $_POST['from_date'];
    $to_date=$_POST['to_date'];
    $approval_status=$_POST['approval_status'];

    $sql=
    "UPDATE
        tbl_leaves
    SET 
        from_date = '$from_date',
        to_date = '$to_date',
        approval_status = '$approval_status'
    WHERE leave_id='$id' ";

    if(mysqli_query($connection, $sql)){
        echo "updated";
        $to = $email;
        $subject = "LEAVE REQUEST STATUS";
        $message = "Your request was $approval_status";
        $headers = "From: alexwambuik@gmail.com" . "\r\n" .
        "CC: eulexkienjeku@gmail.com";
        mail($to,$subject,$message,$headers);

        header('location:leaves.php?success=updated');
    }else{
        // echo "not updated";
        // header('location:employees.php?error=somethingwentwrong');
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
    }
}else{
    header('location: leaves.php?error=attemptfailed');
}