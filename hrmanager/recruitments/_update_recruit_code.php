<?php
$connection=mysqli_connect("localhost","root","","naomishrms2");
$link = mysqli_connect("localhost", "root", "", "naomishrms2");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['edit_recruit'])){
    $id = $_POST['edit_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $id_number = $_POST['id_number'];
    $email = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];
    $job_applied = $_POST['job_applied'];
    $occupation = $_POST['occupation_applied'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];
    $interview_date = $_POST['interview_date'];
    $interview_place = $_POST['interview_place'];
    $interview_result = $_POST['result'];
    

    $sql=
    "UPDATE
        tbl_recruitments
    SET 
        first_name = '$first_name',
        last_name = '$last_name',
        gender = '$gender',
        dob = '$dob',
        id_number = '$id_number',
        email_address = '$email',
        phone_number = '$phone_number',
        dpt_fk = '$job_applied',
        occupation_fk = '$occupation',
        brief_description = '$description',
        skills_rating = '$rating',
        interview_date = '$interview_date',
        interview_place = '$interview_place',
        interview_result = '$interview_result'
    WHERE recruit_id='$id' ";

    if(!mysqli_query($connection, $sql)){
         // echo "not updated";
        // header('location:settings.php?error=somethingwentwrong');
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
    }else{
        echo "updated";
        header('location:recruitments.php?success=updated');
    }
}