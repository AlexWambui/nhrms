<?php
$connection=mysqli_connect("localhost","root","","naomishrms2");
$link = mysqli_connect("localhost", "root", "", "naomishrms2");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['edit_employee'])){
    $id=$_POST['edit_id'];
    $emp_id = $_POST['emp_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender= $_POST['gender'];
    $dob=$_POST['dob'];
    $id_number=$_POST['id_number'];
    $email=$_POST['email_address'];
    $phone_number=$_POST['phone_number'];
    $department=$_POST['department'];
    $emp_status=$_POST['emp_status'];
    $occupation=$_POST['occupation'];
    $date_joined=$_POST['date_joined'];

    $sql=
    "UPDATE
        tbl_employees_info
    SET 
        emp_id = '$emp_id', 
        first_name = '$first_name',
        last_name = '$last_name',
        gender = '$gender',
        dob = '$dob',
        id_number = '$id_number',
        email_address = '$email',
        phone_number = '$phone_number',
        dpt_fk = '$department',
        emp_status_fk = '$emp_status',
        occupations_fk = '$occupation',
        date_joined = '$date_joined'
    WHERE id='$id' ";

    if(mysqli_query($connection, $sql)){
       echo "updated";
        header('location:employees.php?success=updated');
    }else{
        // echo "not updated";
        // header('location:employees.php?error=somethingwentwrong');
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
    }
}