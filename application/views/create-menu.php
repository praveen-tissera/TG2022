<!DOCTYPE HTML>
<html lang="en">
<head>
        <title>TREAT TOO FAMIL RESTAURANT</title>
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
              <?php //print_r($all_categories); ?>

            <?php echo form_open_multipart('user/addNewMenu');?>
            <div class="form-group">
              <label for="productname">Product Name</label>
              <input type="text" name="product_name" class="form-control" id="productname" placeholder="Product name" required>
              
            </div>
            <div class="form-group">
              <label for="productdescription">Product Description</label>
              <textarea name="product_descripion" class="form-control" id="productdescription" required></textarea>
              
            </div>
            <div class="form-group">
            <?php echo "<input type='file' class='form-control' name='userfile' size='20' required />"; ?>
            </div>
            <div class="form-group">
              <label for="productprice">Product Category</label>
              <select name="product_category" class="form-control" required>
                <?php 
                  foreach ($all_categories as $key => $value) {
                    echo "<option value='$value->catagory_id'>$value->category_name</option>";
                  }
                ?>
              </select>
              
            </div>

                <label>Select Items</label><br>
                  <?php 
                    //print_r($all_items);
                    foreach ($all_items as $key => $value) {
                      //print_r($value);
                      echo '<div class="form-group form-check-inline">';
                      echo "<input type='checkbox' class='form-check-input' name='item_list[]' value ='$value->item_id' >";
                      echo "<label class='form-check-label'>$value->item_title</label>";
                      echo "</div>";
                    }
                    
                  ?>

            <div class="form-group">
              <label for="currency">Currency</label>
              <select name="currency" class="form-control">
                  <option value="LKR">LKR</option>
                  <option value="Dollers">Dollers</option>
                  <option value="Pounds">Pounds</option>
              </select>
              
            </div>
            <div class="form-group">
              <label for="productprice">Product Price</label>
              <input type="number" step=0.01 name="product_price" class="form-control" placeholder="Product price" id="productprice" required>
              
            </div>
            <div class="form-group">
              <label for="productprice">Product Availability</label>
              <select name="availability" class="form-control">
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
              </select>
              
            </div>

            <?php echo "<input type='submit' name='submit' value='Create new menu' class='btn btn-primary' /> ";?>
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