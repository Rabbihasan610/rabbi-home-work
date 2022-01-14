<?php
    session_start();

    require_once "../db_connect.php";
    require_once '../inc/header.php';
    require_once "navbar.php";


    $id = $_GET['id'];

    $banner_view_sql  = "SELECT * FROM tbl_banners WHERE id = $id";
    $result_form_db = mysqli_query($db_connect,$banner_view_sql);
    $after_assoc =mysqli_fetch_assoc($result_form_db);



  
    


?>







<div class="container">
    <div class="row mt-3">
        <div class="col-lg-9 m-auto">
            <div class="card">
                <div class="card-header">
                <div class="card-title">
                        <h5 class="text-center">Edit Banner</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form action="banner_edit_post.php" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <input type="text" name="sub_title" class="form-control" value="<?=$after_assoc['sub_title']?>">
                                <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <input type="text" name="title_top" class="form-control" value="<?=$after_assoc['tile_top']?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <input type="text" name="title_bottom" class="form-control" value="<?=$after_assoc['title_bottom']?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <input type="text" name="banner_des" class="form-control" value="<?=$after_assoc['banner_des']?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-8">
                                <input type="file" name="banner_image" accept="image*">

                            </div>
                            <div class="col-sm-4">
                                
                                <img src="<?=$after_assoc['banner_image']?>" alt="" width="50px" height="50px" />
                            </div>

                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="submit" value="UPDATE" class="btn btn-primary w-100" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>














<?php require_once "../inc/footer.php"; ?>
