<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Document</title>
    <meta name="generator" content="Jekyll v4.1.1">
    

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="custom.css">
    

        <!-- Bootstrap core CSS -->
<link href="/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="showpublicservice.js"></script>

        <style>
 
    #filldiv
{
   
    height: 100vh;
    background-color:black;
    background-image:url(img/bg.png);
    background-position: center;
    background-size: cover;
    margin-bottom: 0cm;
 
    font-size: 150%;
    
    
}




    </style>

    </head>

    <body>
    <nav class="navbar navbar-dark navbar-custom">
        <a class="navbar-brand" href="index.html">
            <img src="img/light.gif" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
            Art Station
        </a>
        
        
        <a class="btn btn-large btn-light mr-auto" href="login.php" >Login</a>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="showartist.html">Artist</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="getalbums.html">Concert</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="news.php">Community Board</a>
              </li>

            </ul>
          
    </nav>
        <center>
        <div class="jumbotron" id="filldiv">
            <br>
            
            <h3 class="activity">Activity: </h3>
            <p class="type">Type: </p>
            <p class="participants">Participants: </p>
            <p class="price">Price: </p>
            <br>
            <br>
            <br>
            <p> Or read our newspaper here: </p><p><a href="http://localhost/rest/novosti.json">All news</a></p> <p> <a href="http://localhost/rest/kategorije.json">Read by category</a></p>
            
            </center>
        </div>

        <footer>
        <p>
            Copyright © 2020 Moon Art Studio. All rights reserved.
        </p>

    </footer>
    </body>





</html>