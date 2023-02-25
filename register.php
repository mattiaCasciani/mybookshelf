<?php
    require_once "dbconnect.php";
    if (isset($_POST['registra'])) {
        $email = $_POST['e-mail'];
        $password = $_POST['password'];
        
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $email_error = "usa una mail valida!!";
        }
        if(strlen($password) < 6) {
            $password_error = "la password deve avere almeno 6 caratteri!!!";
        }
        $result = mysqli_query($conn, "SELECT * FROM utente WHERE email='$email' AND password='$password'");
        $row = mysqli_fetch_array($result);
        if(empty($row)){
            if(mysqli_query($conn, "INSERT INTO utente(email, password) VALUES('" . $email  . "', '" . $password . "')")) {
                header("location: login.php");
                exit();
            } else {
                echo "Error:  : " . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html data-theme="light">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/pico.min.css"> 
        <title></title>
    </head>
    <body>


    <style>
        .header{
            width:100%;
            display:inline-flex;
            margin-top:5px;
        }
        .title{
            width:100%;
            text-align:center;
        }
        .container__form{
            display:block;
            max-width: 800px;
            margin:auto;
        }
        .container{
            transform: translateY(50%);
        }
        .bookshelf{
            height:80px;
        }
        .title__header{
            font-size:40px;
            vertical-align: middle;
            transform: translateY(+15%);
        }
        .button{
            position:absolute;
            height:60px;
            margin:10px;
            right:0px;
        }
    </style>




        <div class="header">
            <img src="bookshelf.png" href="https://minecraft.fandom.com/wiki/Bookshelf" class="bookshelf">
            <h1 class="title__header">MyBookshelf</h1>
            <a href="index.php" role="button" class="button">indietro</a>
        </div>
        <div class="container">
            <h1 class="title">Registrati</h1>
            <form action="register.php" method="post"class="container__form">
                <div class="container__box">
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
                    <button type="submit" name="registra">Invia</button>
                </div>
            </form>
        </div>
    </body>
</html>
