<?php

    session_start();

    unset($_SESSION['user_status']);
    header('location: login.php');


?>