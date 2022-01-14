
<?php 

session_start();

require_once '../inc/header.php';

require_once '../db_connect.php';
// require_once 'user_account.php';




    $id = $_GET['id'];

    $sql = "SELECT * FROM tbl_student WHERE id='$id'";
    $stu_id = mysqli_query($db_connect,$sql);
    $get_result = mysqli_fetch_assoc($stu_id);
   


    



?>




<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="dashboar.php">Dashbord</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">View Page</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_account.php">User</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             User
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Change Password</a></li>
            <li><a class="dropdown-item text-danger" href="#">Logout</a></li>
          </ul>
        </li>
      </ul>

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
               <?php echo $_SESSION['admin']; ?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Frofile</a></li>
                <li><a class="dropdown-item" href="#">Dashboard</a></li>
                <li><a class="dropdown-item" href="#">Change Password</a></li>
                <li><a class="dropdown-item text-danger" href="">Log Out</a></li>
            </ul>
        </div>
    
    </div>
  </div>
</nav>






<div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="text-center">Update User Details</h3>
                    </div>
                    <div class="card-body">
                          
                          
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="studentName" class="form-label"> User Name</label>
                                <input type="text" class="form-control" id="studentName" name="stu_name" value="<?php echo $get_result['stu_name']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="email" name="phone" value="<?php echo $get_result['phone']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $get_result['email']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Password</label>
                                <input type="password" class="form-control" id="email" name="password" value="<?php echo $get_result['password']; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>













<?php 
    require_once '../inc/footer.php';
?>