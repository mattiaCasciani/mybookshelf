<?php
    session_start();
    require_once "dbconnect.php";
    $email=$_SESSION['e-mail'];
    if(!isset($_SESSION['e-mail'])|| $_SESSION['e-mail'] =="") {
        header("Location: index.php");
    }
    $path = "cartelle/".$_SESSION['e-mail'];
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
        touch($path.'/.conf.txt');
        $result = mysqli_query($conn, "SELECT id FROM utente WHERE email='$email'");
        $row=mysqli_fetch_array($result);
        $myfile = fopen($path."/.conf.txt", "w") or die("Unable to open file!");
        fwrite($myfile,$row['id']."\n");
    }
    $files = scandir($path);

?>



<!DOCTYPE html>
<html lang="it" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pico.min.css"> 
    <title>Document</title>
</head>
<body>

    <style>
        body{
            min-height:100vh;
        }
        .header{
            display:inline-flex;
            padding-top:5px;
            position:fixed;
            width:100%;
            height:95px;
            background:white;
            z-index:999;
        }
        .bookshelf{
            height:80px;
        }
        .title__header{
            font-size:40px;
            vertical-align: middle;
            transform: translateY(+15%);
        }
        .bar{
            max-width:60%;
            margin-top:10px;
            position: absolute;
            right:50%;
            transform: translateX(+50%);
        }

        .file{
            width:200px;
            height:200px;
        }
        
        .container__file{
            position:absolute;
            min-height:70vh;
            margin-top:95px;
            width:100%;
        }
        
        .icon{
            min-width:100px;
            max-width:100px;
        }

        .row{
            margin-left:50%;
            transform: translateX(-50%);
            border:auto;
            justify-content:center;
            display:inline-flex;
        }

        .img__box{ 
            padding:10px;
            margin:25px 15%;
            text-align:center;
        }

        .upload{
            position:absolute;
            right: 0px;
            width:150px;
            margin: 10px;
            height:60px;
            top:0px;
        }

        .uploadFile{
            position:absolute;
            right:160px;
            max-width:100px;
            height:60px;
            top:0px;
            margin:10px;
        }
    </style>



    <div class="header">
        <a href="index.php"><img src="bookshelf.png" class="bookshelf"></a>
        <a href="index.php" style="text-decoration:none;"><h1 class="title__header">MyBookshelf</h1></a>
        <input type="text" id="cerca" name="cerca" placeholder="cerca - funzionerà nei prossimi aggiornamenti" class="bar"> 
        <form method="POST" action="upload.php" enctype="multipart/form-data">
            <label for="file-upload"><input type="file" id="file-upload" name="uploadedFile" class="uploadFile"></label>
            <button type="submit" name="uploadBtn" value="Upload" class="upload" >carica</button>
        </form>
    </div>
        
        
    <div class="container__file">
        <?php
                    
        $a=2;
            while ($a < sizeof($files)) { ?>
                <div class="row">
                <?php
                for ($i=0; $i < 5; $i++) { 
                    
                    if ($a < sizeof($files)) {
                    ?>
                    
                        <div class="img__box">
                            <a href="download.php?path=<?php echo 'cartelle/'.$email.'/'.$files[$a];?>"><img class="icon" src=<?php $tmp=substr($files[$a],(strlen($files[$a])-3));
                                                        $tmp=strtoupper($tmp);
                                                        $imgs = scandir("img/");
                                                        if(in_array($tmp.".svg",$imgs))
                                                            echo "img/".$tmp.".svg";
                                                        else
                                                            echo "img/DOC.svg";?>></a>
                            <p><?php echo substr($files[$a],0);?></p>
                        </div>
                    
                    <?php
                    }
                    $a++;
                }
                echo "</div>";
                echo "<br>";
            }    
        ?>
    </div>
    <script src="script.js"></script>
</body>
</html>
