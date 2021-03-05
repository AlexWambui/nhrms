<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Manage Responsibilites</title>
    <link rel='stylesheet' href='../../resources/css/bootstrap.min.css'>
    <link rel='stylesheet' href='../../resources/css/icomoon.css'>
    <link rel='stylesheet' href='../../resources/css/styles.css'>
]</head>
<body>
<?php 
    include_once "../../app/functions.php";
    require_once "../includes/side_nav.php";
    include_once "../../app/dbh.php";
?>
<div class="main_content container settings">
    <div class="container dpt_settings row">
        <div class="col">
            <div class="table_header">
                <div class="heading">
                    <h1>Departments</h1>
                </div>
                <div class="action">
                    <button onclick="document.getElementById('pop_form').style.display='block'" class="btn btn-success"><span class="icon-plus-circle"></span> Add</button>
                </div>
            </div>
            <?php
                $sql= "SELECT * FROM tbl_departments ";
                $query = $dbh -> prepare($sql);
                $query->bindParam(':bid',$bid, PDO::PARAM_STR);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
            ?>                
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>HOD</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <?php
                    if($query->rowCount() > 0){
                        foreach($results as $result){ 
                ?>                    
                <tbody>
                    <tr>
                        <td><?php echo htmlentities($result->dpt_name); ?></td>
                        <td><?php echo htmlentities($result->hod); ?></td>
                        <td>
                            <form action="_update_dpt.php" method="post"> 
                                <input type="hidden" name="edit_id" value="<?php echo htmlentities($result->dpt_id); ?>">
                                <button class="btn btn-link btn-sm " type="submit" name="edit_dpt"><span class="icon-edit"></span> Edit</button>
                            </form>
                            <!-- <div class="table_edit_buttons">
                                <form action="_update_departments.php" method="post"> 
                                    <input type="hidden" name="edit_id" value="<?php echo $row['dpt_id']; ?>">
                                    <button class="btn btn-link btn-sm " type="submit" name="edit_btn"><span class="icon-edit"></span> Edit</button>
                                </form>
                                <form action="_delete_departments.php" method="post"> 
                                    <input type="hidden" name="edit_id" value="<?php echo htmlentities($result->dpt_id); ?>">
                                    <button class="btn btn-danger btn-sm " type="submit" name="edit_btn"><span class="icon-trash"></span> Delete</button>
                                </form>
                            </div> -->
                        </td>
                    </tr>
                </tbody>
                <?php
                        }
                    }else{
                        echo "no record found";
                        }  
                    ?>
            </table>
            <div id="pop_form" class="modal pop_form_container pop_form_settings">
                <form autocomplete="off" class="pop_form animate" action="_add_dpts.php" method="post">
                    <div class="form-group">
                        <label for ="dpt_name">department name:</label>
                        <input type="text" class="form-control" name="dpt_name" id="dpt_name" placeholder="Department name" required>
                    </div>         
                    <div class="form-group">
                        <label for ="hod_name">HOD:</label>
                        <input type="text" class="form-control" name="hod_name" id="hod_name" placeholder="HOD's Name" required>
                    </div>      
                    <div class="submit_buttons">
                        <button type="submit" class="save_btn" name="add_dpt">Save</button>
                        <button type="button" class="cancel_btn" onclick="document.getElementById('pop_form').style.display='none'" class="cancelbtn">Cancel</button>
                    </div>
                </form>
            </div>       
        </div>

        <div class="col">
            <div class="table_header">
                <div class="heading">
                    <h1>Occupations</h1>
                </div>
                <div class="action">
                    <button onclick="document.getElementById('pop_form_occupations').style.display='block'" class="btn btn-success"><span class="icon-plus-circle"></span> Add</button>
                </div>
            </div>
            <?php
                $sql= "SELECT * FROM tbl_occupations ";
                $query = $dbh -> prepare($sql);
                $query->bindParam(':bid',$bid, PDO::PARAM_STR);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
            ?>                
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>occupation</th>
                        <th>responsibilities</th>
                        <th>basic_salary</th>
                        <th>house_allowance</th>
                        <th>medical_allowance</th>
                        <th>travel_allowance</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <?php
                    if($query->rowCount() > 0){
                        foreach($results as $result){ 
                ?>                    
                <tbody>
                    <tr>
                        <td><?php echo htmlentities($result->occupation_name); ?></td>
                        <td><?php echo htmlentities($result->responsibilities); ?></td>
                        <td><?php echo htmlentities($result->basic_salary); ?></td>
                        <td><?php echo htmlentities($result->house_allowance); ?></td>
                        <td><?php echo htmlentities($result->medical_allowance); ?></td>
                        <td><?php echo htmlentities($result->travel_allowance); ?></td>
                        <td>
                        <form action="_update_occupation.php" method="post"> 
                            <input type="hidden" name="edit_id" value="<?php echo htmlentities($result->occupations_id); ?>">
                            <button class="btn btn-link btn-sm " type="submit" name="edit_occupation"><span class="icon-edit"></span> Edit</button>
                        </form>
                </td>
                    </tr>
                </tbody>
                <?php
                        }
                    }else{
                        echo "no record found";
                        }  
                ?>
            </table>     
            <div id="pop_form_occupations" class="modal pop_form_container pop_form_settings">
                <form autocomplete="off" class="pop_form animate" action="_add_occupations.php" method="post">
                    <div class="form-group">
                        <label for ="occupation">Occupation:</label>
                        <input type="text" class="form-control" name="occupation" id="occupation" placeholder="Occupation" required>
                    </div>         
                    <div class="form-group">
                        <label for ="responsibilities">Responsibilites:</label>
                        <input type="text" class="form-control" name="responsibilities" id="responsibilities" placeholder="Responsibilities" required>
                    </div>    
                    <div class="form-group">
                        <label for ="basic_salary">Basic Salary:</label>
                        <input type="number" class="form-control" name="basic_salary" id="basic_salary" placeholder="Basic Salary" required>
                    </div>      
                    <div class="form-group">
                        <label for ="house_allowance">House Allowance:</label>
                        <input type="number" class="form-control" name="house_allowance" id="house_allowance" placeholder="House Allowance" required>
                    </div>      
                    <div class="form-group">
                        <label for ="medical_allowance">Medical Allowance:</label>
                        <input type="number" class="form-control" name="medical_allowance" id="medical_allowance" placeholder="Medical Allowance" required>
                    </div>      
                    <div class="form-group">
                        <label for ="travel_allowance">Travel Allowance:</label>
                        <input type="number" class="form-control" name="travel_allowance" id="travel_allowance" placeholder="Travel Allowance" required>
                    </div>      
                    <div class="submit_buttons">
                        <button type="submit" class="save_btn" name="add_dpt">Save</button>
                        <button type="button" class="cancel_btn" onclick="document.getElementById('pop_form_occupations').style.display='none'" class="cancelbtn">Cancel</button>
                    </div>
                </form>
            </div>   
        </div>

    </div>
</div>
</body>
</html>

    