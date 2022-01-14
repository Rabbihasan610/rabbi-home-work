
<?php
    session_start();
    require_once '../db_connect.php';
    require_once '../inc/header.php';
   

    if(!isset($_SESSION['user_status'])){
       header('location: ../login.php');
    }


?>



<?php require_once 'navbar.php'; ?>





<?php  require_once '../inc/footer.php'; ?>