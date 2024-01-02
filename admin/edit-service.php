<?php 
include_once('functions/function.php');
needlogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();

$serve=$_GET['E'];
$sel="SELECT * FROM service WHERE ser_id='$serve'";
$Q=mysqli_query($con,$sel);
$edit=mysqli_fetch_assoc($Q);

if(!empty($_POST)){
    $stitle=$_POST['title'];
    $stopic=$_POST['topic'];
    $image=$_FILES['pic'];
    $imageName="";

    

    
$update="UPDATE service SET ser_title='$stitle',ser_topic='$stopic' WHERE ser_id='$serve'";

    
    if(mysqli_query($con,$update)){
        if($image['name']!=''){
    $imageName='service_'.time().rand(100,10000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
        $updimg="UPDATE service SET ser_img='$imageName' WHERE ser_id='$serve'";
        if(mysqli_query($con,$updimg)){
         move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);  
          header('Location: view-service.php?V='.$serve);
        }else{
            echo "Image Update Failed";
        }
    }
        
        header('Location: view-service.php?V='.$serve);
    }else{
        echo "FAILED";
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
                    <i class="fab fa-gg-circle"></i> Update Services
                </div>  
                <div class="col-md-4 card_button_part">
                    <a href="all-service.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Service</a>
                </div>  
            </div>
          </div>
          <div class="card-body">
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Service Title:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" id="" name="title" value="<?=$edit['ser_title']?>">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Service Image<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="file" class="form-control form_control" id="" name="pic">
                </div>
                <div class="col-md-2">
                <?php  if($edit['ser_img']!='') { ?>
                  <img height="60px" class="img200" src="uploads/<?= $edit['ser_img'] ?>"  alt="user"/> 
           <?php }else{ ?>
            <img height="60px" src="images/avatar.jpg" alt="user"/> 
           <?php } ?> 
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Service Topic<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" id="" name="topic" value="<?=$edit['ser_topic']?>">
                </div>
              </div>
              
              
              
            
          </div>
          <div class="card-footer text-center">
            <button type="submit" class="btn btn-sm btn-dark">Update</button>
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