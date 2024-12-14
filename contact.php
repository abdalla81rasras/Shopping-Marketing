<?php
session_start();
if(!isset($_SESSION['id_users']) && !isset($_SESSION['TRue'])){
    
}

include "./includes/connection_1.php";
include "./includes/connection_2.php";
include "./includes/header.php";
?>

<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 breadcrumb-bg1">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb-title text-center my-20">
          <h2 class="title text-dark text-capitalize"><?php echo $language['Contact Us'] ?></h2>
        </div>
      </div>
      <div class="col-12">
        <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
          <li class="breadcrumb-item"><a href="index.php?lang=<?php echo $lang ?>"><?php echo $language['Home'] ?></a></li>
          <li class="breadcrumb-item active" aria-current="page">
            <?php echo $language['Contact'] ?>
          </li>
        </ol>
      </div>
    </div>
  </div>
</nav>
<!-- breadcrumb-section end -->

<!-- map start -->
<div class="map">
  <div id="mapid"></div>
</div>
<!-- map end -->
<!-- contact-section start -->
<section class="contact-section pt-70 pb-40">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-12 mb-30">
        <!--  contact page side content  -->
        <?php 
          $select_contact="SELECT * FROM `contact`";
          $query_contact=mysqli_query($conn_main_admin , $select_contact);
          while($row_contact=mysqli_fetch_assoc($query_contact)):
        ?>
          <div class="contact-page-side-content">
            <h3 class="contact-page-title"><?php echo $language['Contact Us'] ?></h3>
            <p class="contact-page-message mb-30"><?php echo $language[$row_contact['title_contact']]??""; ?>.</p>
              
            <div class="single-contact-block">
              <h4><i class="fa fa-fax"></i> <?php echo $language['Address'] ?></h4>
              <p><?php echo $row_contact['address_contact']; ?></p>
            </div>
            <div class="single-contact-block">
              <h4><i class="fa fa-phone"></i>  <?php echo $language['Phone'] ?></h4>
              <p>
                <a href="tel:123456789"><?php echo $language['Mobile'] ?> : <?php echo $row_contact['phone_contact']; ?></a>
              </p>
              <p><a href="tel:1009678456"><?php echo $language['Hotline'] ?> : <?php echo $row_contact['phone_hotline_contact']; ?></a></p>
            </div>

            <div class="single-contact-block">
              <h4><i class="fas fa-envelope"></i> <?php echo $language['Email'] ?></h4>
              <p><a href="mailto:yourmail@domain.com"><?php echo $row_contact['email_contact']; ?></a></p>
              <p><a href="mailto:support@hastech.company"><?php echo $row_contact['email_support_contact']; ?></a></p>
            </div>

            <!--=======  End of single contact block  =======-->
          </div>
        <?php endwhile; ?>

        <!--=======  End of contact page side content  =======-->

      </div>
      <div class="col-lg-6 col-12 mb-30">
        <!--  contact form content -->
        <div class="contact-form-content">
          <h3 class="contact-page-title"><?php echo $language['Tell Us Your Message'] ?></h3>
          <div class="contact-form">
            <?php 
              if(isset($_POST['SEND'])){

              $name_form = mysqli_real_escape_string($conn_main_admin , $_POST['name_form']);
              $email_form = mysqli_real_escape_string($conn_main_admin , $_POST['email_form']);
              $subject_form = mysqli_real_escape_string($conn_main_admin , $_POST['subject_form']);
              $message_form = mysqli_real_escape_string($conn_main_admin , $_POST['message_form']);
            
              $sql_send="INSERT INTO `form_contact`(`name_form`,`email_form`,`subject_form`,`message_form`) VALUES('$name_form','$email_form','$subject_form','$message_form')";
            
              if(mysqli_query($conn_main_admin , $sql_send)){
            ?>
              <div class="alert alert-success my-2" role="alert">
                <?php echo $language['Send Message Successfully'] ?>   :)
              </div>
            <?php 
              }else{
                echo "Error Query !!" . mysqli_error($conn_main_admin);
              }
              
            }
            ?>
            <?php 
              if(!empty($_SESSION['id_users'])):
            ?>
              <form id="contact-form" action="" method="post">
                <div class="form-group">
                  <label><?php echo $language['Your Name'] ?> <span class="required">*</span></label>
                  <input type="text" name="name_form" id="customername" required="">
                </div>
                <div class="form-group">
                  <label><?php echo $language['Your Email'] ?> <span class="required">*</span></label>
                  <input type="email" name="email_form" id="customerEmail" required="">
                </div>
                <div class="form-group">
                  <label><?php echo $language['Subject'] ?></label>
                  <input type="text" name="subject_form" id="contactSubject" required="">
                </div>
                <div class="form-group">
                  <label><?php echo $language['Your Message'] ?></label>
                  <textarea name="message_form" class="pb-10" id="contactMessage" required=""></textarea>
                </div>
                <div class="form-group mb-0">
                  <button type="submit" value="submit" id="submit" class="btn theme-btn--dark1 btn--xl"
                      name="SEND"><?php echo $language['submit'] ?></button>
                </div>
              </form>
            <?php else: ?>
              <div class="alert alert-info" role="alert">
                <p><?php echo $language['You must'] ?> <a href="login.php?lang=<?php echo $lang ?>"><?php echo $language['login'] ?></a> <?php echo $language['or'] ?> <a href="register.php?lang=<?php echo $lang ?>"><?php echo $language['registration'] ?></a>  :)</p>
              </div>
            <?php endif; ?>
          </div>
          <p class="form-messegemt-10"></p>
        </div>
        <!-- End of contact -->
      </div>
    </div>
  </div>
</section>
<!-- contact-section end -->

<?php
include "./includes/footer.php";
?>