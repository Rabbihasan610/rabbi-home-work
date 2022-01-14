


<?php
    session_start();

    require_once '../db_connect.php';

    require_once '../inc/header.php';
   

    if(!isset($_SESSION['user_status'])){
       header('location: message.php');
    }


   







    $view_message_query = "SELECT * FROM tbl_gest";
    $result_query = mysqli_query($db_connect,$view_message_query);

    

    

?>



<?php require_once 'navbar.php'; ?>




<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Guest Message</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>Sl</th>
                            <th>Guest Name</th>
                            <th>Guest Email</th>
                            <th>Guest Subject</th>
                            <th>Guest Message</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php foreach($result_query as $key=> $message): ?>
                                <tr class="<?=($message['guest_status']==1) ? "bg-info" : "text-dark" ?>">
                                    <td><?=$key+1?></td>
                                    <td><?=$message['guest_name']?></td>
                                    <td><?=$message['guest_email']?></td>
                                    <td><?=$message['guest_sub']?></td>
                                    <td><?=$message['guest_msg']?></td>
                                    <td>
                                        <?php if($message['guest_status']==1): ?>
                                            <a href="read-message.php?id=<?=$message['id']?>" class="btn btn-sm btn-warning">Mark as read</a>
                                         <?php  endif ?>   
                                         <a href="delete-message.php?id=<?=$message['id']?>" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>

                             <?php
                                 endforeach 
                             ?>   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>








<?php  require_once '../inc/footer.php'; ?>