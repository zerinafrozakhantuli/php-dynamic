<?php 

include_once('functions/function.php');
needlogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();


?>
<div class="row">
<div class="col-md-12">
<div class="card mb-3">
  <div class="card-header">
    <div class="row">
        <div class="col-md-8 card_title_part">
            <i class="fab fa-gg-circle"></i>All User Information
        </div>  
        <div class="col-md-4 card_button_part">
            <a href="add-user.php" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add User</a>
        </div>  
    </div>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped table-hover custom_table">
      <thead class="table-dark">
        <tr>
          
          <th>Name</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Username</th>
          <th>Role</th>
          <th>Image</th>
          <th>Manage</th>
        </tr>
      </thead>
      <tbody>
        <?php
        
         $sel='SELECT * FROM users NATURAL JOIN roles ORDER BY user_name ASC';
         $Q=mysqli_query($con,$sel);
         while($data=mysqli_fetch_assoc($Q)){
        ?>
        <tr>
         
          <td><?php echo $data['user_name']?></td>
          <td><?= $data['user_phone']?></td>
          <td><?= $data['user_email']?></td>
          <td><?= $data['user_username']?></td>
          <td><?= $data['role_id']?></td>
          <td>
            <?php if($data['user_photo']!=''){ ?>
              <img height="60px" class="img200" src="uploads/<?= $data['user_photo'] ?>"  alt="user"/> 
           <?php }else{ ?>
            <img height="60px" src="images/avatar.jpg" alt="user"/> 
           <?php } ?> 
          </td>
          <td>
              <div class="btn-group btn_group_manage" role="group">
                <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="view-user.php?V= <?= $data['user_id'] ?>">View</a></li>
                  <li><a class="dropdown-item" href="edit-user.php?E=<?=$data['user_id'] ?>">Edit</a></li>
                  <li><a class="dropdown-item" href="change-password.php?P=<?=$data['user_id'] ?>">Change Password</a></li>
                  <li><a class="dropdown-item" href="delete-user.php?D=<?= $data['user_id'] ?>">Delete</a></li>
                </ul>
              </div>
          </td>
        </tr>
        <?php 
         }
        ?>
      </tbody>
    </table>
  </div>
  <div class="card-footer">
    <div class="btn-group" role="group" aria-label="Button group">
      <button type="button" class="btn btn-sm btn-dark">Print</button>
      <button type="button" class="btn btn-sm btn-secondary">PDF</button>
      <button type="button" class="btn btn-sm btn-dark">Excel</button>
    </div>
  </div>  
</div>
</div>
</div>
<?php 
get_footer();
}else{
  // 
  header('Location: login.php');
}
?>
                