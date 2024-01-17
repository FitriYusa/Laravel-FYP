<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flexwaves</title>

    @vite('resources/css/app.css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">


    <style>
        html, body{
            background-color: #ffff;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .leading-text{
            font-size: 30px;
            font-family: "Nunito";
            color: #8080D7;
        }

        .list{
            font-size: 20px;
            font-family: "Nunito";
            color: #8080D7;
        }

        .list:hover{
            font-size: 20px;
            font-family: "Nunito";
            color: #9898ff;
        }

        .center{
            background: #ebebeb;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>