<head>
  <link rel='stylesheet' href='../../resources/css/icomoon.css'>
  <link rel='stylesheet' href='../../resources/css/styles.css'>
</head>
<body>
<?php 
 require_once "../../app/functions.php";
 session_start();
 if(!isset($_SESSION['username'])){
   header("location: ../index.php");
 }
?>
<div class="sidenav">
  <p class="app-name">N<span>HRM</span>S</p>
  <ul>
    <li><a class="links active" href="../includes/welcome.php"><span class="icon-home"></span> Home</a></li>
    <button class="dropdown-btn"><span class="icon-users"></span>Employees
      <span class="icon-caret-down"></span>
    </button>
  <div class="dropdown-container">
      <a class="links" href="../employees/employees.php"><span class="icon-users"></span> Employees</a>
      <a class="links" href="../responsibilities/responsibilities.php"><span class="icon-settings"></span> Responsibilities</a>
      <a class="links" href="../salaries/salaries.php"><span class="icon-money"></span> Salaries</a>
  </div>
    <!-- <li><a class="links" href="../responsibilities/responsibilities.php"><span class="icon-settings"></span> Responsibilities</a></li>
    <li><a class="links" href="../employees/employees.php"><span class="icon-users"></span> Employees</a></li>
    <li><a class="links" href="../salaries/salaries.php"><span class="icon-money"></span> Salaries</a></li> -->
    <li><a class="links" href="../disciplinaries/disciplinaries.php"><span class="icon-book"></span> Disciplinaries</a></li>
    <li><a class="links" href="../leaves/leaves.php"><span class="icon-reply"></span> Leaves</a></li>
    <li><a class="links" href="../feedbacks/feedbacks.php"><span class="icon-comments"></span> Feedbacks</a></li>
    <li><a class="links" href="../recruitments/recruitments.php"><span class="icon-table"></span> Recruitments</a></li>
    <li><a class="links" href="../reports/reports.php"><span class="icon-file-text"></span> Reports</a></li>



    <div class="bottom_nav">
      <a href="../login/login_details.php" class="bottom_nav_link">              
      <?php
          $connection=mysqli_connect("localhost","root","","naomishrms2");
          $query= "SELECT * FROM tbl_admin WHERE username='$_SESSION[username]' ";
          $query_run = mysqli_query($connection,$query);
          foreach($query_run as $row){
      ?>
          <span><img src="../../resources/images/admin_images/p.png" style="width:20px; height:20px; border-radius:50%;"></span><?php echo $row['username'] ?>
      <?php
          }
        ?>
              </a><br>
              <a class="bottom_nav_link" id="logout" href="../login/logout.php"><span class="icon-power-off"></span>logout</a>
      </div>
</div>

<script>

  var dropdown = document.getElementsByClassName("dropdown-btn");
  var i;
  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
      } else {
        dropdownContent.style.display = "block";
      }
    });
  } 
</script>
</body>
