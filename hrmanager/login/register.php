<!DOCTYPE html>
    <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Code</title>
            <link rel='stylesheet' href='../../resources/css/icomoon.css'>
            <link rel='stylesheet' href='../../resources/css/styles.css'>
</head>
<body>
    <div class="login_system">
            <div class="login_form">
            <form id="register" autocomplete="off" class="form_login_containers" method="post" action="super_admin.php">
                <input type="text" name="first_name" id="first_name" class="login_inputs" placeholder="First Name" autofocus required>
                <input type="text" name="last_name" id="last_name" class="login_inputs" placeholder="Last Name" required>
                <input type="text" name="username" class="login_inputs" placeholder="Username" required>
                <input type="email" name="email_address" class="login_inputs" placeholder="Email Address" required>
                <input type="password" name="password"class="login_inputs" placeholder="Password" required>
                <input type="password" name="pwd_repeat" id="pwd-repeat" class="login_inputs" placeholder="Repeat Password" required > <br><br>
                <button type="submit" class="login_buttons" name="register_admin">Register</button>
            </form>
        </div>
    </div>
 
</body>
</html>            
