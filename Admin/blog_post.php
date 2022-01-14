<?php
    session_start();

    require_once "../db_connect.php";
    require_once '../inc/header.php';
    require_once "navbar.php";


if(isset($_POST['btn'])){
        $blog_title = $_POST['blog_title'];
        $blog_des = $_POST['blog_des'];
        $pub_status = $_POST['pub_status'];

        if($blog_title==null && $blog_des==null && $pub_status==null){
            echo "Please Insert Valid Information";
        }else{
            $sql = "INSERT INTO tbl_blogs (blog_title,blog_des,blog_image,pub_status) VALUES ('$blog_title','$blog_des','$imageUrl','$pub_status')";
            mysqli_query($db_connect,$sql);

                
                $banner_image_size = $_FILES['blog_image']['size'];
                if($banner_image_size <= 2000000){
                    $banner_img_name = $_FILES['blog_image']['name'];
                    $banner_ext = (explode('.',$banner_img_name));
                    $after_ext_end = end($banner_ext);
                    $allow_ext = array('jpg','png','jpeg','JPG','PNG','JPEG');
                    if(in_array($after_ext_end,$allow_ext)){
                            $inset_db_id = mysqli_insert_id($db_connect);
                            $new_name = $inset_db_id.".".$after_ext_end;
                            $imageUrl = "asset/blog/".$new_name;
                            move_uploaded_file($_FILES['blog_image']['tmp_name'],$imageUrl);
                            $image_update_query = "UPDATE tbl_blogs SET blog_image='$imageUrl' WHERE id='$inset_db_id'";
                            if(mysqli_query($db_connect,$image_update_query)){
                            
                                header('location: blog_post.php');
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


    }
    



  
    


?>







<div class="container">
    <div class="row mt-3">
        <div class="col-lg-9 m-auto">
            <div class="card">
                <div class="card-header">
                <div class="card-title">
                        <h5 class="text-center">Banner Post</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <input type="text" name="blog_title" class="form-control" placeholder="Sub Title">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <textarea name="blog_des" id="" cols="30" rows="5" class="form-control" placeholder="blog description"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <input type="file" name="blog_image" accept="image*">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12">
                               <select name="pub_status" id="" class="form-control">
                                   <option value="">-------Select Published Status---------</option>
                                   <option value="1">Published</option>
                                   <option value="0">Unpublished</option>
                               </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="submit" value="SUBMIT" name="btn" class="btn btn-primary w-100" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
       </div>
    </div>
</div>














<?php require_once "../inc/footer.php"; ?>
