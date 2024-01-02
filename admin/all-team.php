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
            <i class="fab fa-gg-circle"></i>Team Information
        </div>  
        <div class="col-md-4 card_button_part">
            <a href="add-team.php" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Team Info</a>
        </div>  
    </div>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped table-hover custom_table">
      <thead class="table-dark">
        <tr>
          
          <th>Photo</th>
          <th>Title</th>
          <th>Subtitle</th>
          <th>Link1</th>
          <th>Link2</th>
          <th>Link3</th>
          <th>Manage</th>
        </tr>
      </thead>
      <tbody>
        <?php
        
         $selA='SELECT * FROM  team ORDER BY team_id ASC';
         $QA=mysqli_query($con,$selA);
         while($data=mysqli_fetch_assoc($QA)){
        ?>
        <tr>
         <td>
            <?php if($data['team_img']!=''){ ?>
              <img height="40px" class="img200" src="uploads/<?= $data['team_img'] ?>"  alt="team"/> 
           <?php }else{ ?>
            <img height="40px" src="images/avatar.jpg" alt="team"/> 
           <?php } ?> 
          </td>
          <td><?= $data['team_title']?></td>
          <td><?= $data['team_subtitle']?></td>
          <td><?= $data['team_link1']?></td>
          <td><?= $data['team_link2']?></td>
          <td><?= $data['team_link3']?></td>
          <td>
              <div class="btn-group btn_group_manage" role="group">
                <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="view-team.php?V= <?= $data['team_id'] ?>">View</a></li>
                  <li><a class="dropdown-item" href="edit-team.php?E=<?=$data['team_id'] ?>">Edit</a></li>
                  <li><a class="dropdown-item" href="delete-team.php?D=<?= $data['team_id'] ?>">Delete</a></li>
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
                