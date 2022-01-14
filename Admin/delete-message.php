<?php

require_once '../db_connect.php';

$id = $_GET['id'];

$sql = "DELETE FROM tbl_gest WHERE id='$id'";
$result = mysqli_query($db_connect,$sql);
if($result){
    header('location: message-view.php');
}







?>