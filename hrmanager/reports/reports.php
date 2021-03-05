<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Reports</title>
    <link rel='stylesheet' href='../../resources/css/bootstrap.min.css'>
    <link rel='stylesheet' href='../../resources/css/icomoon.css'>
    <link rel='stylesheet' href='../../resources/css/styles.css'>
</head>
<body >
    <div class="main_content container reports">
        <header>
            <?php 
                require_once "../includes/side_nav.php";
                include_once "../../app/dbh.php";
            ?>
        </header>
        <section>
        <div class="containter row">
            <div class="col">
                <h1>Print</h1>
                <a href="_print_payslips.php" target="_blank"><button class="print_buttons">Pay Roles </button></a>
                <a href="_print_active_employees.php" target="_blank"><button class="print_buttons">Active Employees <span><sup>(<?php echo countActive(); ?>)</sup></span></button></a>
                <a href="_print_inactive_employees.php" target="_blank"><button class="print_buttons">Inactive Employees <span><sup>(<?php echo countInactive(); ?>)</sup></span></button></a>
                <a href="_print_leaves.php" target="_blank"><button class="print_buttons">Leaves <span><sup>(<?php echo countLeaves(); ?>)</sup></span></button></a>
                <a href="_print_recruitments.php" target="_blank"><button class="print_buttons">Recruitments <span><sup>(<?php echo countRecruitments(); ?>)</sup></span></button></a>
            </div>
            <div class="col">
                <h1>Download</h1>
                <a href="_download_active_employees.php" target="_blank"><button class="print_buttons">Active Employees <span><sup>(<?php echo countActive(); ?>)</sup></span></button></a>
                <a href="_download_inactive_employees.php" target="_blank"><button class="print_buttons">Inactive Employees <span><sup>(<?php echo countInactive(); ?>)</sup></span></button></a>
                <a href="_download_leaves.php" target="_blank"><button class="print_buttons">Leaves <span><sup>(<?php echo countLeaves(); ?>)</sup></span></button></a>
                <a href="_download_recruitments.php" target="_blank"><button class="print_buttons">Recruitments <span><sup>(<?php echo countRecruitments(); ?>)</sup></span></button></a>
            </div>
        </div>
        </section>
    </div>       
</body>
</html>

    