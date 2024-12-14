<?php
session_start();
if(!isset($_SESSION['id_users'])){
    header("Location: login.php");
}

$id_users=$_SESSION['id_users'];

include "./includes/connection_1.php";
include "./includes/connection_2.php";
include "./includes/header.php";

$count_id_num=0;
?>

<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 breadcrumb-bg1">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb-title text-center my-20">
          <h2 class="title text-dark text-capitalize"><?php echo $language["My account"] ?></h2>
        </div>
      </div>
      <div class="col-12">
        <ol
          class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center"
        >
          <li class="breadcrumb-item"><a href="index.php?lang=<?php echo $lang ?>"><?php echo $language["Home"] ?></a></li>
          <li class="breadcrumb-item active" aria-current="page">
            <?php echo $language["My account"] ?> 
          </li>
        </ol>
      </div>
    </div>
  </div>
</nav>
<!-- breadcrumb-section end -->

<!-- product tab start -->

<div class="my-account pb-40">
    <div class="container grid-wraper">
        <div class="row">
            <div class="col-12">
                <h3 class="title text-capitalize"><?php echo $language["My account"] ?></h3>
            </div>
            <?php include "includes/func-edit&update-acc.php"; ?>
            <!-- My Account Tab Menu Start -->
            <div class="col-lg-3 col-12 mb-30">
                <div class="myaccount-tab-menu nav" role="tablist">
                    <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i>
                        <?php echo $language["Orders"] ?></a>

                    <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i>
                        <?php echo $language["Address"] ?></a>

                    <a href="#account-info" data-toggle="tab" class="active"><i class="fa fa-user"></i><?php echo $language["Account Details"] ?></a>

                    <a href="Logout.php?lang=<?php echo $lang ?>"> <i class="fas fa-sign-out-alt"></i><?php echo $language["Logout"] ?></a>
                </div>
            </div>
            <!-- My Account Tab Menu End -->

            <!-- My Account Tab Content Start -->
            <div class="col-lg-9 col-12 mb-30">
                <div class="tab-content" id="myaccountContent">
                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="orders" role="tabpanel">
                        <div class="myaccount-content">
                            <h3><?php echo $language["Orders"] ?></h3>

                            <div class="myaccount-table table-responsive text-center">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th><?php echo $language["No"] ?></th>
                                            <th><?php echo $language["Name"] ?></th>
                                            <th><?php echo $language["Date"] ?></th>
                                            <th><?php echo $language["Status"] ?></th>
                                            <th><?php echo $language["Total"] ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $select="SELECT * FROM `orders_users` WHERE `id_user`='$id_users'";
                                            $query=mysqli_query($conn_store_admin , $select);
                                            while($row=mysqli_fetch_assoc($query)):
                                        ?>
                                            <tr>
                                                <td><?php  if($row['id_order_user']) echo $count_id_num+=1; ?></td>
                                                <td><?php echo $row['name_order_user']; ?></td>
                                                <td>
                                                    <?php
                                                        $date=date_create($row['date_order_user']);
                                                        echo date_format($date,"M d, Y");
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($row['status_order_user'] == 0){
                                                            $status_order_user = $language["Pending"];
                                                            echo $status_order_user;
                                                        }elseif($row['status_order_user'] == 1){
                                                            $status_order_user = $language["Approved"];
                                                            echo $status_order_user;
                                                        }elseif($row['status_order_user'] == 2){
                                                            $status_order_user = $language["Delivered"];
                                                            echo $status_order_user;
                                                        }elseif($row['status_order_user'] == 3){
                                                            $status_order_user = $language["On Hold"];
                                                            echo $status_order_user;
                                                        }elseif($row['status_order_user'] == 4){
                                                            $status_order_user = $language["Completed"];
                                                            echo $status_order_user;
                                                        }
                                                    ?>
                                                </td>
                                                <td><?php echo $row['total_order_user']; ?>JOD</td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="address-edit" role="tabpanel">
                        <div class="myaccount-content">
                            <h3><?php echo $language["Billing Address"] ?></h3>

                            <address>
                                <?php
                                   $sql_billing_info="SELECT * FROM `users` WHERE `id_users`='$id_users'";
                                   $query_billing_info=mysqli_query($conn_main_admin,$sql_billing_info);
                                   $row_billing_info=mysqli_fetch_assoc($query_billing_info); 
                                ?>
                                    <p><strong><?php echo htmlspecialchars($row_billing_info['first_name']); ?> <?php echo htmlspecialchars($row_billing_info['last_name']); ?></strong></p>
                                    <p><?php echo htmlspecialchars($row_billing_info['address']); ?></p>
                                    <p><?php echo $language["Mobile"] ?> : <?php echo htmlspecialchars($row_billing_info['phone_number']); ?></p>
                                <?php ?>
                            </address>

                            <a href="#" class="ht-btn black-btn d-inline-block edit-address-btn" data-toggle="modal" data-target="#address">
                                <i class="fa fa-edit"></i> <?php echo $language["Edit Address"] ?>  
                            </a>

                            <div class="modal fade" id="address" tabindex="-1" role="dialog" aria-labelledby="addressTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addressTitle"><?php echo $language["Edit Address"] ?></h5>
                                        </div>
                                        <form action="" method="POST">
                                            <?php
                                                $sql_billing="SELECT * FROM `users` WHERE `id_users`='$id_users'";
                                                $query_billing=mysqli_query($conn_main_admin,$sql_billing);
                                                $row_billing=mysqli_fetch_assoc($query_billing);
                                            ?>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="mb-3">
                                                        <input class="col-12" type="text" name="first_name" value="<?php echo htmlspecialchars($row_billing['first_name']); ?>" placeholder="<?php echo $language["First Name"] ?>" required="">
                                                    </div>
                                                    <div class="mb-3">
                                                        <input class="col-12" type="text" name="last_name" value="<?php echo htmlspecialchars($row_billing['last_name']); ?>" placeholder="<?php echo $language["Last Name"] ?>" required="">
                                                    </div>
                                                    <div class="mb-3">
                                                        <input class="col-12" type="text" name="address" value="<?php echo htmlspecialchars($row_billing['address']); ?>" placeholder="<?php echo $language["Address"] ?>" required="">
                                                    </div>
                                                    <div>
                                                        <input class="col-12" type="text" name="phone_number" value="<?php echo htmlspecialchars($row_billing['phone_number']); ?>" placeholder="<?php echo $language["Phone Number"] ?>" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn theme--btn1" data-dismiss="modal"><?php echo $language["Close"] ?></button>
                                                <button class="btn theme--btn-default" name="save_edit"><?php echo $language["Save changes"] ?></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade active show" id="account-info" role="tabpanel">
                        <div class="myaccount-content">
                            <h3><?php echo $language["Account Details"] ?></h3>

                            <div class="account-details-form">
                                <form action="" method="POST">
                                    <?php
                                        $sql_Details="SELECT * FROM `users` WHERE `id_users`='$id_users'";
                                        $query_Details=mysqli_query($conn_main_admin,$sql_Details);
                                        $row_Details=mysqli_fetch_assoc($query_Details);
                                    ?>
                                        <div class="row">
                                            <div class="col-lg-6 col-12 mb-30">
                                                <input id="first-name" placeholder="First Name" name="first_name" value="<?php echo htmlspecialchars($row_Details['first_name']); ?>" type="text">
                                                <div class="text-danger mt-1"><?php echo $language[$errors['first_name']]??"" ?></div>
                                            </div>

                                            <div class="col-lg-6 col-12 mb-30">
                                                <input id="last-name" placeholder="Last Name" name="last_name" value="<?php echo htmlspecialchars($row_Details['last_name']); ?>" type="text">
                                                <div class="text-danger mt-1"><?php echo $language[$errors['last_name']]??"" ?></div>
                                            </div>

                                            <div class="col-12 mb-30">
                                                <input id="display-name" placeholder="Display Name" name="display_name" value="<?php echo htmlspecialchars($row_Details['display_name']); ?>" type="text">
                                                <div class="text-danger mt-1"><?php echo $language[$errors['display_name']]??"" ?></div>
                                            </div>
                                        
                                            <div class="col-12 mb-30">
                                                <input id="email" placeholder="Email" name="email" value="<?php echo htmlspecialchars($row_Details['email']); ?>" type="email">
                                                <div class="text-danger mt-1"><?php echo $language[$errors['email']]??"" ?></div>
                                            </div>
                                            
                                            <div class="col-12 mb-40">
                                                <button class="btn theme-btn--dark1 btn--md" name="save_Details"><?php echo $language["Save Details"] ?></button>
                                            </div>
                                        </div>
                                    </form>
                                    <form action="" method="POST">
                                        <?php
                                            $sql_change="SELECT * FROM `users` WHERE `id_users`='$id_users'";
                                            $query_change=mysqli_query($conn_main_admin,$sql_change);
                                            $row_change=mysqli_fetch_assoc($query_change);
                                        ?>
                                            <div class="row">
                                                <div class="col-12 mb-30">
                                                    <h4><?php echo $language["Password change"] ?></h4>
                                                </div>

                                                <div class="col-12 mb-30">
                                                    <input id="current-pwd" class="bg-success text-white" value="<?php echo htmlspecialchars($row_change['password']); ?>" type="text" disabled>
                                                </div>

                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="new-pwd" placeholder="New Password" name="password" value="<?php echo htmlspecialchars($password); ?>" type="text">
                                                    <div class="text-danger mt-1"><?php echo $language[$errors['password']]??"" ?></div>
                                                </div>

                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="confirm-pwd" placeholder="Confirm Password" name="cpassword" value="<?php echo htmlspecialchars($cpassword); ?>" type="text">
                                                    <div class="text-danger mt-1"><?php echo $language[$errors['cpassword']]??"" ?></div>
                                                </div>

                                                <div class="col-12">
                                                    <button class="btn theme-btn--dark1 btn--md" name="save_change"><?php echo $language["Save changes"] ?></button>
                                                </div>

                                            </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->
                </div>
            </div>
            <!-- My Account Tab Content End -->
        </div>
    </div>
</div>
<!-- product tab end -->

<?php
include "./includes/footer.php";
?>