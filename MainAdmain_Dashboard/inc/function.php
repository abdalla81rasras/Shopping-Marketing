<?php  
include "connection.php";
include "incFun.php";

//header
if(isset($_POST['save_header'])){

   if(empty($_FILES['img_logo']['name'])){
      $errors['img_logo']="No Selected Image !";
   }else{
      $img_logo = $_FILES['img_logo']['name'];
      $img_logoTamp = $_FILES["img_logo"]["tmp_name"];
      $folderimg_logo = "../Upload_main_admin/" . $img_logo ;
      move_uploaded_file($img_logoTamp , $folderimg_logo );
   }

   if(empty($_FILES['dash_logo']['name'])){
      $errors['dash_logo']="No Selected Image !";
   }else{
      $dash_logo = $_FILES['dash_logo']['name'];
      $dash_logoTamp = $_FILES["dash_logo"]["tmp_name"];
      $folderdash_logo = "../Upload_main_admin/" . $dash_logo ;
      move_uploaded_file($dash_logoTamp , $folderdash_logo );
   }
   
   if(empty($_POST['dash_name'])){
      $errors['dash_name']="No Name Dashboard !";
   }else{
      $dash_name = $_POST['dash_name'];
   }

   if(!array_filter($errors)){
      $img_logo = mysqli_real_escape_string($conn , $_FILES['img_logo']['name']);
      $dash_logo = mysqli_real_escape_string($conn , $_FILES['dash_logo']['name']);
      $dash_name = mysqli_real_escape_string($conn , $_POST['dash_name']);
      
      $sql="UPDATE `header` SET `img_logo`='$img_logo' ,`dash_logo`='$dash_logo' ,`dash_name`='$dash_name'";

      if(mysqli_query($conn , $sql)){
         header("Location:view_header.php");
      }else{
         echo 'query error !' . mysqli_error($conn);
      }
   }
}

if(isset($_GET['edit_header'])){

   $id_header=$_GET['edit_header'];

   $update=true;
   $edit=true;

   $sql="SELECT * FROM `header` WHERE `id_header`='$id_header'";

   $query=mysqli_query($conn,$sql);

   while ($row=mysqli_fetch_assoc($query)) {   
      $img_logo = $row['img_logo'];
      $dash_logo = $row['dash_logo'];
      $dash_name = $row['dash_name'];
   }

   if(empty($_FILES['img_logo']['name'])){
      $errors['edit_img_logo']="Be selected Old image when updating data !!";
   }

   if(empty($_FILES['dash_logo']['name'])){
      $errors['edit_dash_logo']="Be selected Old image when updating data !!";
   }
}

if(isset($_POST['update_header'])){

   $id_header = $_POST['id_header'];

   $update=true;

   if(empty($_FILES['img_logo']['name'])){
      $errors['img_logo']="No update image , or the original image must be selected when updating data";
   }else{
      $img_logo = $_FILES['img_logo']['name'];
      $img_logoTamp = $_FILES["img_logo"]["tmp_name"];
      $folderimg_logo = "../Upload_main_admin/" . $img_logo ;
      move_uploaded_file($img_logoTamp , $folderimg_logo );
   }

   if(empty($_FILES['dash_logo']['name'])){
      $errors['dash_logo']="No update image , or the original image must be selected when updating data";
   }else{
      $dash_logo = $_FILES['dash_logo']['name'];
      $dash_logoTamp = $_FILES["dash_logo"]["tmp_name"];
      $folderdash_logo = "../Upload_main_admin/" . $dash_logo ;
      move_uploaded_file($dash_logoTamp , $folderdash_logo );
   }

   if(empty($_POST['dash_name'])){
      $errors['dash_name']="No Name Dashboard !";
   }else{
      $dash_name = $_POST['dash_name'];
   }

   if(!array_filter($errors)){
      $img_logo = mysqli_real_escape_string($conn , $_FILES['img_logo']['name']);
      $dash_logo = mysqli_real_escape_string($conn , $_FILES['dash_logo']['name']);
      $dash_name = mysqli_real_escape_string($conn , $_POST['dash_name']);
      
      $sql="UPDATE `header` SET `img_logo`='$img_logo' ,`dash_logo`='$dash_logo' ,`dash_name`='$dash_name' WHERE `id_header`= '$id_header'";

      if(mysqli_query($conn , $sql)){
         header("Location:view_header.php");
      }else{
         echo 'query error !' . mysqli_error($conn);
      }
   }
}

//footer
if(isset($_POST['save_footer'])){

   if(empty($_FILES['img_logo_footer']['name'])){
      $errors['img_logo_footer']="No Selected Image !";
   }else{
      $img_logo_footer = $_FILES['img_logo_footer']['name'];
      $img_logo_footerTamp = $_FILES["img_logo_footer"]["tmp_name"];
      $folderimg_logo_footer = "../Upload_main_admin/" . $img_logo_footer ;
      move_uploaded_file($img_logo_footerTamp , $folderimg_logo_footer );
   }

   if(empty($_FILES['img_security']['name'])){
      $errors['img_security']="No Selected Image !";
   }else{
      $img_security = $_FILES['img_security']['name'];
      $img_securityTamp = $_FILES["img_security"]["tmp_name"];
      $folderimg_security = "../Upload_main_admin/" . $img_security ;
      move_uploaded_file($img_securityTamp , $folderimg_security );
   }

   if(empty($_FILES['vid_A']['name'])){
      $errors['vid_A']="No Selected Video !";
   }else{
      $vid_A = $_FILES['vid_A']['name'];
      $vid_ATamp = $_FILES["vid_A"]["tmp_name"];
      $foldervid_A = "../Upload_main_admin/" . $vid_A ;
      move_uploaded_file($vid_ATamp , $foldervid_A );
   }

   if(empty($_POST['slogin_footer'])){
      $errors['slogin_footer']="No Slogin !";
   }else{
      $slogin_footer = $_POST['slogin_footer'];
   }

   if(empty($_POST['facebook_footer'])){
      $errors['facebook_footer']="No Link !";
   }else{
      $facebook_footer = $_POST['facebook_footer'];
   }

   if(empty($_POST['insta_footer'])){
      $errors['insta_footer']="No Link !";
   }else{
      $insta_footer = $_POST['insta_footer'];
   }

   if(empty($_POST['whats_footer'])){
      $errors['whats_footer']="No Link !";
   }else{
      $whats_footer = $_POST['whats_footer'];
   }

   if(empty($_POST['title_security1'])){
      $errors['title_security1']="No Title !";
   }else{
      $title_security1 = $_POST['title_security1'];
   }

   if(empty($_POST['title_security2'])){
      $errors['title_security2']="No Title !";
   }else{
      $title_security2 = $_POST['title_security2'];
   }

   if(empty($_POST['title_security3'])){
      $errors['title_security3']="No Title !";
   }else{
      $title_security3 = $_POST['title_security3'];
   }

   if(empty($_POST['title_security4'])){
      $errors['title_security4']="No Title !";
   }else{
      $title_security4 = $_POST['title_security4'];
   }

   if(empty($_POST['desc_security1'])){
      $errors['desc_security1']="No Description !";
   }else{
      $desc_security1 = $_POST['desc_security1'];
   }

   if(empty($_POST['desc_security2'])){
      $errors['desc_security2']="No Description !";
   }else{
      $desc_security2 = $_POST['desc_security2'];
   }

   if(empty($_POST['desc_security3'])){
      $errors['desc_security3']="No Description !";
   }else{
      $desc_security3 = $_POST['desc_security3'];
   }

   if(empty($_POST['desc_security4'])){
      $errors['desc_security4']="No Description !";
   }else{
      $desc_security4 = $_POST['desc_security4'];
   }

   if(empty($_POST['Q1'])){
      $errors['Q1']="No Question !";
   }else{
      $Q1 = $_POST['Q1'];
   }

   if(empty($_POST['Q2'])){
      $errors['Q2']="No Question !";
   }else{
      $Q2 = $_POST['Q2'];
   }

   if(empty($_POST['Q3'])){
      $errors['Q3']="No Question !";
   }else{
      $Q3 = $_POST['Q3'];
   }

   if(empty($_POST['Q4'])){
      $errors['Q4']="No Question !";
   }else{
      $Q4 = $_POST['Q4'];
   }

   if(empty($_POST['A1'])){
      $errors['A1']="No Answer !";
   }else{
      $A1 = $_POST['A1'];
   }

   if(empty($_POST['A2'])){
      $errors['A2']="No Answer !";
   }else{
      $A2 = $_POST['A2'];
   }

   if(empty($_POST['A4'])){
      $errors['A4']="No Answer !";
   }else{
      $A4 = $_POST['A4'];
   }

   if(!array_filter($errors)){
      $img_logo_footer = mysqli_real_escape_string($conn , $_FILES['img_logo_footer']['name']);
      $img_security = mysqli_real_escape_string($conn , $_FILES['img_security']['name']);
      $vid_A = mysqli_real_escape_string($conn , $_FILES['vid_A']['name']);
      $slogin_footer = mysqli_real_escape_string($conn , $_POST['slogin_footer']);
      $facebook_footer = mysqli_real_escape_string($conn , $_POST['facebook_footer']);
      $insta_footer = mysqli_real_escape_string($conn , $_POST['insta_footer']);
      $whats_footer = mysqli_real_escape_string($conn , $_POST['whats_footer']);
      $title_security1 = mysqli_real_escape_string($conn , $_POST['title_security1']);
      $title_security2 = mysqli_real_escape_string($conn , $_POST['title_security2']);
      $title_security3 = mysqli_real_escape_string($conn , $_POST['title_security3']);
      $title_security4 = mysqli_real_escape_string($conn , $_POST['title_security4']);
      $desc_security1 = mysqli_real_escape_string($conn , $_POST['desc_security1']);
      $desc_security2 = mysqli_real_escape_string($conn , $_POST['desc_security2']);
      $desc_security3 = mysqli_real_escape_string($conn , $_POST['desc_security3']);
      $desc_security4 = mysqli_real_escape_string($conn , $_POST['desc_security4']);
      $Q1 = mysqli_real_escape_string($conn , $_POST['Q1']);
      $Q2 = mysqli_real_escape_string($conn , $_POST['Q2']);
      $Q3 = mysqli_real_escape_string($conn , $_POST['Q3']);
      $Q4 = mysqli_real_escape_string($conn , $_POST['Q4']);
      $A1 = mysqli_real_escape_string($conn , $_POST['A1']);
      $A2 = mysqli_real_escape_string($conn , $_POST['A2']);
      $A4 = mysqli_real_escape_string($conn , $_POST['A4']);
      
      $sql="UPDATE `footer` 
               SET `img_logo_footer`='$img_logo_footer' ,`slogin_footer`='$slogin_footer' ,
                  `facebook_footer`='$facebook_footer' ,`insta_footer`='$insta_footer' ,
                  `whats_footer`='$whats_footer' ,`title_security1`='$title_security1' ,
                  `title_security2`='$title_security2' ,`title_security3`='$title_security3' ,
                  `title_security4`='$title_security4' ,`desc_security1`='$desc_security1' ,
                  `desc_security2`='$desc_security2' ,`desc_security3`='$desc_security3' ,
                  `desc_security4`='$desc_security4' ,`img_security`='$img_security' ,
                  `Q1`='$Q1' ,`Q2`='$Q2' ,
                  `Q3`='$Q3' ,`Q4`='$Q4' ,
                  `A1`='$A1' ,`A2`='$A2' ,
                  `A4`='$A4' ,`vid_A`='$vid_A'";

      if(mysqli_query($conn , $sql)){
         header("Location:view_footer.php");
      }else{
         echo 'query error !' . mysqli_error($conn);
      }
   }
}

if(isset($_GET['edit_footer'])){

   $id_footer=$_GET['edit_footer'];

   $update=true;
   $edit=true;

   $sql="SELECT * FROM `footer` WHERE `id_footer`='$id_footer'";

   $query=mysqli_query($conn,$sql);

   while ($row=mysqli_fetch_assoc($query)) {   
      $img_logo_footer = $row['img_logo_footer'];
      $slogin_footer = $row['slogin_footer'];
      $facebook_footer = $row['facebook_footer'];
      $insta_footer = $row['insta_footer'];
      $whats_footer = $row['whats_footer'];
      $title_security1 = $row['title_security1'];
      $title_security2 = $row['title_security2'];
      $title_security3 = $row['title_security3'];
      $title_security4 = $row['title_security4'];
      $desc_security1 = $row['desc_security1'];
      $desc_security2 = $row['desc_security2'];
      $desc_security3 = $row['desc_security3'];
      $desc_security4 = $row['desc_security4'];
      $img_security = $row['img_security'];
      $Q1 = $row['Q1'];
      $Q2 = $row['Q2'];
      $Q3 = $row['Q3'];
      $Q4 = $row['Q4'];
      $A1 = $row['A1'];
      $A2 = $row['A2'];
      $A4 = $row['A4'];
      $vid_A = $row['vid_A'];
   }

   if(empty($_FILES['img_logo_footer']['name'])){
      $errors['edit_img_logo_footer']="Be selected Old image when updating data !!";
   }

   if(empty($_FILES['img_security']['name'])){
      $errors['edit_img_security']="Be selected Old image when updating data !!";
   }

   if(empty($_FILES['vid_A']['name'])){
      $errors['edit_vid_A']="Be selected Old video when updating data !!";
   }
}

if(isset($_POST['update_footer'])){

   $id_footer = $_POST['id_footer'];

   $update=true;

   if(empty($_FILES['img_logo_footer']['name'])){
      $errors['img_logo_footer']="No update image , or the original image must be selected when updating data";
   }else{
      $img_logo_footer = $_FILES['img_logo_footer']['name'];
      $img_logo_footerTamp = $_FILES["img_logo_footer"]["tmp_name"];
      $folderimg_logo_footer = "../Upload_main_admin/" . $img_logo_footer ;
      move_uploaded_file($img_logo_footerTamp , $folderimg_logo_footer );
   }

   if(empty($_FILES['img_security']['name'])){
      $errors['img_security']="No update image , or the original image must be selected when updating data";
   }else{
      $img_security = $_FILES['img_security']['name'];
      $img_securityTamp = $_FILES["img_security"]["tmp_name"];
      $folderimg_security = "../Upload_main_admin/" . $img_security ;
      move_uploaded_file($img_securityTamp , $folderimg_security );
   }

   if(empty($_FILES['vid_A']['name'])){
      $errors['vid_A']="No update video , or the original video must be selected when updating data";
   }else{
      $vid_A = $_FILES['vid_A']['name'];
      $vid_ATamp = $_FILES["vid_A"]["tmp_name"];
      $foldervid_A = "../Upload_main_admin/" . $vid_A ;
      move_uploaded_file($vid_ATamp , $foldervid_A );
   }

   if(empty($_POST['slogin_footer'])){
      $errors['slogin_footer']="No Update Slogin !";
   }else{
      $slogin_footer = $_POST['slogin_footer'];
   }

   if(empty($_POST['facebook_footer'])){
      $errors['facebook_footer']="No Update Link !";
   }else{
      $facebook_footer = $_POST['facebook_footer'];
   }

   if(empty($_POST['insta_footer'])){
      $errors['insta_footer']="No Update Link !";
   }else{
      $insta_footer = $_POST['insta_footer'];
   }

   if(empty($_POST['whats_footer'])){
      $errors['whats_footer']="No Update Link !";
   }else{
      $whats_footer = $_POST['whats_footer'];
   }

   if(empty($_POST['title_security1'])){
      $errors['title_security1']="No Update Title !";
   }else{
      $title_security1 = $_POST['title_security1'];
   }

   if(empty($_POST['title_security2'])){
      $errors['title_security2']="No Update Title !";
   }else{
      $title_security2 = $_POST['title_security2'];
   }

   if(empty($_POST['title_security3'])){
      $errors['title_security3']="No Update Title !";
   }else{
      $title_security3 = $_POST['title_security3'];
   }

   if(empty($_POST['title_security4'])){
      $errors['title_security4']="No Update Title !";
   }else{
      $title_security4 = $_POST['title_security4'];
   }

   if(empty($_POST['desc_security1'])){
      $errors['desc_security1']="No Update Description !";
   }else{
      $desc_security1 = $_POST['desc_security1'];
   }

   if(empty($_POST['desc_security2'])){
      $errors['desc_security2']="No Update Description !";
   }else{
      $desc_security2 = $_POST['desc_security2'];
   }

   if(empty($_POST['desc_security3'])){
      $errors['desc_security3']="No Update Description !";
   }else{
      $desc_security3 = $_POST['desc_security3'];
   }

   if(empty($_POST['desc_security4'])){
      $errors['desc_security4']="No Update Description !";
   }else{
      $desc_security4 = $_POST['desc_security4'];
   }

   if(empty($_POST['Q1'])){
      $errors['Q1']="No Update Question !";
   }else{
      $Q1 = $_POST['Q1'];
   }

   if(empty($_POST['Q2'])){
      $errors['Q2']="No Update Question !";
   }else{
      $Q2 = $_POST['Q2'];
   }

   if(empty($_POST['Q3'])){
      $errors['Q3']="No Update Question !";
   }else{
      $Q3 = $_POST['Q3'];
   }

   if(empty($_POST['Q4'])){
      $errors['Q4']="No Update Question !";
   }else{
      $Q4 = $_POST['Q4'];
   }

   if(empty($_POST['A1'])){
      $errors['A1']="No Update Answer !";
   }else{
      $A1 = $_POST['A1'];
   }

   if(empty($_POST['A2'])){
      $errors['A2']="No Update Answer !";
   }else{
      $A2 = $_POST['A2'];
   }

   if(empty($_POST['A4'])){
      $errors['A4']="No Update Answer !";
   }else{
      $A4 = $_POST['A4'];
   }

   if(!array_filter($errors)){
      $img_logo_footer = mysqli_real_escape_string($conn , $_FILES['img_logo_footer']['name']);
      $img_security = mysqli_real_escape_string($conn , $_FILES['img_security']['name']);
      $vid_A = mysqli_real_escape_string($conn , $_FILES['vid_A']['name']);
      $slogin_footer = mysqli_real_escape_string($conn , $_POST['slogin_footer']);
      $facebook_footer = mysqli_real_escape_string($conn , $_POST['facebook_footer']);
      $insta_footer = mysqli_real_escape_string($conn , $_POST['insta_footer']);
      $whats_footer = mysqli_real_escape_string($conn , $_POST['whats_footer']);
      $title_security1 = mysqli_real_escape_string($conn , $_POST['title_security1']);
      $title_security2 = mysqli_real_escape_string($conn , $_POST['title_security2']);
      $title_security3 = mysqli_real_escape_string($conn , $_POST['title_security3']);
      $title_security4 = mysqli_real_escape_string($conn , $_POST['title_security4']);
      $desc_security1 = mysqli_real_escape_string($conn , $_POST['desc_security1']);
      $desc_security2 = mysqli_real_escape_string($conn , $_POST['desc_security2']);
      $desc_security3 = mysqli_real_escape_string($conn , $_POST['desc_security3']);
      $desc_security4 = mysqli_real_escape_string($conn , $_POST['desc_security4']);
      $Q1 = mysqli_real_escape_string($conn , $_POST['Q1']);
      $Q2 = mysqli_real_escape_string($conn , $_POST['Q2']);
      $Q3 = mysqli_real_escape_string($conn , $_POST['Q3']);
      $Q4 = mysqli_real_escape_string($conn , $_POST['Q4']);
      $A1 = mysqli_real_escape_string($conn , $_POST['A1']);
      $A2 = mysqli_real_escape_string($conn , $_POST['A2']);
      $A4 = mysqli_real_escape_string($conn , $_POST['A4']);
      
      $sql="UPDATE `footer` 
               SET `img_logo_footer`='$img_logo_footer' ,`slogin_footer`='$slogin_footer' ,
                  `facebook_footer`='$facebook_footer' ,`insta_footer`='$insta_footer' ,
                  `whats_footer`='$whats_footer' ,`title_security1`='$title_security1' ,
                  `title_security2`='$title_security2' ,`title_security3`='$title_security3' ,
                  `title_security4`='$title_security4' ,`desc_security1`='$desc_security1' ,
                  `desc_security2`='$desc_security2' ,`desc_security3`='$desc_security3' ,
                  `desc_security4`='$desc_security4' ,`img_security`='$img_security' ,
                  `Q1`='$Q1' ,`Q2`='$Q2' ,
                  `Q3`='$Q3' ,`Q4`='$Q4' ,
                  `A1`='$A1' ,`A2`='$A2' ,
                  `A4`='$A4' ,`vid_A`='$vid_A' 
               WHERE `id_footer`= '$id_footer'";

      if(mysqli_query($conn , $sql)){
         header("Location:view_footer.php");
      }else{
         echo 'query error !' . mysqli_error($conn);
      }
   } 
}

//slide bar
if(isset($_POST['save_slide_bar'])){
	
   if(empty($_POST['title_slidebar'])){
      $errors['title_slidebar']="No Title !";
   }else{
      $title_slidebar = $_POST['title_slidebar'];
   }

   if(empty($_POST['description_slide_bar'])){
      $errors['description_slide_bar']="No Descrioption !";
   }else{
      $description_slide_bar = $_POST['description_slide_bar'];
   }

   if(empty($_POST['btn_slider'])){
      $errors['btn_slider']="No Link !";
   }else{
      $btn_slider = $_POST['btn_slider'];
   }

   if(empty($_FILES['img_slider_bar']['name'])){
      $errors['img_slider_bar']="No Selected Image !";
   }else{
      $img_slider_bar = $_FILES['img_slider_bar']['name'];
      $img_slider_barTamp = $_FILES["img_slider_bar"]["tmp_name"];
      $folderimg_slider_bar = "../Upload_main_admin/" . $img_slider_bar ;
      move_uploaded_file($img_slider_barTamp , $folderimg_slider_bar );
   }

   if(!array_filter($errors)){
      $title_slidebar = mysqli_real_escape_string($conn , $_POST['title_slidebar']);
      $description_slide_bar = mysqli_real_escape_string($conn , $_POST['description_slide_bar']);
      $btn_slider = mysqli_real_escape_string($conn , $_POST['btn_slider']);
      $img_slider_bar = mysqli_real_escape_string($conn , $_FILES['img_slider_bar']['name']);

      $sql="INSERT INTO `slider`(`title_slidebar`,`description_slide_bar`,`btn_slider`,`img_slider_bar`) VALUES('$title_slidebar','$description_slide_bar','$btn_slider','$img_slider_bar')";

      if(mysqli_query($conn , $sql)){
         header("Location:view_slide_bar.php");
      }else{
         echo 'query error !' . mysqli_error($conn);
      }
   }
}

if(isset($_GET['delete_slidebar'])){
   $id_slidebar = $_GET['delete_slidebar'];

   $sql="DELETE FROM `slider` WHERE `id_slidebar`='$id_slidebar'";

   if(mysqli_query($conn, $sql)){

   } else {
      echo 'query error: '. mysqli_error($conn);
   }
   
   header("Location:view_slide_bar.php");
}

if(isset($_GET['edit_slidebar'])){

   $id_slidebar=$_GET['edit_slidebar'];

   $update=true;
   $edit=true;

   $sql="SELECT * FROM `slider` WHERE `id_slidebar`='$id_slidebar'";

   $query=mysqli_query($conn,$sql);

   while ($row=mysqli_fetch_assoc($query)) {   
      $title_slidebar = $row['title_slidebar'];
      $description_slide_bar = $row['description_slide_bar'];
      $img_slider_bar = $row['img_slider_bar'];
      $btn_slider = $row['btn_slider'];
   }

   if(empty($_FILES['img_slider_bar']['name'])){
      $errors['edit_img_slider_bar']="Be selected Old image when updating data !!";
   }
}

if(isset($_POST['update_slide_bar'])){

   $id_slidebar = $_POST['id_slidebar'];

   $update=true;

   if(empty($_POST['title_slidebar'])){
      $errors['title_slidebar']="No Update Title !";
   }else{
      $title_slidebar = $_POST['title_slidebar'];
   }

   if(empty($_POST['description_slide_bar'])){
      $errors['description_slide_bar']="No Update Description !";
   }else{
      $description_slide_bar = $_POST['description_slide_bar'];
   }

   if(empty($_POST['btn_slider'])){
      $errors['btn_slider']="No Update Link !";
   }else{
      $btn_slider = $_POST['btn_slider'];
   }

   if(empty($img_slider_bar = $_FILES['img_slider_bar']['name'])){
      $errors['img_slider_bar']="No update image , or the original image must be selected when updating data";
   }else{
      $img_slider_bar = $_FILES['img_slider_bar']['name'];
      $img_slider_barTamp = $_FILES["img_slider_bar"]["tmp_name"];
      $folderimg_slider_bar = "../Upload_main_admin/" . $img_slider_bar ;
      move_uploaded_file($img_slider_barTamp , $folderimg_slider_bar );
   }

   if(!array_filter($errors)){
      $title_slidebar = mysqli_real_escape_string($conn , $_POST['title_slidebar']);
      $description_slide_bar = mysqli_real_escape_string($conn , $_POST['description_slide_bar']);
      $btn_slider = mysqli_real_escape_string($conn , $_POST['btn_slider']);
      $img_slider_bar = mysqli_real_escape_string($conn , $_FILES['img_slider_bar']['name']);

      $sql="UPDATE `slider` SET `title_slidebar`='$title_slidebar' ,`description_slide_bar`='$description_slide_bar' ,`img_slider_bar`='$img_slider_bar' ,`btn_slider`='$btn_slider' WHERE `id_slidebar`= '$id_slidebar'";

      if(mysqli_query($conn , $sql)){
         header("Location:view_slide_bar.php");
      }else{
         echo 'query error !' . mysqli_error($conn);
      }
   } 
}

//under slidr 1
if(isset($_POST['save_under_one'])){

	if(empty($_FILES['img_under_one']['name'])){
      $errors['img_under_one']="No Selected Image !";
   }else{
      $img_under_one = $_FILES['img_under_one']['name'];
      $img_under_oneTamp = $_FILES["img_under_one"]["tmp_name"];
      $folderimg_under_one = "../Upload_main_admin/" . $img_under_one ;
      move_uploaded_file($img_under_oneTamp , $folderimg_under_one );
   }

   if(empty($_POST['title_under_one_1'])){
      $errors['title_under_one_1']="No Title !";
   }else{
      $title_under_one_1 = $_POST['title_under_one_1'];
   }

   if(empty($_POST['title_under_one_2'])){
      $errors['title_under_one_2']="No Title !";
   }else{
      $title_under_one_2 = $_POST['title_under_one_2'];
   }

   if(empty($_POST['discount_under_one'])){
      $errors['discount_under_one']="No Discount !";
   }else{
      $discount_under_one = $_POST['discount_under_one'];
   }

   if(empty($_POST['link_under_one'])){
      $errors['link_under_one']="No Link !";
   }else{
      $link_under_one = $_POST['link_under_one'];
   }

   if(!array_filter($errors)){
      $title_under_one_1 = mysqli_real_escape_string($conn , $_POST['title_under_one_1']);
      $title_under_one_2 = mysqli_real_escape_string($conn , $_POST['title_under_one_2']);
      $discount_under_one = mysqli_real_escape_string($conn , $_POST['discount_under_one']);
      $link_under_one = mysqli_real_escape_string($conn , $_POST['link_under_one']);
      $img_under_one = mysqli_real_escape_string($conn , $_FILES['img_under_one']['name']);

      $sql="UPDATE `under_slider_one` SET `title_under_one_1`='$title_under_one_1' ,`title_under_one_2`='$title_under_one_2' ,`discount_under_one`='$discount_under_one' ,`link_under_one`='$link_under_one' ,`img_under_one`='$img_under_one'";

      if(mysqli_query($conn , $sql)){
         header("Location:view_us1.php");
      }else{
         echo 'query error !' . mysqli_error($conn);
      }
   }
}

if(isset($_GET['edit_under_one'])){

   $id_under_one=$_GET['edit_under_one'];

   $update=true;
   $edit=true;

   $sql="SELECT * FROM `under_slider_one` WHERE `id_under_one`='$id_under_one'";

   $query=mysqli_query($conn,$sql);

   while ($row=mysqli_fetch_assoc($query)) {   
      $title_under_one_1 = $row['title_under_one_1'];
      $title_under_one_2 = $row['title_under_one_2'];
      $discount_under_one = $row['discount_under_one'];
      $link_under_one = $row['link_under_one'];
      $img_under_one = $row['img_under_one'];
   }

   if(empty($_FILES['img_under_one']['name'])){
      $errors['edit_img_under_one']="Be selected Old image when updating data !!";
   }
}

if(isset($_POST['update_under_one'])){

   $id_under_one = $_POST['id_under_one'];

   $update=true;

   if(empty($_FILES['img_under_one']['name'])){
      $errors['img_under_one']="No update image , or the original image must be selected when updating data";
   }else{
      $img_under_one = $_FILES['img_under_one']['name'];
      $img_under_oneTamp = $_FILES["img_under_one"]["tmp_name"];
      $folderimg_under_one = "../Upload_main_admin/" . $img_under_one ;
      move_uploaded_file($img_under_oneTamp , $folderimg_under_one );
   }

   if(empty($_POST['title_under_one_1'])){
      $errors['title_under_one_1']="No Update Title !";
   }else{
      $title_under_one_1 = $_POST['title_under_one_1'];
   }

   if(empty($_POST['title_under_one_2'])){
      $errors['title_under_one_2']="No Update Title !";
   }else{
      $title_under_one_2 = $_POST['title_under_one_2'];
   }

   if(empty($_POST['discount_under_one'])){
      $errors['discount_under_one']="No Update Discount !";
   }else{
      $discount_under_one = $_POST['discount_under_one'];
   }

   if(empty($_POST['link_under_one'])){
      $errors['link_under_one']="No Update Link !";
   }else{
      $link_under_one = $_POST['link_under_one'];
   }

   if(!array_filter($errors)){
      $title_under_one_1 = mysqli_real_escape_string($conn , $_POST['title_under_one_1']);
      $title_under_one_2 = mysqli_real_escape_string($conn , $_POST['title_under_one_2']);
      $discount_under_one = mysqli_real_escape_string($conn , $_POST['discount_under_one']);
      $link_under_one = mysqli_real_escape_string($conn , $_POST['link_under_one']);
      $img_under_one = mysqli_real_escape_string($conn , $_FILES['img_under_one']['name']);

      $sql="UPDATE `under_slider_one` SET `title_under_one_1`='$title_under_one_1' ,`title_under_one_2`='$title_under_one_2' ,`discount_under_one`='$discount_under_one' ,`link_under_one`='$link_under_one' ,`img_under_one`='$img_under_one' WHERE `id_under_one`= '$id_under_one'";

      if(mysqli_query($conn , $sql)){
         header("Location:view_us1.php");
      }else{
         echo 'query error !' . mysqli_error($conn);
      }
   } 
}

//under slider 2
if(isset($_POST['save_under_tow'])){

	if(empty($_FILES['img_under_tow']['name'])){
      $errors['img_under_tow']="No Selected Image !";
   }else{
      $img_under_tow = $_FILES['img_under_tow']['name'];
      $img_under_towTamp = $_FILES["img_under_tow"]["tmp_name"];
      $folderimg_under_tow = "../Upload_main_admin/" . $img_under_tow ;
      move_uploaded_file($img_under_towTamp , $folderimg_under_tow );
   }

   if(empty($_POST['title_under_tow_1'])){
      $errors['title_under_tow_1']="No Title !";
   }else{
      $title_under_tow_1 = $_POST['title_under_tow_1'];
   }

   if(empty($_POST['title_under_tow_2'])){
      $errors['title_under_tow_2']="No Title !";
   }else{
      $title_under_tow_2 = $_POST['title_under_tow_2'];
   }

   if(empty($_POST['discount_under_tow'])){
      $errors['discount_under_tow']="No Discount !";
   }else{
      $discount_under_tow = $_POST['discount_under_tow'];
   }

   if(empty($_POST['link_under_tow'])){
      $errors['link_under_tow']="No Link !";
   }else{
      $link_under_tow = $_POST['link_under_tow'];
   }

   if(!array_filter($errors)){
      $title_under_tow_1 = mysqli_real_escape_string($conn , $_POST['title_under_tow_1']);
      $title_under_tow_2 = mysqli_real_escape_string($conn , $_POST['title_under_tow_2']);
      $discount_under_tow = mysqli_real_escape_string($conn , $_POST['discount_under_tow']);
      $link_under_tow = mysqli_real_escape_string($conn , $_POST['link_under_tow']);
      $img_under_tow = mysqli_real_escape_string($conn , $_FILES['img_under_tow']['name']);

      $sql="UPDATE `under_slider_tow` SET `title_under_tow_1`='$title_under_tow_1' ,`title_under_tow_2`='$title_under_tow_2' ,`discount_under_tow`='$discount_under_tow' ,`link_under_tow`='$link_under_tow' ,`img_under_tow`='$img_under_tow'";

      if(mysqli_query($conn , $sql)){
         header("Location:view_us2.php");
      }else{
         echo 'query error !' . mysqli_error($conn);
      }
   }
}

if(isset($_GET['edit_under_tow'])){

   $id_under_tow=$_GET['edit_under_tow'];

   $update=true;
   $edit=true;

   $sql="SELECT * FROM `under_slider_tow` WHERE `id_under_tow`='$id_under_tow'";

   $query=mysqli_query($conn,$sql);

   while ($row=mysqli_fetch_assoc($query)) {   
      $title_under_tow_1 = $row['title_under_tow_1'];
      $title_under_tow_2 = $row['title_under_tow_2'];
      $discount_under_tow = $row['discount_under_tow'];
      $link_under_tow = $row['link_under_tow'];
      $img_under_tow = $row['img_under_tow'];
   }

   if(empty($_FILES['img_under_tow']['name'])){
      $errors['edit_img_under_tow']="Be selected Old image when updating data !!";
   }
}

if(isset($_POST['update_under_tow'])){

   $id_under_tow = $_POST['id_under_tow'];

   $update=true;

   if(empty($_FILES['img_under_tow']['name'])){
      $errors['img_under_tow']="No update image , or the original image must be selected when updating data";
   }else{
      $img_under_tow = $_FILES['img_under_tow']['name'];
      $img_under_towTamp = $_FILES["img_under_tow"]["tmp_name"];
      $folderimg_under_tow = "../Upload_main_admin/" . $img_under_tow ;
      move_uploaded_file($img_under_towTamp , $folderimg_under_tow );
   }

   if(empty($_POST['title_under_tow_1'])){
      $errors['title_under_tow_1']="No Update Title !";
   }else{
      $title_under_tow_1 = $_POST['title_under_tow_1'];
   }

   if(empty($_POST['title_under_tow_2'])){
      $errors['title_under_tow_2']="No Update Title !";
   }else{
      $title_under_tow_2 = $_POST['title_under_tow_2'];
   }

   if(empty($_POST['discount_under_tow'])){
      $errors['discount_under_tow']="No Update Discount !";
   }else{
      $discount_under_tow = $_POST['discount_under_tow'];
   }

   if(empty($_POST['link_under_tow'])){
      $errors['link_under_tow']="No Update Link !";
   }else{
      $link_under_tow = $_POST['link_under_tow'];
   }

   if(!array_filter($errors)){
      $title_under_tow_1 = mysqli_real_escape_string($conn , $_POST['title_under_tow_1']);
      $title_under_tow_2 = mysqli_real_escape_string($conn , $_POST['title_under_tow_2']);
      $discount_under_tow = mysqli_real_escape_string($conn , $_POST['discount_under_tow']);
      $link_under_tow = mysqli_real_escape_string($conn , $_POST['link_under_tow']);
      $img_under_tow = mysqli_real_escape_string($conn , $_FILES['img_under_tow']['name']);

      $sql="UPDATE `under_slider_tow` SET `title_under_tow_1`='$title_under_tow_1' ,`title_under_tow_2`='$title_under_tow_2' ,`discount_under_tow`='$discount_under_tow' ,`link_under_tow`='$link_under_tow' ,`img_under_tow`='$img_under_tow' WHERE `id_under_tow`= '$id_under_tow'";

      if(mysqli_query($conn , $sql)){
         header("Location:view_us2.php");
      }else{
         echo 'query error !' . mysqli_error($conn);
      }
   } 
}

//promo code
if(isset($_POST['save_promo_code'])){
	
   if(empty($_POST['code'])){
      $errors['code']="No code !";
   }else{
      $code = $_POST['code'];
   }

   if(empty($_POST['discount_amount'])){
      $errors['discount_amount']="No discount amount !";
   }else{
      $discount_amount = $_POST['discount_amount'];
   }

   if(empty($_POST['expiration_date'])){
      $errors['expiration_date']="No expiration date !";
   }else{
      $expiration_date = $_POST['expiration_date'];
   }
   
   if(!array_filter($errors)){
      $code = mysqli_real_escape_string($conn , $_POST['code']);
      $discount_amount = mysqli_real_escape_string($conn , $_POST['discount_amount']);
      $expiration_date = mysqli_real_escape_string($conn , $_POST['expiration_date']);

      $sql="INSERT INTO `promo_codes`(`code`,`discount_amount`,`expiration_date`) VALUES('$code','$discount_amount','$expiration_date')";

      if(mysqli_query($conn , $sql)){
         header("Location:view_promo_code.php");
      }else{
         echo 'query error !' . mysqli_error($conn);
      }
   }
}

if(isset($_GET['delete_promo_code'])){
   
   $id_promo_code = $_GET['delete_promo_code'];

   $sql="DELETE FROM `promo_codes` WHERE `id_promo_code`='$id_promo_code'";

   if(mysqli_query($conn, $sql)){

   } else {
       echo 'query error: '. mysqli_error($conn);
   }
   
   header('Location:view_promo_code.php');
}

if(isset($_GET['edit_promo_code'])){

   $id_promo_code = $_GET['edit_promo_code'];

   $update=true;
   $edit=true;

   $sql="SELECT * FROM `promo_codes` WHERE `id_promo_code`='$id_promo_code'";

   $query=mysqli_query($conn,$sql);

   while ($row=mysqli_fetch_assoc($query)) {   
      $code = $row['code'];
      $discount_amount = $row['discount_amount'];
      $expiration_date = $row['expiration_date'];
   }
}

if(isset($_POST['update_promo_code'])){

   $id_promo_code = $_POST['id_promo_code'];

   $update=true;

   if(empty($_POST['code'])){
      $errors['code']="No update code !";
   }else{
      $code = $_POST['code'];
   }

   if(empty($_POST['discount_amount'])){
      $errors['discount_amount']="No update discount amount !";
   }else{
      $discount_amount = $_POST['discount_amount'];
   }

   if(empty($_POST['expiration_date'])){
      $errors['expiration_date']="No update expiration date !";
   }else{
      $expiration_date = $_POST['expiration_date'];
   }

   if(!array_filter($errors)){
      $code = mysqli_real_escape_string($conn , $_POST['code']);
      $discount_amount = mysqli_real_escape_string($conn , $_POST['discount_amount']);
      $expiration_date = mysqli_real_escape_string($conn , $_POST['expiration_date']);

      $sql="UPDATE `promo_codes` SET `code`='$code' , `discount_amount`='$discount_amount' , `expiration_date`='$expiration_date' WHERE `id_promo_code`= '$id_promo_code'";

      if(mysqli_query($conn , $sql)){
         header("Location:view_promo_code.php");
      }else{
         echo 'query error !' . mysqli_error($conn);
      }
   } 
}

//all inner sliders
if(isset($_POST['save_inner_slider_banner'])){
	
   if(empty($_FILES['banner']['name'])){
      $errors['banner']="No Selected Image !";
   }else{
      $banner = $_FILES['banner']['name'];
      $bannerTamp = $_FILES["banner"]["tmp_name"];
      $folderbanner = "../Upload_main_admin/" . $banner ;
      move_uploaded_file($bannerTamp , $folderbanner );
   }

   if(!array_filter($errors)){
      $banner = mysqli_real_escape_string($conn , $_FILES['banner']['name']);

      $sql="UPDATE `inner_slider_banner` SET `banner`='$banner'";

      if(mysqli_query($conn , $sql)){
         header("Location:view_inner_slider.php");
      }else{
         echo 'query error !' . mysqli_error($conn);
      }
   }
}

if(isset($_GET['edit_inner_slider_banner'])){

   $id_inner_slider_banner=$_GET['edit_inner_slider_banner'];

   $update=true;
   $edit=true;

   $sql="SELECT * FROM `inner_slider_banner` WHERE `id_inner_slider_banner`='$id_inner_slider_banner'";

   $query=mysqli_query($conn,$sql);

   while ($row=mysqli_fetch_assoc($query)) {   
      $banner = $row['banner'];
   }

   if(empty($_FILES['banner']['name'])){
      $errors['edit_banner']="Be selected Old image when updating data !!";
   }
}

if(isset($_POST['update_inner_slider_banner'])){

   $id_inner_slider_banner = $_POST['id_inner_slider_banner'];

   $update=true;

   if(empty($_FILES['banner']['name'])){
      $errors['banner']="No update image , or the original image must be selected when updating data";
   }else{
      $banner = $_FILES['banner']['name'];
      $bannerTamp = $_FILES["banner"]["tmp_name"];
      $folderbanner = "../Upload_main_admin/" . $banner ;
      move_uploaded_file($bannerTamp , $folderbanner );
   }

   if(!array_filter($errors)){
      $banner = mysqli_real_escape_string($conn , $_FILES['banner']['name']);

      $sql="UPDATE `inner_slider_banner` SET `banner`='$banner' WHERE `id_inner_slider_banner`= '$id_inner_slider_banner'";

      if(mysqli_query($conn , $sql)){
         header("Location:view_inner_slider.php");
      }else{
         echo 'query error !' . mysqli_error($conn);
      }
   } 
}

//feedback
if(isset($_POST['save_feed'])){
	
   if(empty($_POST['description_feedback'])){
      $errors['description_feedback']="No Feedback !";
   }else{
      $description_feedback = $_POST['description_feedback'];
   }
   
   if(empty($_POST['name_feedback'])){
      $errors['name_feedback']="No Name !";
   }else{
      $name_feedback = $_POST['name_feedback'];
   }

   if(empty($_POST['email_feedback'])){
      $errors['email_feedback']="No Email !";
   }else{
      $email_feedback = $_POST['email_feedback'];
      if(!preg_match('/^([A-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/', $email_feedback)){
         $errors['email_feedback'] = 'No valid email !';
      } 
   }

   if(empty($_FILES['img_feedback']['name'])){
      $errors['img_feedback']="No Selected Image !";
   }else{
      $img_feedback = $_FILES['img_feedback']['name'];
      $img_feedbackTamp = $_FILES["img_feedback"]["tmp_name"];
      $folderimg_feedback = "../Upload_main_admin/" . $img_feedback ;
      move_uploaded_file($img_feedbackTamp , $folderimg_feedback );
   }

   if(!array_filter($errors)){
      $description_feedback = mysqli_real_escape_string($conn , $_POST['description_feedback']);
      $name_feedback = mysqli_real_escape_string($conn , $_POST['name_feedback']);
      $email_feedback = mysqli_real_escape_string($conn , $_POST['email_feedback']);
      $img_feedback = mysqli_real_escape_string($conn , $_FILES['img_feedback']['name']);

      $sql="INSERT INTO `feedback`(`description_feedback`,`name_feedback`,`email_feedback`,`img_feedback`) VALUES('$description_feedback','$name_feedback','$email_feedback','$img_feedback')";

      if(mysqli_query($conn , $sql)){
         header('Location:view_feedback.php');
      }else{
         echo 'query error !' . mysqli_error($conn);
      }
   }
}

if(isset($_GET['delete_feedback'])){

   $id_feedback = $_GET['delete_feedback'];

   $sql="DELETE FROM `feedback` WHERE `id_feedback`='$id_feedback'";

   if(mysqli_query($conn, $sql)){

   } else {
      echo 'query error: '. mysqli_error($conn);
   }
   
   header('Location:view_feedback.php');
}

if(isset($_GET['edit_feedback'])){

   $id_feedback=$_GET['edit_feedback'];

   $update=true;
   $edit=true;

   $sql="SELECT * FROM `feedback` WHERE `id_feedback`='$id_feedback'";

   $query=mysqli_query($conn,$sql);

   while ($row=mysqli_fetch_assoc($query)) {   
      $img_feedback = $row['img_feedback'];
      $description_feedback = $row['description_feedback'];
      $name_feedback = $row['name_feedback'];
      $email_feedback = $row['email_feedback'];
   }

   if(empty($_FILES['img_feedback']['name'])){
      $errors['edit_img_feedback']="Be selected Old image when updating data !!";
   }
}

if(isset($_POST['update_feed'])){

   $id_feedback = $_POST['id_feedback'];

   $update=true;

   if(empty($_POST['description_feedback'])){
      $errors['description_feedback']="No Update Feedback !";
   }else{
      $description_feedback = $_POST['description_feedback'];
   }

   if(empty($_POST['name_feedback'])){
      $errors['name_feedback']="No Update Name !";
   }else{
      $name_feedback = $_POST['name_feedback'];
   }

   if(empty($_POST['email_feedback'])){
      $errors['email_feedback']="No Update Email";
   }else{
      $email_feedback = $_POST['email_feedback'];
      if(!preg_match('/^([A-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/', $email_feedback)){
         $errors['email_feedback'] = 'No valid email !';
      }
   }

   if(empty($_FILES['img_feedback']['name'])){
      $errors['img_feedback']="No update image , or the original image must be selected when updating data";
   }else{
      $img_feedback = $_FILES['img_feedback']['name'];
      $img_feedbackTamp = $_FILES["img_feedback"]["tmp_name"];
      $folderimg_feedback = "../Upload_main_admin/" . $img_feedback ;
      move_uploaded_file($img_feedbackTamp , $folderimg_feedback );
   }

   if(!array_filter($errors)){
      $description_feedback = mysqli_real_escape_string($conn , $_POST['description_feedback']);
      $name_feedback = mysqli_real_escape_string($conn , $_POST['name_feedback']);
      $email_feedback = mysqli_real_escape_string($conn , $_POST['email_feedback']);
      $img_feedback = mysqli_real_escape_string($conn , $_FILES['img_feedback']['name']);

      $sql="UPDATE `feedback` SET `description_feedback`='$description_feedback' ,`name_feedback`='$name_feedback' ,`email_feedback`='$email_feedback' ,`img_feedback`='$img_feedback'  WHERE `id_feedback`= '$id_feedback'";

      if(mysqli_query($conn , $sql)){
         header("Location:view_feedback.php");
      }else{
         echo 'query error !' . mysqli_error($conn);
      }
   } 
}

//contact
if(isset($_POST['save_contact'])){
	
   if(empty($_POST['title_contact'])){
      $errors['title_contact']="No Title !";
   }else{
      $title_contact = $_POST['title_contact'];
   }

   if(empty($_POST['address_contact'])){
      $errors['address_contact'] = "No Address !";
   }else{
      $address_contact = $_POST['address_contact'];
   }

   if(empty($_POST['phone_contact'])){
      $errors['phone_contact'] = "No Phone Number!";
   }else{
      $phone_contact = $_POST['phone_contact'];
      if(!preg_match('/^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/', $phone_contact)){
         $errors['phone_contact'] = 'Phone Number Invalid !';
      }
   }

   if(empty($_POST['phone_hotline_contact'])){
      $errors['phone_hotline_contact'] ="No Phone Number Hotline !";
   }else{
      $phone_hotline_contact = $_POST['phone_hotline_contact'];
      if(!preg_match('/^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/', $phone_hotline_contact)){
         $errors['phone_hotline_contact'] = 'Phone Number Invalid !';
      }
   }

   if(empty($_POST['email_contact'])){
      $errors['email_contact']="No Email !";
   }else{
      $email_contact = $_POST['email_contact'];
      if(!preg_match('/^([A-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/', $email_contact)){
         $errors['email_contact'] = 'No valid email !';
      }
   }

   if(empty($_POST['email_support_contact'])){
      $errors['email_support_contact']="No Email Support !";
   }else{
      $email_support_contact = $_POST['email_support_contact'];
      if(!preg_match('/^([A-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/', $email_support_contact)){
         $errors['email_support_contact'] = 'No valid email !';
      }
   }

   if(!array_filter($errors)){
      $title_contact = mysqli_real_escape_string($conn , $_POST['title_contact']);
      $address_contact = mysqli_real_escape_string($conn , $_POST['address_contact']);
      $phone_contact = mysqli_real_escape_string($conn , $_POST['phone_contact']);
      $phone_hotline_contact = mysqli_real_escape_string($conn , $_POST['phone_hotline_contact']);
      $email_contact = mysqli_real_escape_string($conn , $_POST['email_contact']);
      $email_support_contact = mysqli_real_escape_string($conn , $_POST['email_support_contact']);

      $sql="UPDATE `contact` SET `title_contact`='$title_contact' ,`address_contact`='$address_contact' ,`phone_contact`='$phone_contact' ,`phone_hotline_contact`='$phone_hotline_contact' ,`email_contact`='$email_contact' ,`email_support_contact`='$email_support_contact'";

      if(mysqli_query($conn , $sql)){
         header("Location:view_contact.php");
      }else{
         echo 'query error !' . mysqli_error($conn);
      }
   }
}

if(isset($_GET['edit_contact'])){

   $id_contact=$_GET['edit_contact'];

   $update=true;
   $edit=true;

   $sql="SELECT * FROM `contact` WHERE `id_contact`='$id_contact'";

   $query=mysqli_query($conn,$sql);

   while ($row=mysqli_fetch_assoc($query)) {   
      $title_contact = $row['title_contact'];
      $address_contact = $row['address_contact'];
      $phone_contact = $row['phone_contact'];
      $phone_hotline_contact = $row['phone_hotline_contact'];
      $email_contact = $row['email_contact'];
      $email_support_contact = $row['email_support_contact'];
   }
}

if(isset($_POST['update_contact'])){

   $id_contact = $_POST['id_contact'];

   $update=true;

   if(empty($_POST['title_contact'])){
      $errors['title_contact']="No Update Title !";
   }else{
      $title_contact = $_POST['title_contact'];
   }

   if(empty($_POST['address_contact'])){
      $errors['address_contact'] = "No Update Address !";
   }else{
      $address_contact = $_POST['address_contact'];
   }

   if(empty($_POST['phone_contact'])){
      $errors['phone_contact'] = "No Update Phone Number!";
   }else{
      $phone_contact = $_POST['phone_contact'];
      if(!preg_match('/^(\+\d{1,2}\s?)?1?\-?\.?\s?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/', $phone_contact)){
         $errors['phone_contact'] = 'Phone Number Invalid !';
      }
   }

   if(empty($_POST['phone_hotline_contact'])){
      $errors['phone_hotline_contact'] ="No Update Phone Number Hotline !";
   }else{
      $phone_hotline_contact = $_POST['phone_hotline_contact'];
      if(!preg_match('/^(\+\d{1,2}\s?)?1?\-?\.?\s?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/', $phone_hotline_contact)){
         $errors['phone_hotline_contact'] = 'Phone Number Invalid !';
      }
   }

   if(empty($_POST['email_contact'])){
      $errors['email_contact']="No Update Email";
   }else{
      $email_contact = $_POST['email_contact'];
      if(!preg_match('/^([A-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/', $email_contact)){
         $errors['email_contact'] = 'No valid email !';
      }
   }

   if(empty($_POST['email_support_contact'])){
      $errors['email_support_contact']="No Update Email Support !";
   }else{
      $email_support_contact = $_POST['email_support_contact'];
      if(!preg_match('/^([A-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/', $email_support_contact)){
         $errors['email_support_contact'] = 'No valid email !';
      }
   }

   if(!array_filter($errors)){
      $title_contact = mysqli_real_escape_string($conn , $_POST['title_contact']);
      $address_contact = mysqli_real_escape_string($conn , $_POST['address_contact']);
      $phone_contact = mysqli_real_escape_string($conn , $_POST['phone_contact']);
      $phone_hotline_contact = mysqli_real_escape_string($conn , $_POST['phone_hotline_contact']);
      $email_contact = mysqli_real_escape_string($conn , $_POST['email_contact']);
      $email_support_contact = mysqli_real_escape_string($conn , $_POST['email_support_contact']);

      $sql="UPDATE `contact` SET `title_contact`='$title_contact' ,`address_contact`='$address_contact' ,`phone_contact`='$phone_contact' ,`phone_hotline_contact`='$phone_hotline_contact' ,`email_contact`='$email_contact' ,`email_support_contact`='$email_support_contact' WHERE `id_contact`= '$id_contact'";

      if(mysqli_query($conn , $sql)){
         header("Location:view_contact.php");
      }else{
         echo 'query error !' . mysqli_error($conn);
      }
   } 
}

//intro
if(isset($_POST['save_intro'])){
	
   if(empty($_FILES['vid_intro']['name'])){
      $errors['vid_intro']="No Selected Video !";
   }else{
      $intro = $_FILES['vid_intro']['name'];
      $introTamp = $_FILES["vid_intro"]["tmp_name"];
      $folderintro = "../upload_intro/" . $intro ;
      move_uploaded_file($introTamp , $folderintro );
   }

   if(!array_filter($errors)){
      $vid_intro = mysqli_real_escape_string($conn , $_FILES['vid_intro']['name']);

      $sql="UPDATE `intro` SET `vid_intro`='$vid_intro'";

      if(mysqli_query($conn , $sql)){
         header("Location:view_intro.php");
      }else{
         echo 'query error !' . mysqli_error($conn);
      }
   }
}

if(isset($_GET['edit_intro'])){

   $id_intro=$_GET['edit_intro'];

   $update=true;
   $edit=true;

   $sql="SELECT * FROM `intro` WHERE `id_intro`='$id_intro'";

   $query=mysqli_query($conn,$sql);

   while ($row=mysqli_fetch_assoc($query)) {   
      $intros = $row['vid_intro'];
   }

   if(empty($_FILES['vid_intro']['name'])){
      $errors['edit_vid_intro']="Be selected Old video when updating data !!";
   }
}

if(isset($_POST['update_intro'])){

   $id_intro = $_POST['id_intro'];

   $update=true;

   if(empty($_FILES['vid_intro']['name'])){
      $errors['vid_intro']="No update video , or the original video must be selected when updating data";
   }else{
      $intro = $_FILES['vid_intro']['name'];
      $introTamp = $_FILES["vid_intro"]["tmp_name"];
      $folderintro = "../upload_intro/" . $intro ;
      move_uploaded_file($introTamp , $folderintro );
   }

   if(!array_filter($errors)){
      $vid_intro = mysqli_real_escape_string($conn , $_FILES['vid_intro']['name']);

      $sql="UPDATE `intro` SET `vid_intro`='$vid_intro' WHERE `id_intro`= '$id_intro'";

      if(mysqli_query($conn , $sql)){
         header("Location:view_intro.php");
      }else{
         echo 'query error !' . mysqli_error($conn);
      }
   } 
}

//users
if(isset($_GET['delete_user'])){

   $id_users=$_GET['delete_user'];

   $sql="DELETE FROM `users` WHERE `id_users`='$id_users'";

   if(mysqli_query($conn, $sql)){

   } else {
      echo 'query error: '. mysqli_error($conn);
   }
   
   header('Location:view_users.php');
}

//message
if(isset($_GET['delete_form_contact'])){
    
   $id_form_contact=$_GET['delete_form_contact'];

   $sql="DELETE FROM `form_contact` WHERE `id_form_contact`='$id_form_contact'";

   if(mysqli_query($conn, $sql)){

   } else {
      echo 'query error: '. mysqli_error($conn);
   }
   
   header('Location:view_messages.php');
}

//stores
$conn_2=mysqli_connect("localhost","root","","vendor_zanzon");
if(!$conn_2){
   die("Connection Error !!".mysqli_connect_error($conn_2));
}

if(isset($_GET['delete_stores'])){
    
   $id_store_info=$_GET['delete_stores'];

   $sql="DELETE FROM `store_information` WHERE `id_store_info`='$id_store_info'";

   if(mysqli_query($conn_2, $sql)){

   } else {
      echo 'query error: '. mysqli_error($conn_2);
   }
   
   header('Location:view_stores.php');
}

//orders
if(isset($_GET['delete_orders'])){
    
   $id_orders = $_GET['delete_orders'];

   $sql="DELETE FROM `orders` WHERE `id_orders`='$id_orders'";

   if(mysqli_query($conn_2, $sql)){

   } else {
      echo 'query error: '. mysqli_error($conn_2);
   }
   
   header('Location:view_orders.php');
}

?>