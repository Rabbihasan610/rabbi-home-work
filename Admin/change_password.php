

<?php
    session_start();

    require_once '../inc/header.php';
    require_once '../db_connect.php';

    if(!isset($_SESSION['user_status'])){
       header('location: ../login.php');
    }


    $user_email = $_SESSION['admin'];
  

    if(isset($_POST['btn'])){
            
        $old_pass = $_POST['old_pass'];
        $new_pass = $_POST['new_pass'];
        $confiram_pass = $_POST['confiram_pass'];

        $pass_len = strlen($new_pass);



        $all_caps = preg_match("@[A-Z]@",$new_pass);
        $all_small = preg_match("@[a-z]@",$new_pass);
        $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
        $all_chars = preg_match($pattern,$new_pass);

        if($new_pass==null || $confiram_pass==null){
            $_SESSION['reg_err']="Password not be null";  
        }else{
            
            if($new_pass==$confiram_pass){
                if($pass_len >=6 && $all_caps==1 && $all_small==1 && $all_chars==1){
                        $encrypt_pass=md5($old_pass);
                        $checking_query = "SELECT COUNT(*) AS total_user FROM tbl_student WHERE email='$user_email' AND password='$encrypt_pass'";
                        
                        $db_result = mysqli_query($db_connect,$checking_query);
                        $res_user = mysqli_fetch_assoc($db_result);

                        if($res_user['total_user']==1){
                            $enc_new_pass = md5($new_pass);
                            $update_pass_query = "UPDATE tbl_student SET password='$enc_new_pass' WHERE email='$user_email'";
                            $successfull_cahnge = mysqli_query($db_connect,$update_pass_query);
                            if($successfull_cahnge){
                                header('location: dashboar.php');
                            }else{
                                $_SESSION['reg_err'] = 'Password Error';
                            }
                           

                        }
                }else{
                    $_SESSION['reg_err']="Password must be at last 1 Caps, 1 Small, 1 Special Character and 6 character";
                
                }

            }else{
                $_SESSION['reg_err']="Please password didn't match";
            }
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
                    <div class="card-header d-flex justify-content-between">
                        <h3>Password Information</h3>
                    </div>

                    <?php 
                           if(isset($_SESSION['reg_err'])){
                            
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?php 
                                    echo $_SESSION['reg_err'];
                                    unset($_SESSION['reg_err']);
                                ?>
                            </div>

                        <?php 
                        
                          }
                         
                        ?> 
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-inline">
                                <label for="" class="label-control">Old Password</label>
                                <input type="password" name="old_pass" class="form-control">
                                <input type="hidden"  class="form-control"  value="<?=$res_edit['email']?>">

                            </div>
                            <div class="form-inline mb-2">
                                <label for="" class="label-control">New Password</label>
                                <input type="text" name="new_pass" class="form-control"">
                            </div>
                            <div class="form-inline mb-2">
                                <label for="" class="label-control">Confiram Password</label>
                                <input type="text" name="confiram_pass" class="form-control"">
                            </div>
                            <button type="submit" class="btn btn-danger" name="btn">Change Password</button>
                        </form>  
                    </div>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</section>







<?php  require_once '../inc/footer.php'; ?>