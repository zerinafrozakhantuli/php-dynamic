<?php 
include_once('functions/function.php');
needlogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();

if(!empty($_POST)){
    $img=$_FILES['img'];
    $imgName="";
    if($img['name']!=''){
        $imgName='Project_'.time().'.'.pathinfo($img['name'],PATHINFO_EXTENSION);
    }
    $icon=$_POST['icon'];
    $title=$_POST['title'];
    $info=$_POST['info'];
   
   $insert="INSERT INTO project(pro_img,pro_icon,pro_title,pro_info)
   VALUES('$imgName','$icon','$title','$info')";

   if(!empty($img)){
    if(mysqli_query($con,$insert)){
        move_uploaded_file($img['tmp_name'],'uploads/'.$imgName);
        echo "SUCCESS";
    }else{
        echo "FAILED";
    }

   }else{
    echo "Please Upload Image";
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
                    <i class="fab fa-gg-circle"></i>Project Information
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
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Icon</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form_control" id="" name="icon">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Title</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form_control" id="" name="title">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Info</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form_control" id="" name="info">
                </div>
              </div>
          </div>
          <div class="card-footer text-center">
            <button type="submit" class="btn btn-sm btn-dark">REGISTRATION</button>
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