<?php 
include_once('functions/function.php');
needlogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();

if(!empty($_POST)){
  $img=$_FILES['photo1'];
  $imgname="";
  if($img['name']!=''){
   $imgname='about1_'.rand(100,200).'.'.pathinfo($img['name'],PATHINFO_EXTENSION);
  }

   $subtitle=$_POST['subtitle'];
  $subbold=$_POST['bold'];
  $para1=$_POST['para1'];
  $para2=$_POST['para2'];
  $img2=$_FILES['pic'];
  $img2name="";
  if($img2['name']!=''){
    $img2name='about_img_'.time().'.'.pathinfo($img2['name'],PATHINFO_EXTENSION);
  }
  $title2=$_POST['title2'];
  $title3=$_POST['title3'];
  $button=$_POST['btn'];

 $insert="INSERT INTO about (about_img1,about_subtitle,about_subbold,about_para1,about_para2,about_img2,about_title2,about_title3,about_button)
 VALUES('$imgname','$subtitle','$subbold','$para1','$para2','$img2name','$title2','$title3','$button')";

     if(mysqli_query($con,$insert)){
      move_uploaded_file($img['tmp_name'],'uploads/'.$imgname);
      move_uploaded_file($img2['tmp_name'],'uploads/'.$img2name);
      echo "Uploaded Success";
    }else{
      echo "Opps!FAILED";
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
                    <i class="fab fa-gg-circle"></i>About Information
                </div>  
                <div class="col-md-4 card_button_part">
                    <a href="all-about.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All About Info</a>
                </div>  
            </div>
          </div>
          <div class="card-body">
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Image1</label>
                <div class="col-sm-4">
                  <input type="file" class="form-control form_control" id="" name="photo1">
                </div>
              </div>
               <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Subtitle</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form_control" id="" name="subtitle">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Sub_bold</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form_control" id="" name="bold">
                </div>
              </div>
               <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Paragraph1</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form_control" id="" name="para1">
                </div>
              </div>
               <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Paragraph2</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form_control" id="" name="para2">
                </div>
              </div>
               <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Image2</label>
                <div class="col-sm-4">
                  <input type="file" class="form-control form_control" id="" name="pic">
                </div>
              </div>
               <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Title2</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form_control" id="" name="title2">
                </div>
              </div>
               <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Title3</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form_control" id="" name="title3">
                </div>
              </div>
               <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Button</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form_control" id="" name="btn">
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