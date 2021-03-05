<!DOCTYPE html>
    <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Welcome</title>
            <link rel='stylesheet' href='../../resources/css/bootstrap.min.css'>
            <link rel='stylesheet' href='../../resources/css/icomoon.css'>
            <link rel='stylesheet' href='../../resources/css/styles.css'>
        </head>
<body>
<?php 
    require_once "side_nav.php";
    require_once "../../app/functions.php" ;
?>
    <div class="main_content container welcome">
        <section>
            <div class="statistics row">
                <div class="col">
                    <ul>
                        <li>
                            <h1>Employees</h1>
                            <p><a class="buttonr" href="../employees/employees.php"><span class="icon-users"></span> Total : <?php echo countEmployees(); ?></a></p>
                            <p><a class="buttonr" href="../employees/employees.php"><span class="icon-users"></span> Active : <?php echo countActive(); ?></a></p>
                            <p><a class="buttonr" href="../employees/_archived_employees.php"><span class="icon-users"></span> Archived : <?php echo countInactive(); ?></a></p>
                        </li>
                    </ul>
                </div>
                <div class="col">
                    <ul >
                        <li>
                            <h1>Leaves</h1>
                            <p><a class="buttonr" href="../leaves/leaves.php"><span class="icon-users"></span> Total : <?php echo countLeaves(); ?></a></p>
                            <p><a class="buttonr" href="../leaves/leaves.php"><span class="icon-users"></span> Pending : <?php echo countPendingLeaves(); ?></a></p>
                        </li>
                    </ul>
                </div>
                <div class="col">
                    <ul>
                        <li>
                            <h1>Disciplinaries</h1>
                            <p><a class="buttonr" href="../disciplinaries/disciplinaries.php"><span class="icon-users"></span> Total : <?php echo countDisciplinaries(); ?></a></p>
                            <p><a class="buttonr" href="../disciplinaries/disciplinaries.php"><span class="icon-users"></span> Pending : <?php echo countPendingDisciplinaries(); ?></a></p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <footer>
            <p><span class="icon-home"></span> welcome admin 2/10/2020</p>
        </footer>
    </div>            
</body>
</html>

    