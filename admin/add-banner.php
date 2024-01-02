<?php 
include_once('functions/function.php');
needlogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();


if(!empty($_POST)){
    $title=$_POST['title'];
    $subtitle=$_POST['subtitle'];
    $url=$_POST['url'];
    $button=$_POST['button'];
    $image=$_FILES['pic'];
    $imageName="";

    if($image['name']!=''){
    $imageName='banner_'.time().rand(100,10000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
     
    }

    $Binsert="INSERT INTO banner (ban_title,ban_subtitle,ban_url,ban_button,ban_image) 
    VALUES('$title','$subtitle','$url','$button','$imageName')";

    if(!empty($title)){
        if(mysqli_query($con,$Binsert)){
          move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
          echo "Banner Upload Success";
        }else{
          echo "Banner Upload Failed";
        }

    }else{
      echo "Please Upload Banner title";
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
                    <i class="fab fa-gg-circle"></i>Add Banner
                </div>  
                <div class="col-md-4 card_button_part">
                    <a href="all-banner.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>ALL Banner</a>
                </div>  
            </div>
          </div>
          <div class="card-body">
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Title<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" id="" name="title">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Subtitle:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" id="" name="subtitle">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">URL:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" id="" name="url">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Button:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" id="" name="button">
                </div>
              </div>    
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Image:</label>
                <div class="col-sm-4">
                  <input type="file" class="form-control form_control" id="" name="pic">
                </div>
              </div>
          </div>
          <div class="card-footer text-center">
            <button type="submit" class="btn btn-sm btn-dark">UPLOAD</button>
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