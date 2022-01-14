<?php 


session_start();

require_once './db_connect.php';


$stu_name = filter_var($_POST['stu_name'],FILTER_SANITIZE_STRING);
$phone = $_POST['phone'];
$email =filter_var( $_POST['email'],FILTER_VALIDATE_EMAIL);
$password = $_POST['password'];
$pass_len = strlen($password);



$all_caps = preg_match("@[A-Z]@",$password);
$all_small = preg_match("@[a-z]@",$password);
$pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
$all_chars = preg_match($pattern,$password);


if($stu_name==null || $phone==null || $email==null || $password==null){
    $_SESSION['reg_err'] = "Please fild requred all filds";
    header("Location: register_info.php");
}else{
   if(strlen($phone) == 11){
        if($email){
            if($pass_len >=6 && $all_caps == 1 && $all_small == 1 && $all_chars == 1){
                    
                $sql = "SELECT COUNT(*) AS total_email FROM tbl_student WHERE email='$email'";
                $email_count = mysqli_query($db_connect,$sql);
                $total_email = mysqli_fetch_assoc($email_count);
                // print_r($total_email);

            if($total_email['total_email'] == 0){

                $encrypt_pass = md5($password);
                        $sql ="INSERT INTO tbl_student (stu_name,phone,email,password,user_image) VALUES ('$stu_name','$phone','$email','$encrypt_pass','user_image')";
                        $insert_query = mysqli_query($db_connect,$sql);
                        if($insert_query){
                         
                           
                        }
                        else{
                            $_SESSION['reg_err'] = "Registation Failed";
                            header("Location: register_info.php");
                        }
                }else{
                 $_SESSION['reg_err'] = "All reday Registerted";
                 header("Location: register_info.php");
                }    
           }else{
              $_SESSION['reg_err'] = "Password must be at last 1 Caps, 1 Small, 1 Special Character and 6 character";
              header("Location: register_info.php");
            }
        }else{
            $_SESSION['reg_err'] = 'Invalid Email';
            header("Location: register_info.php");
        }
   }else{
        $_SESSION['reg_err'] ='Please inter vaild phone number';
        header("Location: register_info.php");
   }
}


$user_image_size = $_FILES['user_image']['size'];
    if($user_image_size <= 2000000){
    $user_img_name = $_FILES['user_image']['name'];
    $banner_ext = (explode('.',$user_img_name));
    $after_ext_end = end($banner_ext);
    $allow_ext = array('jpg','png','jpeg','JPG','PNG','JPEG');
    if(in_array($after_ext_end,$allow_ext)){
            $inset_db_id = mysqli_insert_id($db_connect);
            $new_name = $inset_db_id.".".$after_ext_end;
            $imageUrl = "Admin/asset/user/".$new_name;
            move_uploaded_file($_FILES['user_image']['tmp_name'],$imageUrl);
            $image_update_query = "UPDATE tbl_student SET user_image='$imageUrl' WHERE id='$inset_db_id'";
            if(mysqli_query($db_connect,$image_update_query)){
                $_SESSION['reg_err'] = "Congratulations! Registation Successfully";
                header('location: register_info.php');
            }else{
                die('Query Problem'.mysqli_error($db_connect));
            }
            
    }else{
        echo 'Please insert jpg or png or jpeg image';
    }
}else{
    echo 'upload kora jabe na';
}


   

 



?>