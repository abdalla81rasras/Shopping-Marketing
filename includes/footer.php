<!-- footer strat -->
<footer class="bg-lighten2 theme1 position-relative">
    <!-- footer bottom start -->
    <div class="footer-bottom pt-70 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-4 mb-30">
                    <div class="footer-widget">
                        <div class="footer-logo mb-30">
                            <a href="index.php?lang=<?php echo $lang ?>">
                                <img src="Upload_main_admin/<?php echo $row_header['img_logo'] ?>" alt="footer logo">
                            </a>
                        </div>
                        <?php 
                            $sql_footer="SELECT * FROM `footer`";
                            $query_footer=mysqli_query($conn_main_admin,$sql_footer);
                            if($row_footer=mysqli_fetch_assoc($query_footer)):
                        ?>
                        <p class="text mb-35"><?php echo $language[$row_footer['slogin_footer']]??"" ?>.</p>
                        <div class="social-network">
                            <h2 class="title text mb-20 text-capitalize"><?php echo $language['fllows social'] ?>:</h2>
                            <ul class="d-flex">
                                <li><a href="<?php echo $row_footer['facebook_footer'] ?>" target="_blank"><span
                                            class="ion-social-facebook"></span></a></li>
                                <li><a href="<?php echo $row_footer['insta_footer'] ?>" target="_blank"><span
                                            class="ion-social-instagram-outline"></span></a></li>            
                                <li><a href="<?php echo $row_footer['whats_footer'] ?>" target="_blank"><span
                                            class="ion-social-whatsapp"></span></a></li>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-2 mb-30">
                    <div class="footer-widget">
                        <div class="section-title mb-20">
                            <h2 class="title text-dark text-capitalize"><?php echo $language['My Account'] ?></h2>
                        </div>
                        <address class="mb-0">
                            <span><?php echo $language['Saturday - Thurs: 9AM - 6PM'] ?></span>
                            <span><?php echo $language['Sat: 9AM-6PM'] ?></span>
                            <span><?php echo $language['Friday Closed'] ?></span>
                            <span><?php echo $language['We Work All The Holidays'] ?></span>
                        </address>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-2 mb-30">
                    <div class="footer-widget">
                        <div class="section-title mb-20">
                            <h2 class="title text-dark text-capitalize"><?php echo $language['Opening Time'] ?></h2>
                        </div>
                        <!-- footer-menu start -->
                        <ul class="footer-menu">
                            <li><a href="#"><?php echo $language['Delivery'] ?></a></li>
                            <li><a href="about-us.php?lang=<?php echo $lang ?>"><?php echo $language['About Us'] ?></a></li>
                            <li><a href="#"><?php echo $language['Secure Payment'] ?></a></li>
                            <li><a href="contact.php?lang=<?php echo $lang ?>"><?php echo $language['Contact Us'] ?></a></li>
                            <li><a href="#"><?php echo $language['Sitemap'] ?></a></li>
                            <li><a href="./stores.php?lang=<?php echo $lang ?>"><?php echo $language['Stores'] ?></a></li>
                        </ul>
                        <!-- footer-menu end -->
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-2 mb-30">
                    <div class="footer-widget">
                        <div class="section-title mb-20">
                            <h2 class="title text-dark text-capitalize"><?php echo $language['Information'] ?></h2>
                        </div>
                        <!-- footer-menu start -->
                        <ul class="footer-menu">
                            <li><a href="#"><?php echo $language['Legal Notice'] ?></a></li>
                            <li><a href="#"><?php echo $language['Prices Drop'] ?></a></li>

                            <li><a href="#"><?php echo $language['New Products'] ?></a></li>

                            <li><a href="#"><?php echo $language['Best Sales'] ?></a></li>

                            <li><a href="login.php?lang=<?php echo $lang ?>"><?php echo $language['Login'] ?></a></li>

                            <li><a href="myaccount.php?lang=<?php echo $lang ?>"><?php echo $language['My account'] ?></a></li>
                        </ul>
                        <!-- footer-menu end -->
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-2 mb-30">
                    <div class="footer-widget">
                        <div class="section-title mb-20">
                            <h2 class="title text-dark text-capitalize"><?php echo $language['About Us'] ?></h2>
                        </div>
                        <!-- footer-menu start -->
                        <ul class="footer-menu">
                            <li><a href="./about-us.php?lang=<?php echo $lang ?>"><?php echo $language['Security'] ?></a></li>
                            <li><a href="./Faq.php?lang=<?php echo $lang ?>"><?php echo $language['FAQ'] ?></a></li>
                            <li><a href="./Faq.php?lang=<?php echo $lang ?>"><?php echo $language['Need Help ?'] ?></a></li>
                        </ul>
                        <!-- footer-menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer bottom end -->
    <!-- coppy-right start -->
    <div class="coppy-right">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="border-top py-20">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 order-last order-md-first">
                                <div class="text-center">
                                    <p class="mb-3 mb-md-0"><?php echo $language['copyrghit']?>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- coppy-right end -->
</footer>
<!-- footer end -->

<!-- search-box and overlay start -->
<div class="overlay">
    <div class="scale"></div>
    <form class="search-box">
        <input type="text" name="search" placeholder="<?php echo $language['Search Products'] ?> ... " />
        <button type="submit" id="btn_search"><img src="./assets/Icons and Images/search filter icon.png" alt=""></button>
        <button id="close" type="submit"><i class="ion-ios-search-strong"></i></button>
        <ul class="mt-3 show_search" id="search_likes">
            <li><a href="javascript:void()"><?php echo $language['Products'] ?></a></li>
            <li><a href="javascript:void()"><?php echo $language['Shops'] ?></a></li>
            <li><a href="javascript:void()"><?php echo $language['All (this is the defaulter one)'] ?></a></li>
        </ul>
    </form>
    <button class="close"><i class="ion-android-close"></i></button>
</div>
<!-- search-box and overlay end -->

    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins/plugins.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="./assets/js/secbut.js"></script>
    <script src="./assets/js/JQ-btns.js"></script>
    <script src="./assets/js/zoomImg.js"></script>
    <script src="./assets/js/Reviw.js"></script>
    <script src="./assets/js/showpass-jq.js"></script>
    <script src="./assets/js/jquery.rateyo.min.js"></script>
    <script src="./assets/js/rating.js"></script>   
    <script src="./assets/js/qty-price.js"></script>
</body>

</html>