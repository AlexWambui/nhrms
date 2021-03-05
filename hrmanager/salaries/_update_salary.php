<html>
<head>
      <title>Update Salaries</title>
      <link href="../../resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="../resources/css/icomoon.css" rel="stylesheet">
    <link href="../resources/css/style.css" rel="stylesheet">
</head>
<body>
<div class="main_content">
    <div class="container update_forms update_forms_login">
    <?php
    include_once "../includes/side_nav.php";
    if(isset($_POST['edit_employee_info']))
    {
        $connection=mysqli_connect("localhost","root","","naomishrms2");
        $id=$_POST['edit_id'];
        $query= "SELECT * FROM tbl_employees_info WHERE id='$id' ";
        // $query= "SELECT * FROM emp_details WHERE id='$id' ";
        $query_run = mysqli_query($connection,$query);
        foreach($query_run as $row){
            ?>
                <form autocomplete="on" action="_update_salary_code.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                    <div class="form-group">
                        <label for="Allowances">Allowances</label>
                        <input type="number" class="form-control" name="allowances" id="allowances" placeholder="Allowances:" value="<?php echo $row['allowances'] ?>" required>
                    </div>    
                    <div class="form-group">
                        <label for="basic_salary">Basic Salary</label>
                        <input type="number" class="form-control" name="basic_salary" id="basic_salary" placeholder="Basic Salary:" value="<?php echo $row['basic_salary'] ?>" required>
                    </div>         
                    <div class="form-group">
                        <label for="net_salary">Net Salary</label>
                        <input type="number" class="form-control" name="net_salary" id="net_salary" placeholder="Net Salary:" value="<?php echo $row['basic_salary'] + $row['allowances']; ?>" readonly>
                    </div>         

                    <div class="submit_buttons">
                        <button type="submit" class="save_btn" name="edit_salary">Update</button>
                        <a href="salaries.php"><button type="button" class="cancel_btn">Cancel</button></a>
                    </div>
                </form>
                <?php
}}
?>
    </div>
</div>    
</body>
</html>