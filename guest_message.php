





<?php
    session_start();

    require_once 'db_connect.php';


    if(isset($_POST['btn'])){
        $guest_name = $_POST['guest_name'];
        $guest_email = $_POST['guest_email'];
        $guest_sub = $_POST['guest_sub'];
        $guest_msg = $_POST['guest_msg'];

        $flag = true;
        if(!$guest_name){
            $_SESSION['name_err'] = 'Please insert your name';
            $flag = false;
        }
        if(!$guest_email){
            $_SESSION['email_err'] = 'Please insert your email';
            $flag = false;
        
        }
        if(!$guest_sub){
            $_SESSION['sub_err'] = 'Please insert your subject';
            $flag = false;
        
        }
        if(!$guest_msg){
            $_SESSION['msg_err'] = 'Please insert your subject';
            $flag = false;
        }

        if($flag){
            if($db_connect){
                $guest_query = "INSERT INTO tbl_gest(guest_name,guest_email,guest_sub, guest_msg) VALUES ('$guest_name','$guest_email','$guest_sub','$guest_msg')";
                $gest_message = mysqli_query($db_connect,$guest_query);
                if($gest_message){
                    $_SESSION['msg_success'] = 'Sent Successfull Your Message';
                    header('location: ./index.php');
                }    
            }else{
                echo "false";
            }
        }else{
            echo 'kora jabe na';
        }
     


    }


  
    

    

?>