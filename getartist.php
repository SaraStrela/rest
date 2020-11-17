<?php
$mysqli = new mysqli("localhost", "root", "", "seminarski");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT username, role
FROM user_info WHERE username = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($username, $role);
$stmt->fetch();
$stmt->close();

echo "<table>";
echo "<tr>";
echo "<th>Username</th>";
echo "<td>" . $username . "</td>";
echo "<th>Role</th>";
echo "<td>" . $role . "</td>";
echo "</tr>";
echo "</table>";
?>