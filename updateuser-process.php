<?php
include_once 'database2.php';
if(count($_POST)>0) {
$get_data = mysqli_query($conn, "SELECT * from user_info where $username ='" . $_POST['username'] . "'");
mysqli_query($conn,"UPDATE user_info set name='" . $_POST['name'] . "', username='" . $_POST['username'] . "', password='" . $_POST['password'] . "', role='" . $_POST['role'] . "'  WHERE username='" . $_POST['username'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM user_info WHERE username='" . $_GET['username'] . "'");
$row= mysqli_fetch_array($result);
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


<script language="javascript">
function check()
{
 
 if(document.frmUser.pass.value=="")
  {
    alert("Plese Enter Your Password");
	document.frmUser.pass.focus();
	return false;
  } 
  if(document.frmUser.cpass.value=="")
  {
    alert("Plese Enter Confirm Password");
	document.frmUser.cpass.focus();
	return false;
  }
  if(document.frmUser.pass.value!=document.frmUser.cpass.value)
  {
    alert("Confirm Password does not matched");
	document.frmUser.cpass.focus();
	return false;
  }
  if(document.frmUser.name.value=="")
  {
    alert("Plese Enter Your Name");
	document.frmUser.name.focus();
	return false;
  }
 
  return true;
  }
  
</script>
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
<form name="frmUser" method="post" action="" onSubmit="return check()";>
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
</div>

First Name: <br>
<input type="text" name="name" class="txtField" value="<?php echo $row['name']; ?>">
<br>

Username: <br>
<input type="hidden" name="username" class="txtField" value="<?php echo $row['username']; ?>">
<input type="text" name="username"  value="<?php echo $row['username']; ?>">
<br>

Password: <br>
<input type="text" name="password" class="txtField" value="<?php echo $row['password']; ?>">
<br>

Account Type :<br>
<input type="radio" id="role" name="role" value="<?php echo $row['role']; ?>">Artist<input type="radio" id="role" name="role" value="<?php echo $row['role'];  ?>">Fan
<br>

<input type="submit" name="submit" value="Submit" class="buttom">
<a href="login.php" >Cancel</a>
</form>
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