<?php 
include_once('functions/function.php');
needlogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();


if(!empty($_POST)){
    $stitle=$_POST['title'];
    $stopic=$_POST['topic'];
    $image=$_FILES['pic'];
    $imageName="";

    if($image['name']!=''){
    $imageName='service_'.time().rand(100,10000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
    }

    
$insert="INSERT INTO service(ser_title,ser_img,ser_topic)VALUES('$stitle','$imageName','$stopic')";

    if(!empty($stitle)){
        if(!empty($imageName)){
            if(mysqli_query($con,$insert)){
                move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
                echo "SUCCESS";
            }else{
                echo "FAILED";
            }

        }else{
            echo "Upload Image";
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
                    <i class="fab fa-gg-circle"></i>Services
                </div>  
                <div class="col-md-4 card_button_part">
                    <a href="all-service.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Service</a>
                </div>  
            </div>
          </div>
          <div class="card-body">
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Service Title<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" id="" name="title">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Service Image<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="file" class="form-control form_control" id="" name="pic">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Service Topic<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form_control" id="" name="topic">
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