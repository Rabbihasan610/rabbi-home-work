 
  <?php 
            
            require_once "../db_connect.php";
            
            $select_unread_message = "SELECT COUNT(*) AS unread_msg FROM tbl_gest WHERE guest_status = 1";
            $unread_msg_db = mysqli_query($db_connect,$select_unread_message);
            $un_read_msg = mysqli_fetch_assoc($unread_msg_db);



            $user_email = $_SESSION['admin'];
    
            $user_query = "SELECT * FROM tbl_student WHERE email='$user_email'";
            $result_form_db = mysqli_query($db_connect,$user_query);
            $result_assoc = mysqli_fetch_assoc($result_form_db);
        
        
     
        

            

            
        
        
                   
  ?> 
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container">
    <a class="navbar-brand" href="dashboar.php">Dashbord</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../Admin/Apps/index.php" target="_blank">View Page</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href=""  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Message
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="message-view.php">Gest Message 
                
              
                        <span class="badge bg-warning"><?=$un_read_msg['unread_msg'];?></span>
                 
               </a></li>       

             <li><a class="dropdown-item" href="manage_banner.php">Manage Banner</a></li>
          </ul>
          
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href=""  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             blog
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="blog_post.php">Blog Post</a></li>       

             <li><a class="dropdown-item" href="manage_blog.php">Manage Blog</a></li>
          </ul>
          
        </li>
      </ul>

        <div class="dropdown">
            <button class="" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="../<?=$result_assoc['user_image'] ?>" alt="" style="width:40px; height:40px; border:2px solid red; border-radius:50%;">
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                <li><a class="dropdown-item" href="#">Dashboard</a></li>
                <li><a class="dropdown-item" href="change_password.php">Change Password</a></li>
                <li><a class="dropdown-item text-danger" href="../logout.php">Log Out</a></li>
            </ul>
        </div>
    
    </div>
  </div>
</nav>
