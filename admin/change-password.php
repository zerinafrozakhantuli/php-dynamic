<?php 
include_once('functions/function.php');
needlogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();

$PASS=$_GET['P'];
$sel="SELECT * FROM users NATURAL JOIN roles WHERE user_id='$PASS'";
$Q=mysqli_query($con,$sel);
$PW=mysqli_fetch_assoc($Q);
$OPW=$PW['user_password'];

If($_POST){
    $oldpass=md5($_POST['oldpass']);
    $newpass=md5($_POST['newpass']);
    $repass=md5($_POST['conpass']);

    $update="UPDATE users SET user_password='$newpass' WHERE user_id='$PASS'";

    if(!empty($oldpass)){
    if(!empty($newpass)){
    if(!empty($repass)){
        if($newpass===$repass){
            if($OPW=== $oldpass){
                if(mysqli_query($con,$update)){
                    header('Location: index.php');
                }else{
                    echo "Opps! Operation Failed";
                }

            }else{
                echo "Old & New Password Didn't Matched";
            }

        }else{
            echo " New & Confirm Password Didn't Matched";
        }
    }else{
        echo "Please Enter Confirm Password";
    }
    }else{
        echo "Please Enter New Password";
    }
    }else{
        echo "Please Enter Old Password";
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
                    <i class="fab fa-gg-circle"></i>Change Password 
                </div>  
                <div class="col-md-4 card_button_part">
                    <a href="all-user.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All User</a>
                </div>  
            </div>
          </div>
          <div class="card-body">
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Old-Password <span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="password" class="form-control form_control" id="" name="oldpass">
                </div>
              </div>
               <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">New-Password <span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="password" class="form-control form_control" id="" name="newpass">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Confirm-Password<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="password" class="form-control form_control" id="" name="conpass">
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