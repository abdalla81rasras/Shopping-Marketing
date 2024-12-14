<?php
include "./incl/header.php";

$store_name=$_SESSION['StoreName_info'];
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
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $language['Products'] ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./add_product.php?lang=<?php echo $lang ?>"><?php echo $language['Add New'] ?></a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item active" href="./all_products.php?lang=<?php echo $lang ?>"><?php echo $language['All Products'] ?></a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="./products_views_number.php?lang=<?php echo $lang ?>"><?php echo $language['Products Views Number'] ?></a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $language['Orders'] ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./orders.php?lang=<?php echo $lang ?>"><?php echo $language['Orders'] ?></a>
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
      <?php include "./incl/navbar.php" ?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h3 class="card-title"><?php echo $language['All Products'] ?></h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class="text-success">
                        <th>Store Name</th>
                        <th>اسم المتجر</th>
                        <th>Store Logo</th>
                        <th><?php echo $language['Products Category'] ?></th>
                        <th><?php echo $language['Products Sub Category'] ?></th>
                        <th>Product Name</th>
                        <th>اسم المنتج</th>
                        <th>Product Short Description</th>
                        <th>وصف قصير للمنتج</th>
                        <th>Product Full Description</th>
                        <th>وصف طويل للمنتج</th>
                        <th>Product Material</th>
                        <th>مواد المنتج</th>
                        <th><?php echo $language['Product Sizes'] ?></th>
                        <th><?php echo $language['Product Colors'] ?></th>
                        <th><?php echo $language['Product Price'] ?></th>
                        <th><?php echo $language['Discount'] ?></th>
                        <th>Delivery Policy Time of Arrived</th>
                        <th>وقت وصول سياسة التسليم</th>
                        <th>Return Policy</th>
                        <th>سياسة العائدات</th>
                        <th><?php echo $language['Action'] ?></th>
                      </thead>
                      <tbody>
                        <?php 
                          $select="SELECT * FROM `prudocts` WHERE `store_name_prudoct`='$store_name' ORDER BY `id_name_prudoct` DESC";
                          $query=mysqli_query($conn , $select);
                          while($row=mysqli_fetch_assoc($query)):
                        ?>
                          <tr>
                            <td><?php echo $row['store_name_prudoct']; ?></td>
                            <td><?php echo $row['store_name_prudoct_arbic']; ?></td>
                            <td>
                              <img src="../Upload/<?php echo $row['store_logo_prudoct'] ?>" title="<?php echo $row['store_logo_prudoct'] ?>" alt="<?php echo $row['store_logo_prudoct'] ?>" width="70px">
                            </td>
                            <td><?php echo $language[$row['Products_Category']]??""; ?></td>
                            <td><?php echo $language[$row['Products_sub_Category']]??""; ?></td>
                            <td><?php echo $row['Products_Name']; ?></td>
                            <td><?php echo $row['Products_Name_arabic']; ?></td>
                            <td><?php echo $row['Product_Short_Description']; ?></td>
                            <td><?php echo $row['Product_Short_Description_arabic']; ?>
                            <td><?php echo $row['Product_Full_Description']; ?></td>
                            <td><?php echo $row['Product_Full_Description_arbic']; ?></td>
                            <td><?php echo $row['Product_Material']; ?></td>
                            <td><?php echo $row['Product_Material_arabic']; ?></td>
                            <td><?php echo $row['Products_Sizes']; ?></td>
                            <td><div class="color-box" style="background-color: <?php echo $row['Product_Colors']; ?>;"></div></td>
                            <td><?php echo $row['Product_Price']; ?>JOD</td>
                            <td><?php echo $row['discout_prudoct']; ?></td>
                            <td><?php echo $row['Delivery_Policy_Time']; ?></td>
                            <td><?php echo $row['Delivery_Policy_Time_arbic']; ?></td>
                            <td><?php echo $row['Return_Policy']; ?></td>
                            <td><?php echo $row['Return_Policy_arabic']; ?></td>
                            <td>
                              <a href="./add_product.php?lang=<?php echo $lang ?>&edit_name_prudoct=<?php echo $row['id_name_prudoct']; ?>"><i class="fa fa-edit" title="edit" style="font-size:16px;"></i></a>
                              <span style="font-size:16px;">|</span>
                              <a href="./add_product.php?lang=<?php echo $lang ?>&delete_name_prudoct=<?php echo $row['id_name_prudoct']; ?>"><i class="fa fa-trash" title="delete" style="font-size:16px;"></i></a>
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