<?php 
include_once('functions/function.php');
needlogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();

$Edit=$_GET['E'];
$sel="SELECT * FROM team WHERE team_id='$Edit'";
$Q=mysqli_query($con,$sel);
$E=mysqli_fetch_assoc($Q);

if(!empty($_POST)){
    $img=$_FILES['pic'];
    $teamImg="";
    $title=$_POST['title'];
    $sub=$_POST['subtitle'];
    $link1=$_POST['link1'];
    $link2=$_POST['link2'];
    $link3=$_POST['link3'];

$update="UPDATE team SET team_title='$title',team_subtitle='$sub',team_link1='$link1',team_link2='$link2',team_link3='$link3' WHERE team_id='$Edit'";

    if(!empty($title)){
        if(mysqli_query($con,$update)){
          if($img['name']!=''){
        $teamImg='Team_'.rand(200,300).'.'.pathinfo($img['name'],PATHINFO_EXTENSION);
        $updimg="UPDATE team SET team_img='$teamImg' WHERE team_id='$Edit'";
        if(mysqli_query($con,$updimg)){
          move_uploaded_file($img['tmp_name'],'uploads/'.$teamImg);
          header('Location: view-team.php?V='.$Edit);
        }else{
          echo"Image Update Failed";
        }
    }
            header('Location: view-team.php?V='.$Edit);
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
                    <i class="fab fa-gg-circle"></i> Update Team Info
                </div>  
                <div class="col-md-4 card_button_part">
                    <a href="all-team.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Team</a>
                </div>  
            </div>
          </div>
          <div class="card-body">
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Photo<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="file" class="form-control form_control" id="" name="pic">
                </div>
                <div class="col-md-2">
                    <?php if($E['team_img']!=''){ ?>
              <img height="60px" class="img200" src="uploads/<?= $E['team_img'] ?>"  alt="user"/> 
           <?php }else{ ?>
            <img height="60px" src="images/avatar.jpg" alt="user"/> 
           <?php } ?> 
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Title</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form_control" id="" name="title" value="<?=$E['team_title']?>">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Sub_Title</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form_control" id="" name="subtitle"value="<?=$E['team_subtitle']?>">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Social_link</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form_control" id="" name="link1"value="<?=$E['team_link1']?>">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Social_link2</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form_control" id="" name="link2"value="<?=$E['team_link2']?>">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Social_link3</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form_control" id="" name="link3"value="<?=$E['team_link3']?>">
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