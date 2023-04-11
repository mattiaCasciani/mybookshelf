<?php
    session_start();
    require_once "dbconnect.php";
    $email=$_SESSION['e-mail'];
    $id=$_SESSION['id'];
    if(!isset($_SESSION['e-mail'])|| $_SESSION['e-mail'] =="") {
        header("Location: index.php");
    }
    $path = "cartelle/".$_SESSION['e-mail'];
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
        touch($path.'/.conf.txt');
        fwrite($id."\n");
    }

?>



<!DOCTYPE html>
<html lang="it" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pico.min.css"> 
    <title>Home</title>
    <link rel="icon" type="image/x-icon" href="bookshelf.png">
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
            max-width:120px;
            height:60px;
            top:0px;
            margin:10px;
        }
        .search{
            width:20px;
        }
    </style>



    <div class="header">
        <a href="index.php"><img src="bookshelf.png" class="bookshelf"></a>
        <a href="index.php" style="text-decoration:none;"><h1 class="title__header">MyBookshelf</h1></a>
        <button onclick="location.href='dashboard.php'">torna alla home!</button>
    </div>
        
        
    <div class="container__file">
        <?php  
            $nome = "%".$_POST['cerca']."%";
            $result=mysqli_query($conn, "SELECT nome,estensione FROM file WHERE file.idUtente = '$id' AND file.nome LIKE '$nome'");
            $i=0;
            $rows=array();
            while($record = mysqli_fetch_array($result)){
                $rows[]=$record;
            }
            $i=0;
            while ($i < sizeof($rows)) { ?>
                <div class="row">
                <?php
                for ($j=0; $j < 5; $j++) { 
                    
                    if ($i < sizeof($rows)) {
                    ?>
                    
                        <div class="img__box" id="box__<?php echo $rows[$i]['nome'];?>">
                            <a href="download.php?path=<?php echo 'cartelle/'.$email.'/'.$rows[$i]['nome'];?>"><img class="icon" src=<?php 
                                                        $imgs = scandir("img/");
                                                        if(in_array(strtoupper($rows[$i]['estensione']).".svg",$imgs)){
                                                            $name=strtoupper($rows[$i]['estensione']);
                                                            echo "img/".$name.".svg";
                                                        }
                                                        else
                                                            echo "img/DOC.svg";?>></a>
                            <p id="<?php echo $rows[$i]['nome'];?>"><?php echo $rows[$i]['nome'];?></p>
                        </div>
                    
                    <?php
                    }
                    $i++;
                }
                echo "</div>";
                echo "<br>";
            }    
        ?>
    </div>
    
</body>
</html>
