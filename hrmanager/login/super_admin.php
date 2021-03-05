<?php
    // session_start();
    // header('location:../index.php');

    // $dbconn = mysqli_connect('localhost', 'root', '', 'naomishrms2');

    // $username = $_POST['username'];
    // $email_address =$_POST['email_address'];
    // $password = $_POST['password'];

    // $sql = "SELECT * FROM tbl_admins WHERE username='$username' ";

    // $result = mysqli_query($dbconn, $sql);

    // $num = mysqli_num_rows($result);

    // if($num == 1){
    //     echo "username already taken";
    // }else{
    //     $reg = "INSERT INTO tbl_admins (username, email_address, password) values ('$username', '$email', '$password') " ;
    //     mysqli_query($dbconn, $reg);
    //     echo "registration successful";
    // }

    
if(isset ($_POST['register_admin'])){

    require '../../app/functions.php';
    $first_name= $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email_address'];
    $pwd = $_POST['password'];
    $pwd_repeat = $_POST['pwd_repeat'];
    $profile_pic = 'p.png';

    if(empty($first_name) || empty($last_name) || empty($username) || empty($email) || empty($pwd) || empty($pwd_repeat)){
        header("Location: register.php?error=emptyfields&first_name=".$first_name."&last_name=".$last_name."&username=".$username."&email_address=".$email); 
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)&& !preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: register.php?error=invalidmail&uid"); 
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: register.php?error=invalidmail&username=".$username); 
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: register.php?error=invalidusername&mail=".$email); 
        exit();
    }
    else if($pwd !== $pwd_repeat){
        header("Location: register.php?error=passwordcheck&uid=".$username."&mail=".$email); 
        exit();
    }
    else{

        $sql = "SELECT username FROM tbl_admin WHERE username = ? ";
        $stmt = mysqli_stmt_init($dbconn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: register.php?error=selectsqlerror"); 
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $result_check = mysqli_stmt_num_rows($stmt);
            if ($result_check > 0 ){
                header("Location: register.php?error=usertaken&mail=".$email); 
                exit();
            }
            else{

                $sql = "INSERT INTO tbl_admin (first_name, last_name, username, email_address, password, profile_pic) VALUES (?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($dbconn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: register.php?error=insertsqlerror"); 
                    exit();
                }
                else{
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ssssss", $first_name,$last_name,$username, $email, $hashedPwd, $profile_pic);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../index.php?registration=success"); 
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($dbconn);
}
else{
    header("Location: register.php"); 
    exit();
}

?>

