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
            <i class="fab fa-gg-circle"></i>All Services
        </div>  
        <div class="col-md-4 card_button_part">
            <a href="add-service.php" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Service</a>
        </div>  
    </div>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped table-hover custom_table">
      <thead class="table-dark">
        <tr>
          
          <th>Title</th>
          <th>Image</th>
          <th>Topic</th>
          <th>Manage</th>
        </tr>
      </thead>
      <tbody>
        <?php
        
         $selS='SELECT * FROM service  ORDER BY ser_id ASC';
         $QS=mysqli_query($con,$selS);
         while($data=mysqli_fetch_assoc($QS)){
        ?>
        <tr>
         
          <td><?php echo $data['ser_title']?></td>
          <td>
            <?php if($data['ser_img']!=''){ ?>
              <img height="60px" class="img200" src="uploads/<?= $data['ser_img'] ?>"  alt="user"/> 
           <?php }else{ ?>
            <img height="60px" src="images/avatar.jpg" alt="user"/> 
           <?php } ?> 
          </td>
          <td><?php echo $data['ser_topic']?></td>
          <td>
              <div class="btn-group btn_group_manage" role="group">
                <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="view-service.php?V= <?= $data['ser_id'] ?>">View</a></li>
                  <li><a class="dropdown-item" href="edit-service.php?E=<?=$data['ser_id'] ?>">Edit</a></li>
                  <li><a class="dropdown-item" href="delete-service.php?D=<?= $data['ser_id'] ?>">Delete</a></li>
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
                