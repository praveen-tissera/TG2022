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
<div class="container pickup-product">
    <div class="row">
        <div class="col-12 ">

        

    

            <?php echo form_open('user/guestUserRegister');?>
            <div class="form-group">
            <select name="title" >
                <option value="Mr">Mr</option> 
                <option value="Ms">Ms</option>
                
            </select> <br>
            <input type="text" name="firstname" class="form-control" id = 'from-place' placeholder = "First Name" required><br>
            <input type="text" name="lastname"  class="form-control" id = 'from-place' placeholder = "Last Name"><br>
            <input type="email" name="email"  class="form-control" id = 'from-place' placeholder = "Email" required><br>
            <input type="tel" name="contactno"  class="form-control" id = 'from-place' placeholder = "Contact No" maxlength="10" required><br>
            <input type="submit" name="submit" value="Submit">
            
            <?php echo form_close(); 
            
            
            echo '</div>';
            
            ?>
        </div>
    </div>
</div>




<?php $this->load->view('footer') ?>
</body>
</html>