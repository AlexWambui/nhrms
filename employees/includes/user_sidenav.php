<head>
            <link rel='stylesheet' href='../../resources/css/icomoon.css'>
            <link rel='stylesheet' href='../../resources/css/styles.css'>
        </head>
<body>
<?php 
//  if(!isset($_SESSION['employee'])){
//      header('location: ../../index.php');
//  }else{
  require_once "../../app/functions.php";
  session_start();
  if(!isset($_SESSION['user'])){
    header("location: ../../index.php");
  }
 
?>
<div class="sidenav">
  <p class="app-name">N<span>HRM</span>S</p>
  <ul>
        <a class="links" href="../profile/profile.php"><span class="icon-user"></span> Profile</a>
        <a class="links" href="../leaves/leaves.php"><span class="icon-file"></span> Leaves</a>
        <a class="links" href="../feedbacks/feedbacks.php"><span class="icon-comment"></span> Feedbacks</a>
        <a class="links" href="../payslip/_print_payslip_preview.php"><span class="icon-print"></span> Payslip</a>
        <div class="bottom_nav">
              <a href="../profile/_update_profile.php" class="bottom_nav_link">              
                <?php
                 include "../../app/dbh.php";
                $sql= "SELECT * FROM `tbl_employees_info` 
                WHERE 
                  `emp_id` = '$_SESSION[user]' ";
                $query = $dbh -> prepare($sql);
                $query->bindParam(':bid',$bid, PDO::PARAM_STR);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query->rowCount() > 0){
                    foreach($results as $result){ 
                    ?>
                    <span><img src="../../resources/images/user_images/<?php echo htmlentities($result->profile_picture);?>" class="img-responsive" alt="image" style="width:20px; height:20px; border-radius:50%;"></span><?php echo htmlentities($result->first_name) ?>
                <?php
                    }
                  }
                ?>
              </a><br>
              <a class="bottom_nav_link" id="logout" href="../login/logout.php"><span class="icon-power-off"></span>logout</a>
          </div>
</div>
<?php
// }
?>
</body>
