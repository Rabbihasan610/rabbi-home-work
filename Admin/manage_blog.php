<?php
    session_start();

    require_once "../db_connect.php";
    require_once '../inc/header.php';
    require_once "navbar.php";




    $banner_view_sql  = "SELECT * FROM tbl_blogs";
    $result_form_db = mysqli_query($db_connect,$banner_view_sql);



  
    


?>







<div class="container">
    <div class="row mt-3">
        <div class="col-lg-9 m-auto">
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
                            <th>Blog Title</th>
                            <th>Blog Description</th>
                            <th>Blog Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>

                        <?php foreach($result_form_db as $key=> $view_banner): ?>
                            <tr>
                                <td><?=$key+1?></td>
                                <td><?=$view_banner['blog_title'] ?></td>
                                <td><?=$view_banner['blog_des'] ?></td>
                                <td><img src="<?=$view_banner['blog_image'] ?>" alt="" width="150px" height="100px"></td>
                                <td><?php if($view_banner['pub_status']==1): ?>

                                    <a href="de-active_blog.php?id=<?=$view_banner['id'] ?>" class="btn btn-sm btn-primary">Active</a>

                                    <?php else: ?>
                                    <a href="active_blog.php?id=<?=$view_banner['id'] ?>" class="btn btn-sm btn-warning">De-active</a>

                                    <?php endif ?>
                               </td>
                                <td>
                                    
                                 <a href="blog_edit.php?id=<?=$view_banner['id'] ?>" class="btn btn-sm btn-info mb-2">Edit</a>
                                 <a href="blog_delete.php?id=<?=$view_banner['id'] ?>" class="btn btn-sm btn-danger">Delete</a>


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
