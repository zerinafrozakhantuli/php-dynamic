<?php 
include_once('functions/function.php');
needlogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();


if(!empty($_POST)){
    $skillsub=$_POST['sub'];
    $skillpara=$_POST['para'];
    $skill=$_POST['skill'];
    $skillcount=$_POST['count'];
    $image=$_FILES['pic'];
    $imageName="";

    if($image['name']!=''){
    $imageName='skill_'.time().'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
    }
   
$insert="INSERT INTO skill(skill_sub,skill_para,skill_topic,skill_count,skill_img)
VALUES('$skillsub','$skillpara','$skill','$skillcount','$imageName')";

    if(!empty($skillsub)){
            if(mysqli_query($con,$insert)){
                move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
                echo "SUCCESS";
            }else{
                echo "FAILED";
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
                    <i class="fab fa-gg-circle"></i>Skill
                </div>  
                <div class="col-md-4 card_button_part">
                    <a href="all-skill.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Skill</a>
                </div>  
            </div>
          </div>
          <div class="card-body">
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Skill Subtitle<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" id="" name="sub">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Skill Paragraph<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" id="" name="para">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Skill Item<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" id="" name="skill">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Skill Count<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" id="" name="count">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Service Image:</label>
                <div class="col-sm-7">
                  <input type="file" class="form-control form_control" id="" name="pic">
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