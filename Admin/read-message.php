<?php

require_once '../db_connect.php';

$id = $_GET['id'];

$sql = "UPDATE tbl_gest SET guest_status=2 WHERE id='$id'";
$result = mysqli_query($db_connect,$sql);
if($result){
    header('location: message-view.php');
}







?>