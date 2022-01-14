<?php
    session_start();

    require_once "../db_connect.php";
    require_once '../inc/header.php';
    require_once "navbar.php";


    $id = $_GET['id'];

    $banner_view_sql  = "SELECT * FROM tbl_blogs WHERE id = $id";
    $result_form_db = mysqli_query($db_connect,$banner_view_sql);
    $after_assoc =mysqli_fetch_assoc($result_form_db);





if(isset($_POST['btn'])){
        
    $id = $_POST['id'];

    $file_name = $_FILES['blog_image']['name'];
    if($file_name){
        $banner_image_size = $_FILES['blog_image']['size'];
        if($banner_image_size <= 2000000){
            $banner_img_name = $_FILES['blog_image']['name'];
        $banner_ext = (explode('.',$banner_img_name));
        $after_ext_end = end($banner_ext);
        $allow_ext = array('jpg','png','jpeg','JPG','PNG','JPEG');
        if(in_array($after_ext_end,$allow_ext)){
                $update_image_query = "SELECT blog_image FROM tbl_blogs WHERE id = $id";
                $image_form_db = mysqli_query($db_connect,$update_image_query);
                $after_assoc_result = mysqli_fetch_assoc($image_form_db);
                unlink($after_assoc_result['blog_image']);

                $new_name = $id.".".$after_ext_end;
                $imageUrl = "asset/blog/".$new_name;

                move_uploaded_file($_FILES['blog_image']['tmp_name'],$imageUrl);
                $image_update_query = "UPDATE tbl_blogs SET blog_image='$imageUrl' WHERE id=$id";
                if(mysqli_query($db_connect,$image_update_query)){
                
                    header('location: manage_blog.php');
                }else{
                    die('Query Problem'.mysqli_error($db_connect));
                }
                
        }else{
            echo 'Please insert jpg or png or jpeg image';
        }
        }else{
            echo 'upload kora jabe na';
        }

    }else{
            
         

    }

        $blog_title = $_POST['blog_title'];
        $blog_des = $_POST['blog_des'];
        $pub_status = $_POST['pub_status'];
       


        if($blog_title==null && $blog_des==null && $pub_status==null){

        }else{
            $sql = "UPDATE tbl_blogs SET blog_title='$blog_title',blog_des='$blog_des', pub_status='$pub_status' WHERE id=$id";
            if(mysqli_query($db_connect,$sql)){
                header('location: manage_blog.php');
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
                        <h5 class="text-center">Edit Blog</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <input type="text" name="blog_title" class="form-control" value="<?=$after_assoc['blog_title']?>">
                                <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <textarea name="blog_des" class="form-control"><?=$after_assoc['blog_des']?></textarea>
                            </div>
                        </div>
                
                        <div class="row mb-3">
                            <div class="col-sm-8">
                                <input type="file" name="blog_image" accept="image*">

                            </div>
                            <div class="col-sm-4">
                                
                                <img src="<?=$after_assoc['blog_image']?>" alt="" width="50px" height="50px" />
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12">
                               <select name="pub_status" id="" class="form-control">
                                  <?php if($after_assoc['pub_status']== 1):?>

                                        <option value="<?=$after_assoc['pub_status']?>">Published</option>
                                        <option value="0>">Unpublished</option>
                                    <?php else: ?>
                                        <option value="<?=$after_assoc['pub_status']?>">Unpublished</option>
                                        <option value="1">Published</option>
                                   
                                  <?php endif ?>  
                                   
                               </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="submit" value="UPDATE" name="btn" class="btn btn-primary w-100" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>














<?php require_once "../inc/footer.php"; ?>
