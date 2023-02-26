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
                //print_r($result_customer_orders);
                if(empty($result_customer_orders)){
                    echo '<div class="alert alert-danger">';
                    echo "No previous order found";
                    echo '</div>';
                }else{

 
                echo "<h3>Order Histroy</h3>";
                echo "<table class='table table-striped'>";
                   echo" <thead>
                        <tr>
                        <th scope='col'>Order Number</th>
                        <th scope='col'>Place date</th>
                        <th scope='col'>Place time</th>
                        <th scope='col'>Pick up time</th>
                        <th scope='col'>Dispatch time</th>
                        <th scope='col'>Total</th>

                        </tr>
                    </thead>";
                    echo "<tbody>";
                    foreach ($result_customer_orders as $key => $value) {
                        echo "<tr>";
                            echo "<th scope='row'>";
                            echo sprintf('%04d', $value->order_id);
                            echo "</th>";
                        echo "<td>";
                        echo $value->order_place_date;
                        echo "</td>";
                        echo "<td>";
                        echo $value->order_place_time;
                        echo "</td>";
                        echo "<td>";
                        echo $value->pickup_time;
                        echo "</td>";
                        echo "<td>";
                        echo $value->dispatch_time;
                        echo "</td>";
                        echo "<td>";
                        echo 'Rs. ' . $value->total;
                        echo "</td>";
                       
                       echo "</tr>";
                    }
                                              
                   echo  "</tbody>
                </table>";
            }
            ?>

        </div>
    </div>
</div>


<?php $this->load->view('footer') ?>
</body>
</html>