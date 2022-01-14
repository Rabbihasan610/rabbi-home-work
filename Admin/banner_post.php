<?php 
require_once '../db_connect.php';

$sub_title = $_POST['sub_title'];
$title_top = $_POST['title_top'];
$title_bottom = $_POST['title_bottom'];
$banner_des = $_POST['banner_des'];


if($sub_title==null && $title_top==null && $title_bottom==null && $banner_des==null){
        
    
}else{
    $banner_text_query = "INSERT INTO tbl_banners (sub_title,tile_top,title_bottom,banner_des,banner_image) VALUES ('$sub_title','$title_top','$title_bottom','$banner_des','image_location')";
    if(mysqli_query($db_connect,$banner_text_query)){
        $_SESSION['msg_err'] = "Input Filed Requred";
        header('location: manage_banner.php');

    }else{
        die('Query Problem'.mysqli_error($db_connect));
    }

        
    $banner_image_size = $_FILES['banner_image']['size'];
    if($banner_image_size <= 2000000){
        $banner_img_name = $_FILES['banner_image']['name'];
    $banner_ext = (explode('.',$banner_img_name));
    $after_ext_end = end($banner_ext);
    $allow_ext = array('jpg','png','jpeg','JPG','PNG','JPEG');
    if(in_array($after_ext_end,$allow_ext)){
            $inset_db_id = mysqli_insert_id($db_connect);
            $new_name = $inset_db_id.".".$after_ext_end;
            $imageUrl = "asset/img/".$new_name;
            move_uploaded_file($_FILES['banner_image']['tmp_name'],$imageUrl);
            $image_update_query = "UPDATE tbl_banners SET banner_image='$imageUrl' WHERE id='$inset_db_id'";
            if(mysqli_query($db_connect,$image_update_query)){
            
                header('location: manage_banner.php');
            }else{
                die('Query Problem'.mysqli_error($db_connect));
            }
            
    }else{
        echo 'Please insert jpg or png or jpeg image';
    }
    }else{
        echo 'upload kora jabe na';
    }


}







