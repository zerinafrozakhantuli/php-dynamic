<?php 
include_once('functions/function.php');
needlogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();

$pro=$_GET['E'];
$sel="SELECT * FROM project WHERE pro_id='$pro'";
$Q=mysqli_query($con,$sel);
$edit=mysqli_fetch_assoc($Q);


if(!empty($_POST)){
    $img=$_FILES['img'];
    $imgName="";
    $icon=$_POST['icon'];
    $title=$_POST['title'];
    $info=$_POST['info'];
   
   $update="UPDATE project SET pro_icon='$icon',pro_title='$title',pro_info='$info' WHERE pro_id='$pro'";

   if(!empty($title)){
    if(mysqli_query($con,$update)){
        if($img['name']!=''){
        $imgName='Project_'.time().'.'.pathinfo($img['name'],PATHINFO_EXTENSION);
        $updimg="UPDATE project SET pro_img='$imgName' WHERE pro_id='$pro'";
        if(mysqli_query($con,$updimg)){
          move_uploaded_file($img['tmp_name'],'uploads/'.$imgName);  
          header('Location: view-project.php?V='.$pro);
        }else{
            echo "Image Update Failed";
        }
    }
        
        header('Location: view-project.php?V='.$pro);
    }else{
        echo "FAILED";
    }

   }else{
    echo "Please Enter Title";
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
                    <i class="fab fa-gg-circle"></i> Update Project Information
                </div>  
                <div class="col-md-4 card_button_part">
                    <a href="all-project.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Project</a>
                </div>  
            </div>
          </div>
          <div class="card-body">
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Photo:</label>
                <div class="col-sm-4">
                  <input type="file" class="form-control form_control" id="" name="img">
                </div>
                <div class="col-md-2">
                <?php  if($edit['pro_img']!='') { ?>
                  <img height="60px" class="img200" src="uploads/<?= $edit['pro_img'] ?>"  alt="user"/> 
           <?php }else{ ?>
            <img height="60px" src="images/avatar.jpg" alt="user"/> 
           <?php } ?> 
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Icon</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form_control" id="" name="icon" value="<?=$edit['pro_icon']?>">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Title</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form_control" id="" name="title"value="<?=$edit['pro_title']?>">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Info</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form_control" id="" name="info"value="<?=$edit['pro_info']?>">
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