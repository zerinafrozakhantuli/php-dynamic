<?php 
 include_once('functions/function.php');
 get_header();
 ?>
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php 
                 $banners="SELECT * FROM banner ORDER BY ban_id DESC";
                 $b=mysqli_query($con,$banners);
                 while($item=mysqli_fetch_assoc($b)){
                ?>

                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                    <img class="img-fluid" src="admin/uploads/<?=$item['ban_image'] ?>" alt="Image">
                </button>
            <?php
             }
            ?>
            </div>
            <div class="carousel-inner">
                  <?php 
                 $banners="SELECT * FROM banner ORDER BY ban_id DESC";
                 $b=mysqli_query($con,$banners);
                 $i = 1;
                 while($item=mysqli_fetch_assoc($b)){

                
                ?>

                <div class="carousel-item <?=  ($i == 1) ? 'active' : ''  ?> ">
                    <img class="w-100" src="admin/uploads/<?=$item['ban_image']?>" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-4 animated zoomIn"><?=$item['ban_title']?></h4>
                            <h1 class="display-1 text-white mb-0 animated zoomIn"><?= $item['ban_subtitle']?></h1>
                        </div>
                    </div>
                </div>
            <?php
              $i++;
             }
            ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->



    <!-- Facts Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-4">
         <?php 
         $Fsel="SELECT * FROM facts ORDER BY fact_id DESC";
         $QF=mysqli_query($con,$Fsel);
         while($fact=mysqli_fetch_assoc($QF)){
         ?>
          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="fact-item bg-light rounded text-center h-100 p-5">
              <i class="<?=$fact['fact_icon']?> fa-4x text-primary mb-4"></i>
              <h5 class="mb-3"><?= $fact['fact_title'];?></h5>
              <h1 class="display-5 mb-0" data-toggle="counter-up"><?= $fact['fact_count'];?></h1>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </div>
    <!-- Facts End -->
    <!-- About Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            
            <?php 
            $SelA="SELECT * FROM about ORDER BY about_id LIMIT 1";
            $QA=mysqli_query($con,$SelA);
            while($about=mysqli_fetch_assoc($QA)){

            ?>
            <div class="img-border">
              <img class="img-fluid" src="admin/uploads/<?=$about['about_img1'];?>" alt="">
            </div>
           <?php } ?>
          </div>
         <?php 
            $SelA="SELECT * FROM about ORDER BY about_id ASC";
            $QA=mysqli_query($con,$SelA);
            while($about2=mysqli_fetch_assoc($QA)){

            ?>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="h-100">
               <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
      <h1 class="display-6 mb-4">#1<?=$about2['about_subtitle']?>  <span class="text-primary"><?=$about2['about_subbold']?></span> </h1>
              <p><?=$about2['about_para1']?></p>
              <p class="mb-4"><?=$about2['about_para2']?></p>
              <div class="d-flex align-items-center mb-4 pb-2">
                <img class="flex-shrink-0 rounded-circle" src="admin/uploads/<?=$about2['about_img2'];?>" alt="" style="width: 50px; height: 50px;">
                <div class="ps-4">
                  <h6><?=$about2['about_title2']?></h6>
                  <small><?=$about2['about_title3']?></small>
                </div>
              </div>
              <a class="btn btn-primary rounded-pill py-3 px-5" href=""><?=$about2['about_button']?></a>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <!-- About End -->
    <!-- Service Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
          <h6 class="section-title bg-white text-center text-primary px-3">Services</h6>
          <?php 
      $Service="SELECT * FROM service ORDER BY ser_id LIMIT 1";
      $Q=mysqli_query($con,$Service);
      while($seritem=mysqli_fetch_assoc($Q)){
        ?>
          <h1 class="display-6 mb-4"><?=$seritem['ser_title'];?></h1>
           <?php } ?>
        </div>
     
        <div class="row g-4">
          <?php 
        $Service="SELECT * FROM service ORDER BY ser_id ASC";
      $QI=mysqli_query($con,$Service);
      while($itemser=mysqli_fetch_assoc($QI)){

          ?>

          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <a class="service-item d-block rounded text-center h-100 p-4" href="">
              <img class="img-fluid rounded mb-4" src="admin/uploads/<?=$itemser['ser_img']?>" alt="">
              <h4 class="mb-0"><?=$itemser['ser_topic'];?></h4>
            </a>
          </div>
          <?php } ?> 
        </div>
      </div>
    </div>
<!-- Service End -->

<!-- Feature Start -->
<div class="container-xxl py-5">
<div class="container">
<div class="row g-5">
  <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
    <div class="h-100">
      <h6 class="section-title bg-white text-start text-primary pe-3">Why Choose Us</h6>
       
      <h1 class="display-6 mb-4">Why People Trust Us? Learn About Us!</h1>
      <?php
       $sel="SELECT * FROM skill ORDER BY skill_id LIMIT 1";
       $Q=mysqli_query($con,$sel);
       while($sdata=mysqli_fetch_assoc($Q)){
       ?>
      <p class="mb-4"><?=$sdata['skill_para']?></p>
    <?php } ?>
      <div class="row g-4">
     <?php 
      $skill="SELECT * FROM skill ORDER BY skill_id LIMIT 0,4";
      $QS=mysqli_query($con,$skill);
      while($dataS=mysqli_fetch_assoc($QS)){
     ?>
        <div class="col-12">
          <div class="skill">
            <div class="d-flex justify-content-between">
              <p class="mb-2"><?=$dataS['skill_topic']?></p>
              <p class="mb-2"><?=$dataS['skill_count']?>%</p>
            </div>
            <div class="progress">
          <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="<?=$dataS['skill_count']?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
    <div class="img-border">
      <?php
       $sel="SELECT * FROM skill ORDER BY skill_id LIMIT 1";
       $Q=mysqli_query($con,$sel);
       while($data=mysqli_fetch_assoc($Q)){
       ?>
      <img class="img-fluid" src="admin/uploads/<?=$data['skill_img']?>" alt="">
       <?php } ?>
    </div>
  </div>
 
</div>
</div>
</div>
<!-- Feature End -->

    <!-- Project Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
          <h6 class="section-title bg-white text-center text-primary px-3">Our Projects</h6>
          <h1 class="display-6 mb-4">Learn More About Our Complete Projects</h1>
        </div>
        <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
          <?php 
          $Pro="SELECT * FROM project ORDER BY pro_id ASC";
          $PQ=mysqli_query($con,$Pro);
          while($data=mysqli_fetch_assoc($PQ)){
          ?>
          <div class="project-item border rounded h-100 p-4" data-dot="01">
            <div class="position-relative mb-4">
              <img class="img-fluid rounded" src="admin/uploads/<?= $data['pro_img'] ?>" alt="">
              <a href="img/project-1.jpg" data-lightbox="project">
                <i class="<?= $data['pro_icon'] ?> fa-2x"></i>
              </a>
            </div>
            <h6><?= $data['pro_title']?></h6>
            <span><?=$data['pro_info']?></span>
          </div>
       <?php } ?>
        </div>
      </div>
    </div>
    <!-- Project End -->
    <!-- Team Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
          <h6 class="section-title bg-white text-center text-primary px-3">Our Team</h6>
          <h1 class="display-6 mb-4">We Are A Creative Team For Your Dream Project</h1>
        </div>
        <div class="row g-4">
          <?php 
          $SelT="SELECT * FROM team ORDER BY team_id ASC";
          $TQ=mysqli_query($con,$SelT);
          while($data=mysqli_fetch_assoc($TQ)){
          ?>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="team-item text-center p-4">
              <img class="img-fluid border rounded-circle w-75 p-2 mb-4" src="admin/uploads/<?= $data['team_img']?>" alt="">
              <div class="team-text">
                <div class="team-title">
                  <h5><?=$data['team_title']?></h5>
                  <span><?=$data['team_subtitle']?></span>
                </div>
                <div class="team-social">
                  <a class="btn btn-square btn-primary rounded-circle" href="<?=$data['team_link1']?>">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                  <a class="btn btn-square btn-primary rounded-circle" href="<?=$data['team_link2']?>">
                    <i class="fab fa-twitter"></i>
                  </a>
                  <a class="btn btn-square btn-primary rounded-circle" href="<?=$data['team_link3']?>">
                    <i class="fab fa-instagram"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
         <?php } ?>
        </div>
      </div>
    </div>
    <!-- Team End -->
    <!-- Contact Start -->
<div class="container-xxl py-5">
<div class="container">
<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
<h6 class="section-title bg-white text-center text-primary px-3">Contact Us</h6>
<h1 class="display-6 mb-4">If You Have Any Query, Please Feel Free Contact Us</h1>
</div>
<div class="row g-0 justify-content-center">
<div class="col-lg-8 wow fadeInUp" data-wow-delay="0.5s">
<?php 
 if(!empty($_POST)){
  $name=htmlentities($_POST['name'],ENT_QUOTES);
  $email=htmlentities($_POST['email'],ENT_QUOTES);
  $subject=htmlentities($_POST['sub'],ENT_QUOTES);
  $message=htmlentities($_POST['text'],ENT_QUOTES);

  $insert="INSERT INTO contact(con_name,con_email,con_sub,con_text)
  VALUES('$name','$email','$subject','$message')";

  if(!empty($email)){
    if(!empty($message)){
      if(mysqli_query($con,$insert)){
        echo "Successfully Send Message";
      }else{
        echo "Message Send Failed";
      }

    }else{
      echo "Please Enter Message";
    }

  }else{
    echo "Please Enter Email";
  }

 }
?>
  
  <form method="post" action="">
      <div class="row g-3">
          <div class="col-md-6">
              <div class="form-floating">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                  <label for="name">Your Name</label>
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-floating">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                  <label for="email">Your Email</label>
              </div>
          </div>
          <div class="col-12">
              <div class="form-floating">
                  <input type="text" class="form-control" id="subject" name="sub" placeholder="Subject">
                  <label for="subject">Subject</label>
              </div>
          </div>
          <div class="col-12">
              <div class="form-floating">
                  <textarea class="form-control" placeholder="Leave a message here" id="message" name="text" style="height: 200px"></textarea>
                  <label for="message">Text</label>
              </div>
          </div>
          <div class="col-12 text-center">
              <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Send Message</button>
          </div>
      </div>
  </form>
</div>
</div>
</div>
</div>
    <!-- Contact End -->

   
    <?php 
     get_footer();
     ?>