<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM user_info WHERE username like '" . $_POST["keyword"] . "%' ORDER BY username LIMIT 0,6";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="username-list">
<?php
foreach($result as $person) {
?>
<li onClick="selectUser('<?php echo $person["username"]; ?>');"><?php echo $person["username"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>