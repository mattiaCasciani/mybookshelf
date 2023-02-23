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
        .container{
            transform: translateY(50%);
        }

        .title{
            font-size:90px;
            vertical-align: middle;
            transform: translateY(+20%);
        }

        .title__cont{
            display:flex;
            align-items: center;
        }



        .bookshelf{
            height: 250px;
        }

        .container__title{
            display: inline-flex;
        }

        .container__box{
            display: block;
            text-align:center;
        }
    </style>



    <main class="container">
        <div class="container__box">
            <div class="container__title">
                <img src="bookshelf.png" href="https://minecraft.fandom.com/wiki/Bookshelf" class="bookshelf">
                <div class="title__cont">
                    <h1 class="title">MyBookshelf</h1>
                </div>
            </div>
            <div class="grid">
                <a href="#" role="button">login</a>
                <a href="#" role="button" class="secondary">registrati</a>
            </div>
        </div>    
    </main>
</body>
</html>
