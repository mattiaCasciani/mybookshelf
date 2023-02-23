<?php
    session_start();
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $email_error = "Please Enter Valid Email ID";
        }
        if(strlen($password) < 6) {
            $password_error = "Password must be minimum of 6 characters";
        }  
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css">
        <title></title>
    </head>
    <body>
        <h1>LOGIN<h1/>
        <form action="index.php" method="post">
            <div class="grid">
                <label for="E-mail">
                    E-mail
                    <input type="text" id="e-mail" name="e-mail" placeholder="e-mail" required>
                    <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                </label>
                
                <label for="Password">
                    Password
                    <input type="password" id="password" name="password" placeholder="password" required>
                    <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                </label>
                
                <button type="submit">Invia</button>
            </div>
        </form>
    </body>
</html>
