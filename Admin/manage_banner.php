<?php
    session_start();

    require_once "../db_connect.php";
    require_once '../inc/header.php';
    require_once "navbar.php";




    $banner_view_sql  = "SELECT * FROM tbl_banners";
    $result_form_db = mysqli_query($db_connect,$banner_view_sql);



  
    


?>







<div class="container">
    <div class="row mt-3">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                <div class="card-title">
                        <h5 class="text-center">Banner Post</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form action="banner_post.php" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <input type="text" name="sub_title" class="form-control" placeholder="Sub Title">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <input type="text" name="title_top" class="form-control" placeholder="Title Top">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <input type="text" name="title_bottom" class="form-control" placeholder="Title Bottom">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <input type="text" name="banner_des" class="form-control" placeholder="Description">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <input type="file" name="banner_image" accept="image*">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="submit" value="SUBMIT" class="btn btn-primary w-100" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h5 class="text-center">Banners</h5>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>Sl No</th>
                            <th>Sub Title</th>
                            <th>Title Top</th>
                            <th>Title Bottom</th>
                            <th>Description</th>
                            <th>Banner Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>

                        <?php foreach($result_form_db as $key=> $view_banner): ?>
                            <tr>
                                <td><?=$key+1?></td>
                                <td><?=$view_banner['sub_title'] ?></td>
                                <td><?=$view_banner['tile_top'] ?></td>
                                <td><?=$view_banner['title_bottom'] ?></td>
                                <td><?=$view_banner['banner_des'] ?></td>
                                <td><img src="<?=$view_banner['banner_image'] ?>" alt="" width="150px" height="100px"></td>
                                <td><?php if($view_banner['pub_status']==1): ?>

                                    <a href="de-active.php?id=<?=$view_banner['id'] ?>" class="btn btn-sm btn-primary">Active</a>

                                    <?php else: ?>
                                    <a href="active.php?id=<?=$view_banner['id'] ?>" class="btn btn-sm btn-warning">De-active</a>

                                    <?php endif ?>
                               </td>
                                <td>
                                    
                                 <a href="banner_edit.php?id=<?=$view_banner['id'] ?>" class="btn btn-sm btn-info mb-2">Edit</a>
                                 <a href="banner_delete.php?id=<?=$view_banner['id'] ?>" class="btn btn-sm btn-danger">Delete</a>


                                </td>
                            </tr>

                        <?php endforeach ?>    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>














<?php require_once "../inc/footer.php"; ?>
