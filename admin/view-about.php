<?php 
include_once('functions/function.php');
needlogged();
if($_SESSION['role']==1){
get_header();
get_sidebar();


$view=$_GET['V'];
$sel="SELECT * FROM about WHERE about_id='$view'";
$Q=mysqli_query($con,$sel);
$V=mysqli_fetch_assoc($Q);

?>
<div class="row">
<div class="col-md-12">
    <div class="card mb-3">
      <div class="card-header">
        <div class="row">
            <div class="col-md-8 card_title_part">
                <i class="fab fa-gg-circle"></i>View About Info
            </div>  
            <div class="col-md-4 card_button_part">
                <a href="all-about.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i> About</a>
            </div>  
        </div>
      </div>
      <div class="card-body">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <table class="table table-bordered table-striped table-hover custom_view_table">
                    <tr>
                    <td>Photo</td>  
                    <td>:</td>  
                    <td>
            <?php if($V['about_img1']!=''){ ?>
              <img height="100px" class="img200" src="uploads/<?= $V['about_img1'] ?>"  alt="about"/> 
           <?php }else{ ?>
            <img height="100px" src="images/avatar.jpg" alt="about"/> 
           <?php } ?> 
                    </td>  
                  </tr>
                  <tr>
                    <td>Subtitle</td>  
                    <td>:</td>  
                    <td><?= $V['about_subtitle'] ?></td>  
                  </tr>
                    <tr>
                    <td>Photo-2</td>  
                    <td>:</td>  
                    <td>
            <?php if($V['about_img2']!=''){ ?>
              <img height="100px" class="img200" src="uploads/<?= $V['about_img2'] ?>"  alt="about"/> 
           <?php }else{ ?>
            <img height="100px" src="images/avatar.jpg" alt="about"/> 
           <?php } ?> 
                    </td>  
                  </tr>
                  <tr>
                    <td>Content1</td>  
                    <td>:</td>  
                    <td><?= $V['about_para1'] ?></td>  
                  </tr>
                  <tr>
                    <td>Content2</td>  
                    <td>:</td>  
                    <td><?= $V['about_para2'] ?></td>  
                  </tr>
                  <tr>
                    <td>Title2</td>  
                    <td>:</td>  
                    <td><?= $V['about_title2'] ?></td>  
                  </tr>
                  <tr>
                    <td>Title3</td>  
                    <td>:</td>  
                    <td><?= $V['about_title3'] ?></td>  
                  </tr>
                
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>
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
}
?>