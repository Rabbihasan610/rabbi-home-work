

<?php 

session_start();
require_once 'inc/header.php'; 
if(isset($_SESSION['user_status'])){
    header('location: Admin\dashboar.php');
 }
?>

<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="">Login Form</h5>
                    <a class="" href="register_info.php">Registation</a>
                </div>
                <div class="card-body">
                    <?php 
                       if(isset($_SESSION['log_err'])){
                        
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <?php 
                                echo $_SESSION['log_err'];
                                unset($_SESSION['log_err']);
                            ?>
                        </div>

                    <?php 
                    
                      }
                     
                    ?> 
                      
                      
                    <form action="login_app.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Password</label>
                            <input type="password" class="form-control" id="email" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once 'inc/footer.php'; ?>