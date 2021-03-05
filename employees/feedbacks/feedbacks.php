<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Feedbacks</title>
    <link rel='stylesheet' href='../../resources/css/bootstrap.min.css'>
    <link rel='stylesheet' href='../../resources/css/icomoon.css'>
    <link rel='stylesheet' href='../../resources/css/styles.css'>
    <script src="../../app/ajax search/jquery.min.js"></script>
    <script src="../../app/ajax search/search.js"></script>
</head>
<body>
    <div class="main_content container employees">
        <header>
            <?php 
                require_once "../includes/user_sidenav.php";
                include_once "../../app/dbh.php";
            ?>
        </header>
        <section>
<?php
$id = $_SESSION['user'];
$sql= "SELECT * FROM tbl_feedbacks 
LEFT JOIN tbl_employees_info ON tbl_feedbacks.emp_id = tbl_employees_info.emp_id
WHERE tbl_feedbacks.emp_id = '$id' ORDER BY date_posted DESC";
$query = $dbh -> prepare($sql);
$query->bindParam(':bid',$bid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0){
    foreach($results as $result){ 
 ?>                

            <div class="container feedback_messages">
                <div class="message">
                    <img src="../../resources/images/user_images/<?php echo htmlentities($result->profile_picture);?>" alt="Avatar">
                    <p><?php echo htmlentities($result->comment); ?></p>
                    <span class="time-right"><?php echo htmlentities($result->date_posted); ?></span>
                </div>
                <div class="reply">
                    <p><?php echo htmlentities($result->reply); ?></p>
                    <span class="time-left">Admin</span>
                </div>

            </div>
<?php
    }
}else{
    // echo "No Comments Yet";
    // echo "ERROR: Could not able to execute $sql. " . mysqli_error($sql);
}  
?>
        <button class="open-button" onclick="openForm()">New Comment</button>
        <div class="chat-popup" id="chatForm">
        <form action="_add_feedback.php" method="post" class="form-container">
            <label for="comment"><b>Message</b></label>
            <textarea placeholder="Type message.." name="comment" required></textarea>
            <button type="submit" class="btn">Send</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
        </div> 
        </section>

    </div>       
<script>
function openForm() {
  document.getElementById("chatForm").style.display = "block";
}

function closeForm() {
  document.getElementById("chatForm").style.display = "none";
} 
// Get the modal
var modal = document.getElementById('pop_form');
// When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//     }
// }
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
</body>
</html>

    