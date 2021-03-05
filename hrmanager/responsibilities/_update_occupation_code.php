<?php
$connection=mysqli_connect("localhost","root","","naomishrms2");
$link = mysqli_connect("localhost", "root", "", "naomishrms2");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['edit_occupation'])){
    $id=$_POST['edit_id'];
    $occupation = $_POST['occupation'];
    $responsibilities = $_POST['responsibilities'];
    $basic_salary = $_POST['basic_salary'];
    $house_allowance = $_POST['house_allowance'];
    $medical_allowance = $_POST['medical_allowance'];
    $travel_allowance = $_POST['travel_allowance'];

    $sql=
    "UPDATE
        tbl_occupations
    SET 
        occupation_name = '$occupation', 
        responsibilities = '$responsibilities',
        basic_salary = '$basic_salary',
        house_allowance = '$house_allowance',
        medical_allowance = '$medical_allowance',
        travel_allowance = '$travel_allowance'
    WHERE occupations_id='$id' ";

    if(mysqli_query($connection, $sql)){
       echo "updated";
        header('location: responsibilities.php?success=updated');
    }else{
        // echo "not updated";
        // header('location:settings.php?error=somethingwentwrong');
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
    }
}