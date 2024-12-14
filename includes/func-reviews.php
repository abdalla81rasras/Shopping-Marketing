<?php
if(isset($_POST['submit_review'])){

  $id_user = $_SESSION['id_users'];
  $rating = mysqli_real_escape_string($conn_store_admin , $_POST['rating']);
  $comment_star = mysqli_real_escape_string($conn_store_admin , $_POST['comment_star']);

  $sql= "INSERT INTO `reviews`(`id_prudoct`,`id_user`,`rating`,`comment_star`) VALUES(".$_SESSION['id_name_prudoct'].",'$id_user','$rating','$comment_star')";

  if(mysqli_query($conn_store_admin , $sql)){

    $sql_update = "UPDATE `prudocts` SET `avg_rates` = ( SELECT AVG(rating) FROM `reviews` WHERE reviews.id_prudoct = prudocts.id_name_prudoct AND `rating` BETWEEN 1 AND 5 )";
    
    if(!mysqli_query($conn_store_admin,$sql_update)){
      echo 'query error !' . mysqli_error($conn_store_admin);
    }

    ?>
      <script type='text/javascript'>
        var message = '<?php echo $language['review has been added'] ?>';
        alert(message);
        window.location.href='single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $_SESSION['id_name_prudoct'] ?>';
        exit;
      </script>
    <?php
  }else{
    echo "Query Error !" . mysqli_error($conn_store_admin);
  }
}
?>