<?php 

require_once '../db_connect.php';
$id = $_GET['id'];

$sql = "UPDATE tbl_blogs SET 	pub_status = 1 WHERE id=$id";
mysqli_query($db_connect,$sql);
header("location: manage_blog.php");

?>