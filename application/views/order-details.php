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
    <!-- load left menu -->
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
          <?php if($order_details[0]->staff_id == 0){ ?>
          <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">This order has not been handle staff yet!</h4>
            <hr>
            <p class="mb-0">Would you like to accept this order? <a href="<?php echo base_url('index.php/user/orderAllocation/'.$order_details[0]->order_id); ?>">Accept</a></p>
          </div>
          <?php }else{ ?>
            <div class="alert alert-success" role="alert">
            <h4 class="alert-heading"> <?php echo $staff_detail[0]->first_name ?> is working on this order!</h4>
            <?php 
            /**logged staff and his allocated order */
              if($order_details[0]->staff_id == $this->session->userdata()['staffuser']->staff_id && $this->session->userdata()['staffuser']->staff_role == 'staff'){
                if($order_details[0]->order_status == 'new'){
                  echo  "<h5 class='alert-heading'> Would you like to change the order status to \"Processing\"? <a href=". base_url('index.php/user/updateOrderStatus/processing/'.$order_details[0]->order_id) .">Accept</a>  </h5>";
                }else if($order_details[0]->order_status == 'processing'){
                  echo  "<h5 class='alert-heading'> Order is under processing, Would you like to change the order status to \"Completed\"? <a href=". base_url('index.php/user/updateOrderStatus/completed/'.$order_details[0]->order_id) .">Accept</a>  </h5>";
                }else if($order_details[0]->order_status == 'completed'){
                  echo  "<h5 class='alert-heading'> Order is Completed, Would you like to change the order status to \"Dispatch\"? <a href=". base_url('index.php/user/updateOrderStatus/dispatch/'.$order_details[0]->order_id) .">Accept</a>  </h5>";
                }
                
                
              }else if($this->session->userdata()['staffuser']->staff_role == 'manager'){
              }
            ?>
            
          </div>
          <?php }?>

            <?php 
              //print_r($order_details);
              //print_r($this->session->userdata);
              //print_r($staff_detail);
              echo "<table class='table table-bordered table-responsive'>";
              echo "<thead class='thead-dark'>";
              echo "<tr>
                <th scope='col'>Order#</th>
                <th scope='col'>Customer Name</th>
                <th scope='col'>Contact No</th>
                <th scope='col'>Email</th>
                <th scope='col'>Order Placed Date</th>
                <th scope='col'>Order Placed Time</th>
                <th scope='col'>Pick Up Time</th>
                <th scope='col'>Dispatch Time</th>
                <th scope='col'>Order Status</th>
                <th scope='col'>Order Total</th>
                
                <th scope='col'>Client Type</th>
              </tr>";
              echo "</thead>
                    <tbody>";
            foreach ($order_details as $key => $value) {
              echo "<tr>";
              echo "<th scope='row'>";
                echo sprintf('%04d', $value->order_id);
              echo "</th>";
              echo "<td>";
              echo $value->title . ':&nbsp;' . $value->first_name . '&nbsp;' . $value->last_name;
              echo "</td>";
              echo "<td>";
              echo $value->phone_number;
              echo "</td>";
              echo "<td>";
              echo $value->email;
              echo "</td>";
              echo "<td>";
              echo $value->order_place_date;
              echo "</td>";
              echo "<td>";
              echo date('h:ia',strtotime($value->order_place_time));
              echo "</td>";
              echo "<td>";
              echo date('h:ia',strtotime($value->pickup_time));
              echo "</td>";
              echo "<td>";
              echo date('h:ia',strtotime($value->dispatch_time));
              echo "</td>";
              echo "<td>";
              echo $value->order_status;
              echo "</td>";
              echo "<td>";
              echo 'LKR' . number_format($value->total,2);
              echo "</td>";
              echo "<td>";
              echo $value->user_type;
              echo "</td>";
              
            echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
              
              //print_r($order_prodects_details);
              echo "<table class='table table-striped '>";
              echo "<thead class='thead-dark'>";
              echo "<tr>
                <th scope='col'>Menu Name</th>
                <th scope='col'>Quantity</th>
                <th scope='col'>Unit Price</th>
                
              </tr>";
              echo "</thead>
                    <tbody>";
              foreach ($order_prodects_details as $key => $value) {
                
                //print_r($value->product_details);
                echo "<tr>";
                  echo "<td>";
                  echo $value->product_details->product_title;
                  echo "</td>";
                  echo "<td>";
                  echo $value->quantity;
                  echo "</td>";
                  echo "<td>";
                  echo $value->product_details->currency . number_format($value->product_details->price,2);
                  
                  echo "</td>";
                echo "</tr>";
              }
              echo "</tbody>";
              echo "</table>";
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