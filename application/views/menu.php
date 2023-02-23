<header>
        <div class="container">

                <a class="logo" href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>/assets/images/fff.jpg" height="50" width="50"alt="Mran Supermarket"></a>
                


                <div class="right-area">
                        <h6><a class="plr-20 color-white btn-fill-primary" href="#">ORDER: +611 335 335</a></h6>
                </div><!-- right-area -->

                <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

                <ul class="main-menu font-mountainsre" id="main-menu">
                        
                        
                        <li><a href="<?php echo base_url('index.php/user/productList') ?>">PRODUCTS</a></li>
                        <li><a href="<?php echo base_url('/index.php/user/selectUser/') ?>">ONLINE ORDER</a></li>
                        <li><a href="<?php echo base_url('/index.php/user/myCart') ?>">MY CART</a></li>
                        <li><a href="<?php echo base_url('index.php/user/location') ?>">LOCATION</a></li>
                        <li><a href="<?php echo base_url('index.php/user/aboutus') ?>">ABOUT US</a></li>
                        <li><a href="<?php echo base_url('index.php/user/careers') ?>">CAREERS</a></li>

                        <li>
                            <div class="dropdown pl-3">
                                <a class="dropdown-toggle" href="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        LOGIN
        </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <?php if (isset($this->session->userdata()['userid'])) {
                                              echo "<a class='dropdown-item' href='". base_url('index.php/user/customerProfile')."'>My Profile</a>";
                                              echo "<a class='dropdown-item' href='". base_url('index.php/user/customerLogOut')."'>Log Out</a>";
                                        } else{
                                               echo "<a class='dropdown-item' href='".base_url('index.php/user/login')."'>Customer Login</a>";
                                        }?>
                                        <a class="dropdown-item" href="<?php echo  base_url('index.php/user/mgtLogin');?>">Manager Login</a>
                                        <a class="dropdown-item" href="<?php echo  base_url('index.php/user/stafflogin');?>">Staff Login</a>
                                        <a class="dropdown-item" href="<?php echo  base_url('index.php/user/register');?>">Register</a>
                                </div>
                            </div>
                        </li>
                </ul>

                <div class="clearfix"></div>
        </div><!-- container -->
</header>