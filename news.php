<!DOCTYPE html>
<html>
<head>
<title>Pregled novosti</title>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
    <title>Document</title>
    <meta name="generator" content="Jekyll v4.1.1">
    

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="custom.css">

    <!-- Bootstrap core CSS -->
<link href="/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">



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
              <li class="nav-item">
                <a class="nav-link" href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="showartist.html">Artist</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="getalbums.html">Concert <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="news.php">Community Board</a>
              </li>

            </ul>
          
    </nav>



<main role="main" class="container">

      <div class="starter-template">
        
      <?php
include "konekcija.php";
if (isset ($_GET['akcija'])){
if ($_GET['akcija'] == 'unos'){
?>
<p>Write a new post</p>

<form method="post" action="?akcija=unos">
Title <input type="text" name="naslov" /><br/>
Content <textarea name="tekst"></textarea><br/>
<button name="unos" type="submit" class="btn btn-primary">Done</button>

</form>
<?php
if (isset($_POST["unos"])){
//Prikupljanje podataka sa forme

if (isset($_POST['naslov'])&&isset($_POST['tekst'])){
$naslov = $_POST['naslov'];
$tekst = $_POST['tekst'];

//Operacije nad bazom
include "konekcija.php";
$sql="INSERT INTO novosti (naslov, tekst) VALUES ('".$naslov."', '".$tekst."')";
if ($mysqli->query($sql)){
echo "<p>Novost je uspešno ubačena.</p>";
} else {
echo "<p>Nastala je greška pri ubacivanju novosti</p>" . mysqli_error();
}
} else {
//Ako POST parametri nisu prosleđeni
echo "Nisu prosleđeni parametri!";
}
}
}
}

if (isset ($_GET['akcija']) && isset ($_GET['idnovost'])){
$akcija = $_GET['akcija'];
$id = $_GET['idnovost'];
switch ($akcija){
case "brisanje":
$upit = "DELETE FROM novosti WHERE idnovost = ".$id;
if (!$q=$mysqli->query($upit)){
echo "Nastala je greska pri izvodenju upita<br/>" . mysql_query();
die();
} else {
echo "<p>Brisanje zapisa je uspešno!</p>";
}
break;
case "izmena_forma":
$upit="SELECT idnovost, naslov, tekst FROM novosti WHERE idnovost=".$id;
if (!$q=$mysqli->query($upit)){
echo "<p>Nastala je greska pri izvodenju upita</p>" . mysql_query();
die();
} else {
if ($q->num_rows!=1){
echo "<p>Nepostojeća novost.</p>";
} else {
$novost = $q->fetch_object();
$naslov = $novost->naslov;
$tekst = $novost->tekst;
?>
<p>Edit post</p>
<form method="post" action="?akcija=izmena&idnovost=<?php echo $_GET['idnovost'];?>">
Title <input type="text" name="naslov" value="<?php echo $naslov;?>"/><br/>
Text <textarea name="tekst"><?php echo $tekst;?></textarea><br/>
<button name="izmena&idnovost" type="submit" class="btn btn-primary">Save changes</button>
</form>
<?php
}
}

break;
case "izmena":
if (isset ($_POST['naslov']) && isset ($_POST['tekst'])){
$naslov = $_POST['naslov'];
$tekst = $_POST['tekst'];
$upit="UPDATE novosti SET naslov='". $naslov ."', tekst='" . $tekst . "' WHERE idnovost=". $id;
if ($mysqli->query($upit)){
if ($mysqli->affected_rows > 0 ){
echo "<p>Novost je uspešno izmenjena.</p>";
} else {
echo "<p>Novost nije izmenjena.</p>";
}
} else {
echo "<p>Nastala je greška pri izmeni novosti</p>" . mysql_error();
}
} else {
echo "<p>Nisu prosleđeni parametri za izmenu";
}
break;
default:
echo "<p>Nepostojeća akcija!</p>";
break;
}
}
$sql="SELECT idnovost, naslov, tekst FROM novosti";
if (!$q=$mysqli->query($sql)){
echo "Nastala je greska pri izvodenju upita<br>" . mysql_query();
die();
}
if ($q->num_rows==0){
echo "Nema novosti";
} else {
?>


<br>

<br>

<table>
<tr>

</tr>
<?php
while ($red=$q->fetch_object()){
?>
<tr>
<div class="jumbotron">
  <h1 class="display-4"><?php echo $red->naslov; ?></h1>
  <p class="lead"><?php echo $red->tekst; ?></p>
  <a href="?akcija=izmena_forma&idnovost=<?php echo $red->idnovost; ?>">✏️</a>
  <a href="?akcija=brisanje&idnovost=<?php echo $red->idnovost; ?>">🗑</a>

  <hr class="my-4">

  <p>Share this news with your friends!</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Share</a>
  </p>

</div>

</tr>
<?php
}
?>
</table>
<?php
}
$mysqli->close();
?>


<p>

<a href="?akcija=unos">New post</a>
</p>

      </div>

    </main>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    

</body>

<footer>
        <p>
            Copyright © 2020 Moon Art Studio. All rights reserved.
        </p>

    </footer>

</html>
