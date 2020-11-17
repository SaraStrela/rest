<!DOCTYPE html>
<html>
<head>
<title>CRUD</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h1>New post</h1>
<hr/>
<form method="post" action="">
Title : <input type="text" name="naslov" /><br/>
Text : <textarea name="tekst"></textarea><br/>
<input type="submit" name="unos" value="Ubaci" />
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
if (mysql_query($sql))
{
echo "<p>Novost je uspešno ubačena</p>";
} 
else {
echo "<p>Nastala je greška pri ubacivanju novosti</p>" . mysqli_error();
}
} else {
//Ako POST parametri nisu prosleđeni
echo "Nisu prosleđeni parametri!";
}
mysql_close($db);
}
?>
</body>
</html>
