<?php
include "./incl/header.php";


if(isset($_POST['update_orders'])){

  $id_update_status = mysqli_real_escape_string($conn , $_POST['id_update_traking']);
  $status_orders = mysqli_real_escape_string($conn , $_POST['status_orders']);

  $sqli_update = "UPDATE `orders_users` SET `status_order_user`='$status_orders' WHERE `id_traking_orders`='$id_update_status'";

  if(mysqli_query($conn , $sqli_update)){

    header("Location:order_status.php?lang=".$_GET['lang']);

  }else{
    echo "Query error !!" . mysqli_error($conn);
  }

}

?>
      <style>
        .color-box {
            width: 20px;
            height: 20px;
            border-radius: 100%;
        }
      </style>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="./store_info.php?lang=<?php echo $lang ?>">
              <p><?php echo $language['Store Information'] ?></p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $language['Products'] ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./add_product.php?lang=<?php echo $lang ?>"><?php echo $language['Add New'] ?></a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="./all_products.php?lang=<?php echo $lang ?>"><?php echo $language['All Products'] ?></a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="./products_views_number.php?lang=<?php echo $lang ?>"><?php echo $language['Products Views Number'] ?></a>
            </div>
          </li>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $language['Orders'] ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./orders.php?lang=<?php echo $lang ?>"><?php echo $language['Orders'] ?></a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item active" href="./order_status.php?lang=<?php echo $lang ?>"><?php echo $language['Orders Status'] ?></a>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./ads.php?lang=<?php echo $lang ?>">
              <p><?php echo $language['Ads Sponsor'] ?></p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./views.php?lang=<?php echo $lang ?>">
              <p><?php echo $language['Views'] ?></p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./login.php?lang=<?php echo $lang ?>">
              <p><?php echo $language['Logout'] ?></p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <?php
       include "./incl/navbar.php";
      ?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h3 class="card-title"><?php echo $language['Orders Status'] ?></h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class="text-success">
                        <th><?php echo $language['Customer Name'] ?></th>
                        <th><?php echo $language['ID order'] ?></th>
                        <th><?php echo $language['Product Name'] ?></th>
                        <th><?php echo $language['Order Status'] ?></th>
                      </thead>
                      <tbody>
                        <?php 
                          $select="SELECT * FROM `orders` WHERE `name_store`='$store_name_order_vendor'";
                          $query=mysqli_query($conn , $select);
                          while($row=mysqli_fetch_assoc($query)):
                        ?>
                        <tr>
                            <td><?php echo $row['Customer_Name']; ?></td>
                            <td><?php echo $row['order_id']; ?></td>
                            <td><?php echo ($lang=="ar") ? $row['Product_Name_ar'] : $row['Product_Name']; ?></td>
                            <td>
                              <form class="d-flex" action="" method="POST">
                                <input type="hidden" name="id_update_traking" value="<?php echo $row['id_traking_orders'] ?>">
                                <select class="form-control" name="status_orders" id="<?php echo $row['id_orders'] ?>" required="">
                                  <option value=""><?php echo $language['Select Status'] ?></option>
                                  <?php 
                                    $sql_mneu="SELECT `status_order_user` FROM `orders_users` WHERE `id_traking_orders`='".$row['id_traking_orders']."'";
                                    $result=mysqli_query($conn , $sql_mneu);
                                    $row_mneus=mysqli_fetch_assoc($result);
                                  ?>
                                  <option value="0" <?php if ($row_mneus['status_order_user'] == '0') echo 'selected="selected"'; ?>><?php echo $language['Pending'] ?></option>
                                  <option value="1" <?php if ($row_mneus['status_order_user'] == '1') echo 'selected="selected"'; ?>><?php echo $language['Approved'] ?></option>
                                  <option value="2" <?php if ($row_mneus['status_order_user'] == '2') echo 'selected="selected"'; ?>><?php echo $language['Delivered'] ?></option>
                                  <option value="3" <?php if ($row_mneus['status_order_user'] == '3') echo 'selected="selected"'; ?>><?php echo $language['On Hold'] ?></option>
                                  <option value="4" <?php if ($row_mneus['status_order_user'] == '4') echo 'selected="selected"'; ?>><?php echo $language['Completed'] ?></option>
                                </select>
                                <button type="submit" name="update_orders" class="btn btn-success mx-3"><?php echo $language['Update'] ?></button>
                              </form>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php include "./incl/footer.php"; ?>