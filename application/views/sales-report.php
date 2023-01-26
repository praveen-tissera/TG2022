
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
              <h2>Sales Report ..</h2>
              <?php echo form_open('user/totalSales'); ?>
              <div class="form-group">
              
            
              <input type="radio" name="dayrange" id="today" checked value="1"><label for="today">Today</label>
              <input type="radio" name="dayrange" id="yesterday" value="2"><label for="yesterday">Yesterday</label>
              <input type="radio" name="dayrange" id="7days" value="3"><label for="7days">7 Days</label>
              <input type="radio" name="dayrange" id="30days" value="4"><label for="30days">30 Days</label>

              <input type="submit" name="submit" class="btn btn-primary d-block" value="Show Sales">
              
            </div>




              <?php echo form_close(); ?>
              <?php 
                if(isset($sales_details) && $sales_details=="No result found"){
                  echo '<div class="alert alert-danger" role="alert">';
                    echo "No result found";
                  echo '</div>';
                }else if(isset($sales_details) ){

                 echo  "<table class='table'>
                    <thead class='thead-light'>
                      <tr>
                        <th >Order#</th>
                        <th >Order Placed Date</th>
                        <th >Order Status</th>
                        <th >Order Value</th>
                       
                      </tr>
                    </thead>
                    <tbody>";
                  // print_r($sales_details);
                   $subtotal= 0;
                  foreach ($sales_details as $key => $value) {
                    $subtotal=$subtotal+$value->total;
                    echo "<tr>";
                      echo "<td>";
                        echo $value->order_id; 
                      echo "</td>";
                      echo "<td>";
                        echo $value->order_place_date; 
                      echo "</td>";
                      echo "<td>";
                      echo $value->order_status; 
                      echo "</td>";
                      echo "<td>";
                       
                        echo 'LKR '.  number_format($value->total,2);
                        echo "</td>";
                     
                        
                     
                    echo "</tr>";
                  }
                  echo "<tr>";
                  echo  "<td colspan='3'>";
                      echo "Total Sales";
                      echo "</td>";
                    echo  "<td>";
                     echo  'LKR ' . number_format($subtotal,2);
                    echo  "</td>";
                   echo  "</tr>";
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