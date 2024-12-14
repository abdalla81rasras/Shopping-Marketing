<?php
include "./incl/header.php";

$store_name_order_vendor = $_SESSION['StoreName_info'];

if(isset($_POST['delete_orders'])){

  $id_delete_orders = mysqli_real_escape_string($conn , $_POST['id_delete_orders']);

  $sql_delete = "DELETE FROM `orders` WHERE `id_orders`='$id_delete_orders'";

  if(mysqli_query($conn ,$sql_delete)) {

    header('Location:orders.php?lang='.$lang);

  } else {
    echo "Query error" . mysqli_error($conn);
  }
}

?>
      <style>
        .color-box {
          width: 20px;
          height: 20px;
          border-radius: 100%;
          border: 1px solid #2caf4e;
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
              <a class="dropdown-item active" href="./orders.php?lang=<?php echo $lang ?>"><?php echo $language['Orders'] ?></a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="./order_status.php?lang=<?php echo $lang ?>"><?php echo $language['Orders Status'] ?></a>
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
                  <h3 class="card-title"><?php echo $language['Orders'] ?></h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table songs-table" id="example">
                      <thead class="text-success">
                        <th><?php echo $language['Customer Name'] ?></th>
                        <th><?php echo $language['Customer Phone Number'] ?></th>
                        <th><?php echo $language['Product Name'] ?></th>
                        <th><?php echo $language['Order Category'] ?></th>
                        <th><?php echo $language['Order Sub Category'] ?></th>
                        <th><?php echo $language['Total Amount'] ?></th>
                        <th><?php echo $language['Order ID'] ?></th>
                        <th><?php echo $language['QTY + Color'] ?></th>
                        <th><?php echo $language['Action'] ?></th>
                      </thead>
                      <tbody class="table-views">
                        <?php 
                          $select="SELECT * FROM `orders` WHERE `name_store`='$store_name_order_vendor'";
                          $query=mysqli_query($conn , $select);
                          while($row=mysqli_fetch_assoc($query)):
                        ?>
                        <tr>
                          <td><?php echo $row['Customer_Name']; ?></td>
                          <td><?php echo $row['Customer_Phone_Number']; ?></td>
                          <td><?php echo ($lang=="ar") ? $row['Product_Name_ar'] : $row['Product_Name']; ?></td>
                          <td><?php echo $language[$row['Order_Category']]??""; ?></td>
                          <td><?php echo $language[$row['Order_Sub_Category']]??""; ?></td>
                          <td><?php echo $row['Total_Amount_Price']; ?>JD</td>
                          <td><?php echo $row['order_id']; ?></td>
                          <td class="d-flex"><?php echo $row['QTY']; ?>  ,  <div class="color-box" style="background-color: <?php echo $row['color']; ?>;"></div></td>
                          <td>
                            <form action="" method="POST">
                              <input type="hidden" name="id_delete_orders" value="<?php echo $row['id_orders']; ?>">
                              <button class="bg-white" type="submit" name="delete_orders" style="border:none ; outline:none;">
                                <a href="javascript::void()" name="delete_orders">  
                                  <i class="fa fa-trash" title="delete" style="font-size:16px;"></i>
                                </a>
                              </button>
                            </form>
                          </td>
                          </tr>
                        <?php endwhile; ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="text-center">
                    <button class="btn view_all" id="songs-load"><?php echo $language['View All'] ?></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php include "./incl/footer.php"; ?>