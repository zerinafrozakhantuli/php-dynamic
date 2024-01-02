<?php 
include_once('functions/function.php');
needlogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();

$Edit=$_GET['E'];
$sel="SELECT * FROM skill WHERE skill_id='$Edit'";
$Q=mysqli_query($con,$sel);
$E=mysqli_fetch_assoc($Q);

if(!empty($_POST)){
    $skillsub=$_POST['sub'];
    $skillpara=$_POST['para'];
    $skill=$_POST['skill'];
    $skillcount=$_POST['count'];
    $image=$_FILES['pic'];
    $imageName="";

    
   
$update="UPDATE  skill SET skill_sub='$skillsub',skill_para='$skillpara',skill_topic='$skill',skill_count='$skillcount' WHERE skill_id='$Edit'";

    if(!empty($skillsub)){
            if(mysqli_query($con,$update)){
                if($image['name']!=''){
    $imageName='skill_'.time().'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
    $updimg="UPDATE skill SET skill_img='$imageName' WHERE skill_id='$Edit'";
    if(mysqli_query($con,$updimg)){
       move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
       header('Location: view-skill.php?V='.$Edit); 
   }else{
     echo "Image Update Failed";
   }
    }
        
        header('Location: view-skill.php?V='.$Edit); 
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
                    <i class="fab fa-gg-circle"></i> Update Services
                </div>  
                <div class="col-md-4 card_button_part">
                    <a href="all-skill.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Service</a>
                </div>  
            </div>
          </div>
          <div class="card-body">
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Skill Subtitle<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" id="" name="sub" value="<?=$E['skill_sub']?>">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Skill Paragraph<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" id="" name="para"value="<?=$E['skill_para']?>">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Skill Item<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" id="" name="skill"value="<?=$E['skill_topic']?>">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Skill Count<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" id="" name="count"value="<?=$E['skill_count']?>">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Service Image:</label>
                <div class="col-sm-7">
                  <input type="file" class="form-control form_control" id="" name="pic">
                </div>
                <div class="col-md-2">
                <?php  if($E['skill_img']!='') { ?>
                  <img height="60px" class="img200" src="uploads/<?= $E['skill_img'] ?>"  alt="user"/> 
           <?php }else{ ?>
            <img height="60px" src="images/avatar.jpg" alt="user"/> 
           <?php } ?> 
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