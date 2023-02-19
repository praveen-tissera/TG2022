<!DOCTYPE HTML>
<html lang="en">
<head>
        <title>Mran Supermarket</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">

         <!-- Font -->
        <!-- Stylesheets -->      
        <link href="<?php echo  base_url('/assets/fonts/ionicons.css');?>" rel="stylesheet">
    
        <!-- Stylesheets -->
        <link href="<?php echo  base_url('/assets/plugin-frameworks/bootstrap.min.css');?>" rel="stylesheet">
        <link href="<?php echo  base_url('/assets/common/styles.css');?>" rel="stylesheet">
       

    
</head>

<body>
<?php $this->load->view('menu.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
        <section class="location-section section-padding location">
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="caption">
                            
                        </div>
                    </div>
     
                    <img id="img1" img src="<?php echo base_url('assets/images/super.jpg'); ?>" alt="TREAT TOO"></a>


                   <!-- <div class="col-sm-5">-->
                        <div class="location-wrapper">
                            <div class="section-title text-center">
                                
                                    <span class="sub-header"><h2><Center> Our location</center></h2></span>
                                    <div class="border"></div>
                                    <h5>The supermarket is situated in Colombo which is the main branch in the busiest and most easily can get into in any travelling method.
                                        It is in the center of the Colombo City.
                                        Other branches are situated in Wattala, Negombo , Kandy and Galle. 
                                        All branches consists of Carparks which a customer will need when doing glocery shopping.
                                        It is a fantastic place which comfortable to any shopper and has a user friendly environment to welcome you all.</h5>

                               
                               
                            </div> <!-- section-title -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
    </div>
</div>




<?php $this->load->view('footer') ?>
</body>
</html>