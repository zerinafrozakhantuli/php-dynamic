<?php 
include_once('functions/function.php');
needlogged();
if($_SESSION['role']==1){
get_header();
get_sidebar();


$team=$_GET['V'];
$sel="SELECT * FROM team WHERE team_id='$team'";
$Q=mysqli_query($con,$sel);
$V=mysqli_fetch_assoc($Q);

?>
<div class="row">
<div class="col-md-12">
    <div class="card mb-3">
      <div class="card-header">
        <div class="row">
            <div class="col-md-8 card_title_part">
                <i class="fab fa-gg-circle"></i>View Team Information
            </div>  
            <div class="col-md-4 card_button_part">
                <a href="all-team.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Team</a>
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
            <?php if($V['team_img']!=''){ ?>
              <img height="100px" class="img200" src="uploads/<?= $V['team_img'] ?>"  alt="team"/> 
            <?php }else{ ?>
            <img height="100px" src="images/avatar.jpg" alt="team"/> 
            <?php } ?> 
                    </td>  
                  </tr>
                  <tr>
                    <td>Title</td>  
                    <td>:</td>  
                    <td><?= $V['team_title'] ?></td>  
                  </tr>
                  <tr>
                    <td>Subtitle</td>  
                    <td>:</td>  
                    <td><?= $V['team_subtitle'] ?></td>  
                  </tr>
                  <tr>
                    <td>Link1</td>  
                    <td>:</td>  
                    <td><?= $V['team_link1'] ?></td>  
                  </tr>
                  <tr>
                    <td>link2</td>  
                    <td>:</td>  
                    <td><?= $V['team_link2'] ?></td>  
                  </tr>
                  <tr>
                    <td>link3</td>  
                    <td>:</td>  
                    <td><?= $V['team_link3'] ?></td>  
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