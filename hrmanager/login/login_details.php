<html>
<head>
      <title>Login Details</title>
      <link href="../../resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="../resources/css/icomoon.css" rel="stylesheet">
    <link href="../resources/css/style.css" rel="stylesheet">
</head>
<body>
<div class="main_content">
    <div class="container update_forms update_forms_login">
          <?php
            include "../includes/side_nav.php"; 
            $dbh = mysqli_connect("localhost","root","","naomishrms2");
            $query= "SELECT * FROM tbl_admin WHERE username='$_SESSION[username]' ";
            $query_run = mysqli_query($dbh,$query);
                foreach($query_run as $row){
        ?>
        <form id="login" class="input-group login_details" method="post" action="_update_login_details.php">
            <h4>Update Login details</h4>
            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
            <div class="form-group">
                <label for ="username">Username:</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value = "<?php echo $row['username'] ?>" required readonly>
            </div>       
            <div class="form-group">
                <label for ="email_address">Email Address:</label>
                <input type="email" class="form-control" name="email_address" id="email_address" placeholder="Email Address" value = "<?php echo $row['email_address'] ?>" required>
            </div>       
            <div class="form-group">
                <label for ="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" value = "<?php echo $row['password'] ?>" required>
            </div>      
            <div class="submit_buttons">
                <button type="submit" class="save_btn" name="edit_emp_details">Update</button>
            </div>
            <!-- <input type="text" name="username" class="input-field" placeholder="username" value="<?php echo $row['username'] ?>" readonly>
                    <input type="text" name="email_address" class="input-field" placeholder="email address" value="<?php echo $row['email_address'] ?>" > 
                    <input type="password" name="password" class="input-field" placeholder="Password" value="<?php echo $row['password'] ?>" required>
                    <button type="submit" class="submit-btn" name="updatebtn" >Update</button>
 -->
        </form>
            <?php
                }
            ?>
    </div>
</div>
</body>
</html>