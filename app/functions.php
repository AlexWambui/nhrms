<?php
	// connect to database
	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "naomishrms2";

	// Create connection
	$dbconn = mysqli_connect($host, $user, $password, $database);

	// Check connection
	if (!$dbconn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	//echo "Connected successfully";



// escape string
function clean_input($val){
	global $dbconn;
	return mysqli_real_escape_string($dbconn, trim($val));
}


function authenticate(){
	if(empty($_SESSION['login_user'])){
		//Redirect the user to login
		header("location:welcome.php");
	}
}


function countEmployees(){
	global $dbconn;
	$query = $dbconn->query("SELECT * FROM tbl_employees_info ORDER BY emp_id DESC");
	return mysqli_num_rows($query);
}
function countActive(){
	global $dbconn;
	$query = $dbconn->query("SELECT * FROM tbl_employees_info WHERE emp_status_fk = '1' ");
	return mysqli_num_rows($query);
}
function countInactive(){
	global $dbconn;
	$query = $dbconn->query("SELECT * FROM tbl_employees_info WHERE emp_status_fk = '2' ");
	return mysqli_num_rows($query);
}


function selectDepartments(){
	global $dbconn;
    $output = ' ';
    $sql = "SELECT * FROM tbl_departments";
    $result = mysqli_query($dbconn, $sql);
    while ($row=mysqli_fetch_array($result)){
        $output .='<option value="'.$row["dpt_id"].' ">'.$row["dpt_name"].'</option>';
    }
    return $output;
}
function selectEmpStatus(){
	global $dbconn;
    $output = ' ';
    $sql = "SELECT * FROM tbl_emp_status";
    $result = mysqli_query($dbconn, $sql);
    while ($row=mysqli_fetch_array($result)){
        $output .='<option value="'.$row["emp_status_id"].' ">'.$row["status"].'</option>';
    }
    return $output;
}
function selectOccupation(){
	global $dbconn;
	$output = ' ';
    $sql = "SELECT * FROM tbl_occupations";
    $result = mysqli_query($dbconn, $sql);
    while ($row=mysqli_fetch_array($result)){
        $output .='<option value=" '.$row["occupations_id"].' ">'.$row["occupation_name"].'</option>';
    }
    return $output;
}
function selectEmpId(){
	global $dbconn;
	$output = ' ';
    $sql = "SELECT * FROM tbl_employees_info";
    $result = mysqli_query($dbconn, $sql);
    while ($row=mysqli_fetch_array($result)){
        $output .='<option value=" '.$row["id"].' ">'.$row["emp_id"].'</option>';
    }
    return $output;
}


function countLeaves(){
	global $dbconn;
	$query = $dbconn->query("SELECT * FROM tbl_leaves");
	return mysqli_num_rows($query);
}

function countPendingLeaves(){
	global $dbconn;
	$query = $dbconn->query("SELECT * FROM tbl_leaves WHERE approval_status = 'p' ");
	return mysqli_num_rows($query);
}

function countDisciplinaries(){
	global $dbconn;
	$query = $dbconn->query("SELECT * FROM tbl_disciplinaries 
	LEFT JOIN tbl_employees_info ON tbl_disciplinaries.emp_id_fk = tbl_employees_info.id
	WHERE emp_status_fk = 1 ");
	return mysqli_num_rows($query);
}

function countPendingDisciplinaries(){
	global $dbconn;
	$query = $dbconn->query("SELECT * FROM tbl_disciplinaries 
	LEFT JOIN tbl_employees_info ON tbl_disciplinaries.emp_id_fk = tbl_employees_info.id
	WHERE appealed = 'no' AND emp_status_fk = 1 ");
	return mysqli_num_rows($query);
}

function countRecruitments(){
	global $dbconn;
	$query = $dbconn->query("SELECT * FROM tbl_recruitments ORDER BY created_at DESC");
	return mysqli_num_rows($query);
}

function countDepartments(){
	global $dbconn;
	$query = $dbconn->query("SELECT * FROM tbl_departments ORDER BY dpt_id DESC");
	return mysqli_num_rows($query);
}

