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
        <div class="col-12">
       
            <?php 
         //$this->session->unset_userdata('cart')
          //print_r($this->session->userdata()['cart'])
          
          if(isset($success_message_display)){
            
            echo '<div class="alert alert-success" role="alert">';
            echo $success_message_display;
            echo '</div>';
            }
            if(isset($this->session->userdata()['cart'])){
                echo "<table class='table table-hover'>";
                echo "<thead>
                    <tr style =  'background-color:grey;'>
                    <th scope='col' >ID</th>
                    <th scope='col' >Name</th>
                    <th scope='col'>Quantity</th>
                    <th scope='col'>Order request time</th>
                  
                    <th scope='col'>Item Price</th>
                    <th scope='col' style='text-align:right;'>Total</th>
                    <th scope='col' style='text-align:right;'>Action</th>
                    </tr>
                </thead>";
                echo "<tbody>";
                $cart_total = 0;
                foreach ($this->session->userdata()['cart'] as $key => $value) {
                   //print_r($this->session->userdata()['cart']);
                  $cart_total = $cart_total + $value['qty_total_price'];
                    echo "<tr>";
                        echo "<th  scope='row'>" . $value['product_id'] ."</th>";
                        echo "<td>". $value['product_title']. "</td>";
                        echo "<td>". $value['quantity']. "</td>";
                        echo "<td>". $value['time'] . "</td>";
                        echo "<td>". $value['currency'] .  $value['price']. "</td>";
                        echo "<td style='text-align:right;'>".$value['currency'].  number_format($value['qty_total_price'],2) . "</td>";
                        echo "<td style='text-align:right;'>";
                           
                           
                            echo "<a class=\"btn btn-danger\" href='".base_url("/index.php/user/deleteCartProduct/{$value['product_id']}") ."'> Delete</a>";
                            
                        echo "</td>";
                        echo "</tr>";
                }
                echo "<tr style = 'background-color:black; color:white;'>";
                    echo "<td colspan='5'>Sub Total</td>";
                    echo "<td colspan='1' style='text-align:right;'>";
                        echo 'LKR '.  number_format($cart_total,2);
                    echo "</td>";
                    echo "<td></td>";
                echo "</tr>";
                echo "</tboday>";
        echo "</table>";
            }else{
                echo "No Product found";
            }
                
                
            ?>
            <?php 
            
                if (!empty($this->session->userdata()['cart'])) {
                   echo "<a class=\"btn btn-success\" href=\"". base_url('index.php/user/orderProceed') ."\">Pay Now</a>";
                }
            ?>
            
  
        </div>
    </div>
</div>




<?php $this->load->view('footer') ?>
</body>
</html>