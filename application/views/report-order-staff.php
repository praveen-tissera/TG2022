
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
              <h2>Report - Oder details by Staff member</h2>
              <?php echo form_open('user/ordersByStaff'); ?>
              <div class="form-group">
              <label for="productprice">Product Category</label>
              <select name="staff_id" class="form-control" required>
                <?php 
                  foreach ($staff_details as $key => $value) {
                    
                      echo "<option selected value='$value->staff_id'>$value->first_name  $value->last_name</option>";  
                    
                  }
                ?>
              </select>
              <input type="radio" name="dayrange" id="today" checked value="1"><label for="today">Today</label>
              <input type="radio" name="dayrange" id="yesterday" value="2"><label for="yesterday">Yesterday</label>
              <input type="radio" name="dayrange" id="7days" value="3"><label for="7days">7 Days</label>
              <input type="radio" name="dayrange" id="30days" value="4"><label for="30days">30 Days</label>

              <input type="submit" name="submit" class="btn btn-primary d-block" value="Show orders">
              
            </div>




              <?php echo form_close(); ?>
              <?php 
                if(isset($result_staff_oder_date) && $result_staff_oder_date=="No result found"){
                  echo '<div class="alert alert-danger" role="alert">';
                    echo "No result found";
                  echo '</div>';
                }else if(isset($result_staff_oder_date) ){

                 echo  "<table class='table'>
                    <thead class='thead-light'>
                      <tr>
                        <th >Order#</th>
                        <th >Order Placed Date</th>
                        <th >Order Placed Time</th>
                        <th >Order Status</th>
                        <th >Dispatch Time</th>
                       
                      </tr>
                    </thead>
                    <tbody>";
                 // print_r($result_staff_oder_date);
                  foreach ($result_staff_oder_date as $key => $value) {
                    echo "<tr>";
                      echo "<td>";
                        echo $value->order_id; 
                      echo "</td>";
                      echo "<td>";
                        echo $value->order_place_date; 
                      echo "</td>";
                      echo "<td>";
                        echo date('h:ia',strtotime($value->pickup_time)); 
                      echo "</td>";
                      echo "<td>";
                      echo $value->order_status; 
                      echo "</td>";
                      echo "<td>";
                        echo date('h:ia',strtotime($value->dispatch_time));
                     
                      echo "</td>";
                      echo "<td>";
                        
                      echo "</td>";
                    echo "</tr>";
                  }
  
                echo "</tbody>
              </table>";

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