<?php 
include_once('functions/function.php');
needlogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();

$about=$_GET['E'];
$sel="SELECT * FROM about WHERE about_id='$about'";
$Q=mysqli_query($con,$sel);
$edit=mysqli_fetch_assoc($Q);

if(!empty($_POST)){
  $pic=$_FILES['photo1'];
  $picName='';
  $sub=$_POST['subtitle'];
  $bold=$_POST['bold'];
  $content1=$_POST['para1'];
  $content2=$_POST['para2'];
  $title2=$_POST['title2'];
  $title3=$_POST['title3'];

$update="UPDATE about SET about_subtitle='$sub',about_subbold='$bold',about_para1='$content1',about_para2='$content2',about_title2='$title2',about_title3='$title3' WHERE about_id='$about' ";
 
 if(!empty($sub)){
  if(!empty($content1)){
    if(!empty($content2)){
      if(mysqli_query($con,$update)){

        if($pic['name']!=''){
    $picName='about1_'.rand(100,200).'.'.pathinfo($pic['name'],PATHINFO_EXTENSION);
    $updimg="UPDATE about SET about_img1='$picName' WHERE about_id='$about'";
    if(mysqli_query($con,$updimg)){
       move_uploaded_file($pic['tmp_name'],'uploads/'.$picName);
       header('Location: view-about.php?V='.$Edit); 
    }else{
        echo "Image Update Failed";
    }

    }
        header ('Location: view-about.php?V='.$about);
      }else{
        echo"Upload Failed";
      }

    }else{
      echo "Please Enter Content";
    }

  }else{
    echo "Please Enter Content";
  }

 }else{
  echo "Please Enter Subtitle";
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
                    <i class="fab fa-gg-circle"></i> Update About Information
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
                  <input type="file" class="form-control form_control" id="" name="photo1" >
                </div>
                <div class="col-md-2">
                <?php  if($edit['about_img1']!='') { ?>
                  <img height="60px" class="img200" src="uploads/<?= $edit['about_img1'] ?>"  alt="user"/> 
           <?php }else{ ?>
            <img height="60px" src="images/avatar.jpg" alt="user"/> 
           <?php } ?> 
                </div>
              </div>
               <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Subtitle</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form_control" id="" name="subtitle" value="<?=$edit['about_subtitle']?>">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Sub_bold</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form_control" id="" name="bold" value="<?=$edit['about_subbold']?>">
                </div>
              </div>
               <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Paragraph1</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form_control" id="" name="para1" value="<?=$edit['about_para1']?>">
                </div>
              </div>
               <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Paragraph2</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form_control" id="" name="para2" value="<?=$edit['about_para2']?>" >
                </div>
              </div>
               <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Image2</label>
                <div class="col-sm-4">
                  <input type="file" class="form-control form_control" id="" name="pic" value="<?=$edit['about_img2']?>">
                </div>
              </div>
               <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Title2</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form_control" id="" name="title2"value="<?=$edit['about_title2']?>">
                </div>
              </div>
               <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Title3</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form_control" id="" name="title3" value="<?=$edit['about_title3']?>">
                </div>
              </div>
               <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Button</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form_control" id="" name="btn" value="<?=$edit['about_para1']?>">
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