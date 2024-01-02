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
            <i class="fab fa-gg-circle"></i>All Skill
        </div>  
        <div class="col-md-4 card_button_part">
            <a href="add-skill.php" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Skill</a>
        </div>  
    </div>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped table-hover custom_table">
      <thead class="table-dark">
        <tr>
          
          <th>Subtitle</th>
          <th>Paragraph</th>
          <th>Topic</th>
          <th>Count</th>
          <th>Image</th>
          <th>Manage</th>
        </tr>
      </thead>
      <tbody>
        <?php
        
         $selS='SELECT * FROM skill  ORDER BY skill_id ASC';
         $QS=mysqli_query($con,$selS);
         while($data=mysqli_fetch_assoc($QS)){
        ?>
        <tr>
         
          <td><?php echo $data['skill_sub']?></td>
          <td><?php echo $data['skill_para']?></td>
          <td><?php echo $data['skill_topic']?></td>
          <td><?php echo $data['skill_count']?></td>
          <td>
            <?php if($data['skill_img']!=''){ ?>
              <img height="60px" class="img200" src="uploads/<?= $data['skill_img'] ?>"  alt="skill"/> 
           <?php }else{ ?>
            <img height="60px" src="images/avatar.jpg" alt="skill"/> 
           <?php } ?> 
          </td>
          
          <td>
              <div class="btn-group btn_group_manage" role="group">
                <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="view-skill.php?V= <?= $data['skill_id'] ?>">View</a></li>
                  <li><a class="dropdown-item" href="edit-skill.php?E=<?=$data['skill_id'] ?>">Edit</a></li>
                  <li><a class="dropdown-item" href="delete-skill.php?D=<?= $data['skill_id'] ?>">Delete</a></li>
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
                