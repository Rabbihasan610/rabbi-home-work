<?php 

require_once '../db_connect.php';
$id = $_GET['id'];

$sql = "UPDATE tbl_banners SET 	pub_status = 0 WHERE id=$id";
mysqli_query($db_connect,$sql);
header("location: manage_banner.php");

?>