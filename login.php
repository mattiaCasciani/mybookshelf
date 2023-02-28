<?php
    session_start();
    require_once "dbconnect.php";
    if(isset($_SESSION['e-mail'])&& $_SESSION['e-mail'] !="") {
        header("Location: dashboard.php");
    }
    if (isset($_POST['login'])) {
        $email = $_POST['e-mail'];
        $password = md5($_POST['password']);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $email_error = "usa una mail valida!!";
        }
        if(strlen($password) < 6) {
            $password_error = "la password deve avere almeno 6 caratteri!!!";
        }  
        $result = mysqli_query($conn, "SELECT * FROM utente WHERE email='$email' AND password='$password'");
        $row = mysqli_fetch_array($result);
        if(!empty($row)){
            $_SESSION['e-mail'] = $email;
            header("Location: dashboard.php");
        }else {
            $error_message = "mail o password sbagliati !!!";
        }
    }
    ?>
<!DOCTYPE html>
<html data-theme="light">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/pico.min.css"> 
        <title>Accedi</title>
    <link rel="icon" type="image/x-icon" href="bookshelf.png">
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
            <h1 class="title">Login</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"class="container__form">
                <div class="container__box">
                    <label for="E-mail">
                        E-mail
                        <input type="email" id="e-mail" name="e-mail" placeholder="e-mail" required>
                        <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                    </label>
                    
                    <label for="Password">
                        Password
                        <input type="password" id="password" name="password" placeholder="password" required>
                        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                    </label>
                    <input type="submit" class="btn btn-primary" name="login" value="entra">

                </div>
            </form>
        </div>
    </body>
</html>
