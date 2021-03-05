<?php
    include "../../app/functions.php";
    if(isset($_POST['user_login'])){
        $emp_id = $_POST['emp_id'];
        $id_number = $_POST['id_number'];

        $sql = "SELECT * FROM tbl_employees_info
        WHERE emp_id = '$emp_id' AND id_number = '$id_number' " ;
        
        $result = mysqli_query($dbconn, $sql);
        $count_rows = mysqli_num_rows($result);
        if(!$count_rows == 1){
            header('location: ../../index.php?error=wrongcredentials');
        }else{
            session_start();
            $_SESSION['user'] = $emp_id;
            header('location: ../profile/profile.php');
        }
    }else{
        header('location : ../../index.php');
    }

/* -------------------Login------------------- */
// include "../../app/connection.php";
// if(isset($_POST['user_login'])){

//     $username = $_POST['emp_id'];
//     $id_number = $_POST['id_number'];

//     if (empty($username) || empty($id_number)){
//         header("Location: ../../index.php?error=emptyfields"); 
//         exit();
//     }
//     else{

//         $sql = "SELECT * FROM `tbl_employees_info` 
//            WHERE emp_id = ? AND id_number = ?";
//         $stmt = mysqli_stmt_init($dbconn);
//         if(!mysqli_stmt_prepare($stmt, $sql)){
//             header("Location: ../../index.php?error=sqlerror"); 
//             exit();
//         }
//         else{
//             mysqli_stmt_bind_param($stmt, "si", $emp_id, $id_);
//             mysqli_stmt_execute($stmt);
//             $result = mysqli_stmt_get_result($stmt);
//             if($row = mysqli_fetch_assoc($result)){
//                 $id_number = $row['id_number'];
//                 if($id_number == false){
//                     header("Location: ../../index.php?error=wrongcredentials"); 
//                     exit();
//                 }
//                 else if($id_number == true){
//                     session_start();

//                     $_SESSION['employee'] = $row['emp_id'];
//                     header("Location: ../includes/welcome.php?login=success"); 
//                     exit();
//                 }
//                 else{
//                     header("Location: ../../index.php?error=wrongpwd"); 
//                     exit();
//                 }
//             }
//             else{
//                 header("Location: ../../index.php?error=nouser"); 
//                 exit();
//             }
//         }
//     }
// }
// else{
//     header("Location: ../../index.php"); 
//     exit();
// }
?>
