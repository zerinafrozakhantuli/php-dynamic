<?php 
include_once('functions/function.php');
needlogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();

$fact=$_GET['E'];
$sel="SELECT * FROM facts WHERE fact_id='$fact'";
$Q=mysqli_query($con,$sel);
$edit=mysqli_fetch_assoc($Q);


if(!empty($_POST)){
    $icon=$_POST['icon'];
    $Ftitle=$_POST['title'];
    $count=$_POST['count'];

    $update="UPDATE facts SET fact_icon='$icon',fact_title='$Ftitle',fact_count='$count' WHERE fact_id='$fact'";

    if(!empty($icon)){
        if(mysqli_query($con,$update)){
          header('Location: view-fact.php?V='.$fact);
        }else{
          echo "Fact Info Update Failed";
        }

    }else{
      echo "Please Upload Icon";
    }
 
    
 }

?>
<div class="row">
<div class="col-md-12 ">
    <form method="post" action="" enctype="multipart/form-data">
        <div class="card mb-3">
          <div class="card-header">
            <div class="row">
                <div class="col-md-8 card_title_part">
                    <i class="fab fa-gg-circle"></i>Update Facts
                </div>  
                <div class="col-md-4 card_button_part">
                    <a href="all-fact.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>ALL Fact Info</a>
                </div>  
            </div>
          </div>
          <div class="card-body">
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Icon<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" id="" name="icon" value="<?=$edit['fact_icon']?>">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Title:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" id="" name="title" value="<?=$edit['fact_title']?>">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Total-Count</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" id="" name="count" value="<?=$edit['fact_count']?>">
                </div>
              </div>
          </div>
          <div class="card-footer text-center">
            <button type="submit" class="btn btn-sm btn-dark">UPDATE</button>
          </div>  
        </div>
    </form>
</div>
</div>
<?php 
get_footer();
}else{
    header('Location: index.php');
}
?>