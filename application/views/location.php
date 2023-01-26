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
     
                    <img id="img1" img src="<?php echo base_url('assets/images/loc1.jpg'); ?>" alt="TREAT TOO"></a>


                    <div class="col-sm-5">
                        <div class="location-wrapper">
                            <div class="section-title text-center">
                                <span class="sub-header"><h2><Center> Our location</center></h2></span>
                                <div class="border"></div>
                                <h3>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident possimus reprehenderit sint harum in eum praesentium corrupti labore animi, porro quo, magnam tenetur accusantium fuga, rem blanditiis enim exercitationem soluta.</h3>

                                
                                
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