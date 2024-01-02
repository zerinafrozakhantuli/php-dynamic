<?php 
 include_once('functions/function.php');

 $slug=$_GET['rp'];
$sel="SELECT * FROM users NATURAL JOIN roles WHERE user_slug='$slug'";
$Q=mysqli_query($con,$sel);
$PW=mysqli_fetch_assoc($Q);
$OPW=$PW['user_id'];

If($_POST){
    $newpass=md5($_POST['password']);
    $repass=md5($_POST['repass']);

    $update="UPDATE users SET user_password='$newpass' WHERE user_id='$OPW'";

    if(!empty($newpass)){
    if(!empty($repass)){
        if($newpass===$repass){
                if(mysqli_query($con,$update)){
                    header('Location: logout.php');
                }else{
                    echo "Opps! Operation Failed";
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
    
}
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
<div class="login-page bg-light">
<div class="container">
<div class="row">
<div class="col-lg-10 offset-lg-1">
  <h3 class="mb-3">Reset Password</h3>
    <div class="bg-white shadow rounded">
        <div class="row">
            <div class="col-md-7 pe-0">
                <div class="form-left h-100 py-5 px-5">
           
                 <form action="" method="post"class="row g-4">
                        <div class="col-12">
                            <label>Password<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                                <input type="password" name="password" class="form-control" placeholder="Enter Password">
                            </div>
                        </div>

                        <div class="col-12">
                            <label>Confirm-Password<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                <input type="password" name="repass" class="form-control" placeholder="Enter Password">
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary px-4 mt-4">CHANGE</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5 ps-0 d-none d-md-block">
                <div class="form-right h-100 bg-secondary text-white text-center pt-5">
                    <i class="fas fa-user-shield"></i>
                    <h2 class="fs-1">Don't Forget Again!!!</h2>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>