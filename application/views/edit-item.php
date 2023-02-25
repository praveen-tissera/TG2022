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
         <div class="col-12">
         <?php 
              if (isset($error_message_display)) {
                
                echo '<div class="alert alert-danger" role="alert">';
                echo $error_message_display;
                echo '</div>';
            }
            if(isset($success_message_display)){
                echo '<div class="alert alert-success" role="alert">';
                echo $success_message_display;
                echo '</div>';
            }
              
              ?>
         </div>
            <div class="col-12">
              <?php //print_r($product_details); ?>
         
              

            <?php echo form_open('user/updateItem');?>
            <input type="hidden" value="<?php echo $item[0]->item_id ?>" name="item_id">
            <div class="form-group">
              <label for="productname">Category Name</label>
              <input value="<?php echo $item[0]->item_title; ?>"  type="text" name="item_title" class="form-control"  placeholder="item name" required>
              
            </div>

   
           

            <div class="form-group">
              <label>Item Availability</label>
              <select name="availability" class="form-control">
              <?php
                if($item[0]->availability == 'yes'){
                  echo "<option value='yes'>Yes</option>
                  <option value='no'>No</option>";
                }else{
                  echo "<option value='no'>No</option>
                  <option value='yes'>Yes</option>";
                }
              
              ?>
                  
              </select>
              
            </div>

            <?php echo "<input type='submit' name='submit' value='Update item' class='btn btn-primary' /> ";?>
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