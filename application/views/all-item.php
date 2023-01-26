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
      echo "<h3 class='alert alert-danger'>". $error_message_display ."</h3>";
  }
  if(isset($success_message_display)){
      echo '<div class="alert alert-success" role="alert">';
      echo $success_message_display;
      echo '</div>';
  }
    //print_r($this->session->userdata());
    //print_r($all_products);
    echo "<table class='table table-striped'>";
    echo" <thead>
         <tr>
         
         <th scope='col'>Item Name</th>
         <th>Availability</th>";
          if ($this->session->userdata()['staffuser']->staff_role == 'manager') {
            echo "<th scope='col'>Action</th>";
          }
         echo "</tr>
     </thead>";
     echo "<tbody>";
     foreach ($all_item as $key => $value) {
      //print_r($value);
         echo "<tr>";
         echo "<td>";
         echo $value->item_title;
         echo "</td>";
         echo "<td>";
         if($value->availability == 'no'){
           echo "<span class='badge badge-danger'>No</span>";
         }else{
          echo "<span class='badge badge-success'>Yes</span>";
         }
         
         echo "</td>";
         if ($this->session->userdata()['staffuser']->staff_role == 'manager') {
          echo "<td>";
              echo "<a href='". base_url('index.php/user/showSingleItem/'.$value->item_id) . "'> Edit </a>";
          echo "</td>";
        }
        
        echo "</tr>";
     }
        
         
    echo  "</tbody>
 </table>";
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