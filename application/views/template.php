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
            Login page
        </div>
    </div>
</div>




<?php $this->load->view('footer') ?>
</body>
</html>