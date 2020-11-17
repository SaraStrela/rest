<?php
include_once 'database2.php';
session_start();
$result = mysqli_query($conn,"SELECT * FROM user_info");
?>

<!DOCTYPE html>
<html lang="en">
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

<style>

    #filldiv
{
   
    height: 100vh;
    background-color:white;
    
    background-position: center;
    background-size: cover;
    margin-bottom: 0cm;
    
}


    </style>
</head>
<body>

    <nav class="navbar navbar-dark navbar-custom">
        <a class="navbar-brand" href="index.html">
            <img src="img/light.gif" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
            Art Station
        </a>
        
        


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
                <a class="nav-link" href="getalbums.html">Fan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="news.php">News</a>
              </li>

            </ul>
          
    </nav>
    <div class="jumbotron" id="filldiv">
<table>
	<tr>
	<td>Name</td>
	<td>User Name</td>
	<td>Password</td>
	<td>Role</td>
	</tr>
	<?php
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">
	<td><?php echo $row["name"]; ?></td>
	<td><?php echo $row["username"]; ?></td>
	<td><?php echo $row["password"]; ?></td>
	<td><?php echo $row["role"]; ?></td>
	<td><a href="deleteuser-process.php?username=<?php echo $row["username"]; ?>">Delete</a></td>
	</tr>
	<?php
	$i++;
	}
	?>
</table>
</div>
<footer>
        <p>
            Copyright © 2020 Moon Art Studio. All rights reserved.
        </p>

    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    

</body>
</html>