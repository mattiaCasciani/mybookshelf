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
            background: white; 
            height:95px;
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
            margin-top:15px;
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
            border:1px solid red;
            min-height:70vh;
            margin-top:95px;
            width:100%;
        }
    </style>



        <div class="header">
            <img src="bookshelf.png" href="https://minecraft.fandom.com/wiki/Bookshelf" class="bookshelf">
            <h1 class="title__header">MyBookshelf</h1>
            <input type="text" id="cerca" name="cerca" placeholder="cerca" class="bar">
        </div>
        
        
        <div class="container__file">
            <div class="grid">
                
            </div>
        </div>
</body>
</html>
