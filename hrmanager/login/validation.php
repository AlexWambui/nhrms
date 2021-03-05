<?php
    // session_start();

    // $dbconn = mysqli_connect('localhost', 'root', '', 'naomishrms2');

    // $username = $_POST['username'];
    // $password = $_POST['password'];

    // $sql = "SELECT * FROM tbl_admins WHERE username='$username' && password='$password' ";

    // $result = mysqli_query($dbconn, $sql);

    // $num = mysqli_num_rows($result);

    // if($num == 1){
    //     $_SESSION['username'] = $username;
    //     header('location:../configs/welcome.php');
    // }else{
    //     header('location:../index.php');
    // }


    /* -------------------Login------------------- */
    if(isset($_POST['login_admin'])){
        require "../../app/functions.php";
        $username = $_POST['username'];
        $pwd = $_POST['password'];
    
        if (empty($username) || empty($pwd)){            
            header("Location: ../index.php?error=emptyfields");
            exit();
        }
        else{
    
            $sql = "SELECT * FROM tbl_admin WHERE username = ? OR email_address = ?;";
            $stmt = mysqli_stmt_init($dbconn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../index.php?error=sqlerror"); 
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "ss", $username, $username);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if($row = mysqli_fetch_assoc($result)){
                    $pwdCheck = password_verify($pwd, $row['password']);
                    if($pwdCheck == false){
                        header("Location: ../index.php?error=wrongpwd"); 
                        exit();
                    }
                    else if($pwdCheck == true){
                        session_start();
                        $_SESSION['username'] = $row['first_name'];
                        $_SESSION['dp'] = $row['pic'];
    
                        header("Location: ../includes/welcome.php?login=success"); 
                        exit();
                    }
                    else{
                        header("Location: ../indexphp?error=wrongpwd"); 
                        exit();
                    }
                }
                else{
                    header("Location: ../index.php?error=nouser"); 
                    exit();
                }
            }
        }
    }
    else{
        header("Location: ../index.php"); 
        exit();
    }
    ?>
