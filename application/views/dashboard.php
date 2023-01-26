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
            <h1>New Orders</h1>
                  <?php //print_r($this->session->userdata()) ?>
                  
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Order#</th>
                        <th>Client name</th>
                        <th>Order place date</th>
                        <th>Order place time</th>
                        <th >Pick up time</th>
                        <th>Order Status</th>
                        <th >Oder Handled By</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    //print_r($result_new_orders);
                      foreach ($result_new_orders as $key => $value) {
                        echo "<tr>";
                        echo "<th scope='row'>";
                        echo "<a href='". base_url('index.php/user/orderDetails/' . $value->order_id) . "'>" .  sprintf('%04d', $value->order_id) . "</a>";
                        
                        echo "</th>";
                        echo "<td>";
                          echo $value->user_name;
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
                          echo $value->order_status;
                        echo "</td>";
                        echo "<td>";
                          if($value->staff_id > 0){
                            echo "<span class='badge badge-pill badge-info'>". $value->staff_details[0]->first_name . "</span>";
                            
                          }else{
                            echo "<span class='badge badge-pill badge-dark'>Not Yet</span>";
                          }
                          
                        echo "</td>";

                      
                        echo "</tr>";
                      }
                    
                    
                    ?>
                      
                      
                    </tbody>
                  </table>
              

            </div>
            <div class="col-12">
           
            <?php //print_r($this->session->userdata()) ?>
            <?php
            if(isset($this->session->userdata['staffuser']) && $this->session->userdata()['staffuser']->staff_role == 'staff'){
              if($result_my_orders == 'No records found'){
                echo " <h1>Your Orders</h1>";
                echo "No cecords found";
              }else{
                echo " <h1>Your Orders</h1>";
                echo "<table class='table'>
                <thead>
                  <tr>
                    <th>Order#</th>
                    <th>Client name</th>
                    <th>Order place date</th>
                    <th>Order place time</th>
                    <th >Pick up time</th>
                    <th>Order Status</th>
                    
                  </tr>
                </thead>
                <tbody>";
                
                //print_r($result_my_orders);
                  foreach ($result_my_orders as $key => $value) {
                    echo "<tr>";
                    echo "<th scope='row'>";
                    echo "<a href='". base_url('index.php/user/orderDetails/' . $value->order_id) . "'>" .  sprintf('%04d', $value->order_id) . "</a>";
                     
                    echo "</th>";
                    echo "<td>";
                      echo $value->user_name;
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
                      echo $value->order_status;
                    echo "</td>";
                    
  
                   
                    echo "</tr>";
                  }
                  echo "</tbody>
                  </table>";
              }
              
             
            } 
                  
            
            
              
              ?>
                
                <?php
            if(isset($this->session->userdata['staffuser']) && $this->session->userdata()['staffuser']->staff_role == 'manager'){
              if($result_all_processing_orders == 'No records found'){
                echo " <h1>All Staff Orders</h1>";
                echo "No Record Found!";
              }else{

                echo " <h1>All Staff Orders</h1>";
                echo "<table class='table'>
                <thead>
                  <tr>
                    <th>Order#</th>
                    <th>Client name</th>
                    <th>Order place date</th>
                    <th>Order place time</th>
                    <th >Pick up time</th>
                    <th>Order Status</th>
                    <th>Order Taken By</th>
  
                    
                  </tr>
                </thead>
                <tbody>";
                
                //print_r($result_all_processing_orders);
                  foreach ($result_all_processing_orders as $key => $value) {
                    echo "<tr>";
                    echo "<th scope='row'>";
                    echo "<a href='". base_url('index.php/user/orderDetails/' . $value->order_id) . "'>" .  sprintf('%04d', $value->order_id) . "</a>";
                     
                    echo "</th>";
                    echo "<td>";
                      echo $value->user_name;
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
                      echo $value->order_status;
                    echo "</td>";
                    echo "<td>";
                      echo $value->staff_details[0]->first_name;
                    echo "</td>";
                    
  
                   
                    echo "</tr>";
                  }
                  echo "</tbody>
                  </table>";

              }
              
              
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