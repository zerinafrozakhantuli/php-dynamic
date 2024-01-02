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
            <i class="fab fa-gg-circle"></i>All About Information
        </div>  
        <div class="col-md-4 card_button_part">
            <a href="add-about.php" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add About</a>
        </div>  
    </div>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped table-hover custom_table">
      <thead class="table-dark">
        <tr>
          
          <th>Image1</th>
          <th>Subtitle</th>
          <th>Sub_Bold</th>
          <th>Paragraph1</th>
          <th>Paragraph2</th>
          <th>Image2</th>
          <th>Title2</th>
          <th>Title3</th>
          <th>Button</th>
          <th>Manage</th>
        </tr>
      </thead>
      <tbody>
        <?php
        
         $selA='SELECT * FROM  about ORDER BY about_id ASC';
         $QA=mysqli_query($con,$selA);
         while($data=mysqli_fetch_assoc($QA)){
        ?>
        <tr>
         <td>
            <?php if($data['about_img1']!=''){ ?>
              <img height="40px" class="img200" src="uploads/<?= $data['about_img1'] ?>"  alt="user"/> 
           <?php }else{ ?>
            <img height="40px" src="images/avatar.jpg" alt="user"/> 
           <?php } ?> 
          </td>
          <td><?= $data['about_subtitle']?></td>
          <td><?= $data['about_subbold']?></td>
          <td><?= $data['about_para1']?></td>
          <td><?= $data['about_para2']?></td>
           <td>
            <?php if($data['about_img2']!=''){ ?>
              <img height="40px" class="img200" src="uploads/<?= $data['about_img2'] ?>"  alt="user"/> 
           <?php }else{ ?>
            <img height="40px" src="images/avatar.jpg" alt="user"/> 
           <?php } ?> 
          </td>
          <td><?= $data['about_title2']?></td>
          <td><?= $data['about_title3']?></td>
          <td><?= $data['about_button']?></td>
        
          <td>
              <div class="btn-group btn_group_manage" role="group">
                <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="view-about.php?V= <?= $data['about_id'] ?>">View</a></li>
                  <li><a class="dropdown-item" href="edit-about.php?E=<?=$data['about_id'] ?>">Edit</a></li>
                  <li><a class="dropdown-item" href="delete-about.php?D=<?= $data['about_id'] ?>">Delete</a></li>
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
                