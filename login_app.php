<?php
    session_start();
    require_once './db_connect.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    if($email == null || $password == null){
        $_SESSION['log_err'] = "All fild requred";
        header("location: login.php");
    }else{

        $pass_decipt = md5($password);

        $checking_query = "SELECT COUNT(*) AS total_user FROM tbl_student WHERE email='$email' AND password = '$pass_decipt'";
        $result_form_db = mysqli_query($db_connect,$checking_query);
        $result_assoc = mysqli_fetch_assoc($result_form_db);

        if($result_assoc['total_user']==1){
            $_SESSION['admin']= $email;
            $_SESSION['user_status']="yes";
            header("location: Admin\dashboar.php");
        }else{

            $_SESSION['log_err'] = "Please correct user name or password. If didn't regitation please registation !";
            header("location: login.php");
        }

    }

?>