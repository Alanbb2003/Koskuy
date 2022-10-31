<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FAI | @yield("title")</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        body{
          margin:0;
          padding:0;
          height:100%;
          
          position: relative;
        }
        footer {
            text-align: center;
            width: 100%;
            position: fixed;
            bottom: 0;
            left: 0%;
            background-color: rgb(180, 134, 73);
        }
        img{
            height: 100px;
            width: 100px;
        }
    </style>
</head>
<body>
    @include('template.navbarLoggedAdmin')

<div class="container">
    @yield("content")
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script> 
</body>
</html>
