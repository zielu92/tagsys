<?
require('db.php');

$id = mysqli_real_escape_string($mysqli,$_POST['delete_id']); 

$query = $mysqli->query("delete from tags where ID = $id");
?>