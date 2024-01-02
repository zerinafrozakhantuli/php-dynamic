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
            <i class="fab fa-gg-circle"></i>All Fact Information
        </div>  
        <div class="col-md-4 card_button_part">
            <a href="add-fact.php" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Fact</a>
        </div>  
    </div>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped table-hover custom_table">
      <thead class="table-dark">
        <tr>
          
          <th>Icon</th>
          <th>Title</th>
          <th>Total Count</th>
          <th>Manage</th>
        </tr>
      </thead>
      <tbody>
        <?php
        
         $selF='SELECT * FROM facts ORDER BY fact_id DESC';
         $QF=mysqli_query($con,$selF);
         while($data=mysqli_fetch_assoc($QF)){
        ?>
        <tr>
         
          <td><?= $data['fact_icon']?></td>
          <td><?= $data['fact_title']?></td>
          <td><?= $data['fact_count']?></td>
        
            <td>
              <div class="btn-group btn_group_manage" role="group">
                <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="view-fact.php?V= <?= $data['fact_id'] ?>">View</a></li>
                  <li><a class="dropdown-item" href="edit-fact.php?E=<?=$data['fact_id'] ?>">Edit</a></li>
                  <li><a class="dropdown-item" href="delete-fact.php?D=<?= $data['fact_id'] ?>">Delete</a></li>
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
                