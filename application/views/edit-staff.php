
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
              <h2>Edit Staff Details</h2>
              <?php echo form_open('user/editStaff'); ?>
              <div class="form-group">
              <label for="productprice">Select staff memeber to edit profile</label>
              <select name="staff_id" class="form-control" required>
                <?php 
                
                
                  foreach ($staff_details as $key => $value) {
                    
                      echo "<option selected value='$value->staff_id'>$value->first_name  $value->last_name</option>";  
                    
                  }
                ?>
              </select>
              
              <input type="submit" name="submit" class="btn btn-primary d-block" value="Edit user details">
              
            </div>




              <?php echo form_close(); ?>
              <?php 
             // print_r($staff_detail);
                if(isset($staff_detail) && $staff_detail=="No result found"){
                  echo '<div class="alert alert-danger" role="alert">';
                    echo "No result found";
                  echo '</div>';
                }else if(isset($staff_detail) ){

                  echo form_open('user/editStaff'); 
                
                 // print_r($result_staff_oder_date);
                  foreach ($staff_detail as $key => $value) {
                    echo "<div class='form-group'>";
                    echo "<input type='text' name='username' class='form-control' value='$value->username '>";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<select name='title' class='form-control' required>";
                   
                    $title = array(
                      'Mr' => 'Mr',
                      'Mrs' => 'Mrs',
                      'Miss' => 'Miss',
                      'Dr' => 'Dr',
                      
                    );
                    
                      foreach ($title as $key => $titlevalue) {
                          if($titlevalue == $value->title){
                            echo "<option selected value='$titlevalue'>$titlevalue</option>";    
                          }else{
                            echo "<option value='$titlevalue'>$titlevalue</option>";  
                          }
                          
                        
                      }
                    
                  echo "</select>";
                   
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<input type='text' name='firstname' class='form-control' value='$value->first_name '>";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<input type='text' name='lastname' class='form-control' value='$value->last_name '>";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<input type='password' name='password' class='form-control' value='$value->password '>";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<input type='text' class='form-control' value='$value->username '>";
                    echo "</div>";
                    echo '<button type="submit" class="btn btn-primary">Update</button>';

                   
                  }
  
                  echo form_close();
                } 
              ?>
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