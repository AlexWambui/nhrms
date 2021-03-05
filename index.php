<!DOCTYPE HTML>
<html>
<head>
    <title>Login | Register</title>
    <link rel="stylesheet" href="resources/css/icomoon.css">
    <link rel="stylesheet" href="resources/css/styles.css">
</head>
<body>
<div class="login_system">
    <div class="login_form employee">
        <h2 class="login_app_name">NHRMS</h2>
        <form autocomplete="off" id="login" class="form_login_containers" method="post" action="employees/login/validation.php">
            <input type="text" name="emp_id" class="login_inputs" placeholder="Employee ID" required autofocus >
            <input type="number" name="id_number" class="login_inputs" placeholder="National ID Number" required><br><br>
            <div class="submit_login_buttons">
                <button type="submit" class="login_buttons" name = "user_login">Login</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>