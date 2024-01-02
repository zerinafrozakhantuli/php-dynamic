<?php 
 include_once('functions/function.php');
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
  <h3 class="mb-3">Forgot Password </h3>
    <div class="bg-white shadow rounded">
        <div class="row">
            <div class="col-md-7 pe-0">
                <div class="form-left h-100 py-5 px-5">
                  <?php 
                   if($_POST){
                    $email=$_POST['email'];
                    $sel="SELECT * FROM users WHERE user_email='$email'";
                    $Q=mysqli_query($con,$sel);
                    $EmailAd=mysqli_fetch_assoc($Q);
                    

                    if($EmailAd){
                        // $to=$email;
                        // $subject="Reset Password Confirmation";
                        // $text="www.Uysystem.ltd/reset-password.php";
                        // $header="From: noreply@Uysystem.ltd"."\r\n".
                        // "cc: xyz@Uysystem.ltd";
                        // mail($to, $subject, $text,$header);

                        header('Location: reset-password.php?rp='.$EmailAd['user_slug']);
                    }else{
                        echo "Email Address Incorrect";
                    }
                   }
                  ?>
                    <form action="" method="post"class="row g-4">
                        <div class="col-12">
                            <label>Email<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email Address">
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary px-4  mt-4">Send</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5 ps-0 d-none d-md-block">
                <div class="form-right h-100 bg-secondary text-white text-center pt-5">
                    <i class="fas fa-user-shield"></i>
                    <h2 class="fs-1">Forgot Password!!!</h2>
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