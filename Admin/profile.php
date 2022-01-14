

<?php
    session_start();

    require_once '../inc/header.php';
    require_once '../db_connect.php';

    if(!isset($_SESSION['user_status'])){
       header('location: ../login.php');
    }


    $user_email = $_SESSION['admin'];

    $checking_query = "SELECT * FROM tbl_student WHERE email='$user_email'";
    
    $db_result = mysqli_query($db_connect,$checking_query);
    $res_user = mysqli_fetch_assoc($db_result);

    
    

?>

<?php require_once 'navbar.php'; ?>




<section>
    <div class="container">
        <div class="row  mt-4">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3>Profile Information</h3>
                        <a href="profile_edit.php">Edit</a>
                    </div>
                    <div class="card-body">
                      <div>
                          <strong>User Name :</strong> <span><?=$res_user['stu_name']?></span>
                      </div>
                      <div>
                        <strong>User Phone :</strong> <span><?=$res_user['phone']?></span>
                      </div>
                      <div>
                        <strong>User Phone :</strong> <span><img src="../<?=$res_user['user_image'] ?>" alt="" height="150px" width="150px"></span>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</section>







<?php  require_once '../inc/footer.php'; ?>