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
        <link href="<?php echo  base_url('/assets/fontawesome/css/all.min.css');?>" rel="stylesheet">
    
        <!-- Stylesheets -->
        <link href="<?php echo  base_url('/assets/plugin-frameworks/bootstrap.min.css');?>" rel="stylesheet">
        <link href="<?php echo  base_url('/assets/common/sb-admin-2.css');?>" rel="stylesheet">
 
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- load left mnue -->
    <?php $this->load->view('staff-left-menu'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

       <?php $this->load->view('staff-top-menu'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

         <div class="row">
            <div class="col-8">
              <?php 
              
              if (isset($error_message_display)) {
                echo "<h3 class='alert alert-danger'>". $error_message_display ."</h3>";
            }
            if(isset($success_message_display)){
                echo '<div class="alert alert-success" role="alert">';
                echo $success_message_display;
                echo '</div>';
            }
              
              ?>
              

            <?php echo form_open_multipart('user/addNewPromotion');?>
            <div class="form-group">
              <label for="productname">Promotion Title</label>
              <input type="text" name="promotion_name" class="form-control" id="productname" placeholder="Promotion title" required>
              
            </div>
            
            <div class="form-group">
            <?php echo "<input type='file' class='form-control' name='userfile' size='20' required />"; ?>
            </div>
        

            <?php echo "<input type='submit' name='submit' value='Create Promotion' class='btn btn-primary' /> ";?>
            <?php echo form_close();?>

            </div>

           
         </div>

         

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    <?php $this->load->view('staff-footer'); ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->



  <?php $this->load->view('staff-script'); ?>

</body>
</html>