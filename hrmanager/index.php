<!DOCTYPE HTML>
<html>
<head>
        <title>Login | Register</title>
        <link rel="stylesheet" href="../resources/css/icomoon.css">
        <link rel="stylesheet" href="../resources/css/styles.css">
</head>
<body>
<div class="login_system">
    <div class="login_form">
            <h2 class="login_app_name">NHRMS</h2>
            <form id="login" class="form_login_containers" method="post" action="login/validation.php">
                <input type="text" name="username" class="login_inputs" placeholder="Username" required autofocus autocomplete="off">
                <input type="password" name="password" class="login_inputs" placeholder="Password" required><br><br>
                <button type="submit" class="login_buttons" name="login_admin">Login</button>
            </form>
    </div>
</div>
</body>
</html>