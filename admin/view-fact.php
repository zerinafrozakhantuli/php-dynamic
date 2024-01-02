<?php 
include_once('functions/function.php');
needlogged();
if($_SESSION['role']==1){
get_header();
get_sidebar();


$view=$_GET['V'];
$sel="SELECT * FROM facts WHERE fact_id='$view'";
$Q=mysqli_query($con,$sel);
$V=mysqli_fetch_assoc($Q);

?>
<div class="row">
<div class="col-md-12">
    <div class="card mb-3">
      <div class="card-header">
        <div class="row">
            <div class="col-md-8 card_title_part">
                <i class="fab fa-gg-circle"></i>View Fact Information
            </div>  
            <div class="col-md-4 card_button_part">
                <a href="all-fact.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Fact</a>
            </div>  
        </div>
      </div>
      <div class="card-body">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <table class="table table-bordered table-striped table-hover custom_view_table">
                  <tr>
                    <td>Icon</td>  
                    <td>:</td>  
                    <td><?= $V['fact_icon'] ?></td>  
                  </tr>
                  <tr>
                    <td>Title</td>  
                    <td>:</td>  
                    <td><?= $V['fact_title'] ?></td>  
                  </tr>
                  <tr>
                    <td>Count</td>  
                    <td>:</td>  
                    <td><?= $V['fact_count'] ?></td>  
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