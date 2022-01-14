

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
                        <h5 class="">Registation Form</h5>
                        <a class="" href="login.php">Login</a>
                    </div>
                    <div class="card-body">
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
                          
                          
                        <form action="register.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="studentName" class="form-label">Student Name</label>
                                <input type="text" class="form-control" id="studentName" name="stu_name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="email" name="phone">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Password</label>
                                <input type="password" class="form-control" id="email" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Picture</label>
                                <input type="file" class="form-control" id="email" name="user_image">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php require_once 'inc/footer.php'; ?>