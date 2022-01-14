

<?php
    session_start();

    require_once '../inc/header.php';
    require_once '../db_connect.php';

    if(!isset($_SESSION['user_status'])){
       header('location: ../login.php');
    }


    $user_email = $_SESSION['admin'];

    $checking_query = "SELECT * FROM tbl_student WHERE email='$user_email'";
    
    $db_update_edit = mysqli_query($db_connect,$checking_query);
    $res_edit = mysqli_fetch_assoc($db_update_edit);

    // print_r($res_name);



    // print_r($_POST);

if(isset($_POST['btn'])){
    $user_name = filter_var($_POST['edit_user_name'],FILTER_SANITIZE_STRING);

    $user_phone = $_POST['edit_user_phone'];

    if($user_name==null || $user_phone){
        if(strlen($user_phone)==11){
            $update_query= "UPDATE tbl_student SET stu_name='$user_name', phone='$user_phone' WHERE email='$user_email'";
            $db_update = mysqli_query($db_connect,$update_query);
            header('location: profile.php');
          
        }else{
            echo 'Please valid information here';
        }
    }else{
        echo 'All requerd';
    }
 
}
   


  

    
    

?>

<?php require_once 'navbar.php'; ?>




<section>
    <div class="container">
        <div class="row  mt-4">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Profile Edit</h3>
                    </div>
                    <div class="card-body">

                        <form action="" method="post">
                            <div class="form-inline">
                                <label for="" class="label-control">User Name</label>
                                <input type="text" name="edit_user_name" class="form-control"  value="<?=$res_edit['stu_name']?>">
                                <input type="hidden"  class="form-control"  value="<?=$res_edit['email']?>">

                            </div>
                            <div class="form-inline mb-2">
                                <label for="" class="label-control">Phone Number</label>
        
                                <input type="text" name="edit_user_phone" class="form-control" value="<?=$res_edit['phone']?>">
                            </div>
                            <button type="submit" class="btn btn-danger" name="btn">Update</button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</section>







<?php  require_once '../inc/footer.php'; ?>