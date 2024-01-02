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
            <i class="fab fa-gg-circle"></i>All Message Information
        </div>  
        <div class="col-md-4 card_button_part">
            <a href="#" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>LINK</a>
        </div>  
    </div>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped table-hover custom_table">
      <thead class="table-dark">
        <tr>
          
          <th>Name</th>
          <th>Email</th>
          <th>Subject</th>
          <th>Message</th>
          <th>Manage</th>
        </tr>
      </thead>
      <tbody>
        <?php
        
         $sel='SELECT * FROM contact  ORDER BY con_id ASC';
         $Q=mysqli_query($con,$sel);
         while($data=mysqli_fetch_assoc($Q)){
        ?>
        <tr>
         
          <td><?php echo $data['con_name']?></td>
          <td><?= $data['con_email']?></td>
          <td><?= $data['con_sub']?></td>
          <td><?= $data['con_text']?></td>
            <td>
              <div class="btn-group btn_group_manage" role="group">
                <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="view-message.php?V= <?= $data['con_id'] ?>">View</a></li>
                  <li><a class="dropdown-item" href="delete-message.php?D=<?= $data['con_id'] ?>">Delete</a></li>
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
                