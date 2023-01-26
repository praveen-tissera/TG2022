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
<?php  echo form_open('user/addToCart'); ?>
    <div class="row">
       
            <div class="col-6">
                <?php 
                    echo '<div class="checkbox pull-left">
                        <label>';
                        $data = array(
                            'name'          => 'pickup',
                            'value'         => 'picknow',
                            'checked'       => FALSE,
                            
                        );
                        
                        echo form_radio($data);
                        echo '<span>Pickup now</span></label>';
                    echo '</div>';
                ?>
                ( CURRENT TIME IN SL 30/01/2019 04:10 PM ) *The order can be collected within 30 min from the order confirmation</div>
            <div>
            
        </div>
        <div class="col-6">
                        <?php 
                         $data = array(
                            'type' => 'hidden',
                            'name' => 'product_id',
                            'class' => 'form-control',
                            'value' => $productid
                            );
                            echo form_input($data);
                            $data = array(
                                'type' => 'hidden',
                                'name' => 'quantity',
                                'class' => 'form-control',
                                'value' => $quantity
                                );
                                echo form_input($data);

                                        echo '<div class="checkbox">
                                        <label>';
                                        $data = array(
                                            'name'          => 'pickup',
                                            'value'         => 'picklater',
                                            'checked'       => TRUE,
                                            
                                        );

                                        echo form_radio($data);
                                        echo '<span>Pickup later</span></label>';
                                        echo '</div>';
                        ?>
                        
                        <?php 
                        echo date('l jS \of F Y');
                        $options = array(
                           
                            '08:30:00'        => '08:30 AM',
                            '08:45:00'        => '08:45 AM',
                            '09:00:00'        => '09:00 AM',
                            '09:15:00'        => '09:15 AM',
                            '09:30:00'         => '09:30 AM',
                            '09:45:00'         => '09:45 AM',
                            '10:00:00'         => '10:00 AM',
                            '10:15:00'       => '10:15 AM',
                            '10:30:00'      => '10:30 AM',
                            '10:45:00'     => '10:45 AM',
                            '11:00:00'     => '11:00 AM',
                            '11:15:00'     => '11:15 AM',
                            '11:30:00'        => '11:30 AM',
                            '11:45:00'     => '11:45 AM',
                            '12:00:00'      => '12:00 PM',
                            '12:15:00'   => '12:15 PM',
                            '12:30:00'    => '12:30 PM',
                            '12:45:00'     => '12:45 PM',
                            '13:00:00'      => '1:00 PM',
                            /*
                            '13:15:00'     => '05:30 PM',
                            '13:30:00'     => '05:30 PM',
                            '13:45:00'      => '05:30 PM',
                            '14:00:00'     => '05:30 PM',
                            '14:15:00'     => '05:30 PM',
                            '14:30:00'     => '05:30 PM',
                            '14:45:00'    => '05:30 PM',
                            '15:00:00'     => '05:30 PM',
                            '15:15:00'    => '05:30 PM',
                            '15:30:00'    => '05:30 PM',
                            '15:45:00'   => '05:30 PM',
                            '16:15:00'   => '05:30 PM',
                            '16:30:00'   => '05:30 PM',
                            '16:45:00'         => '04:45 PM',
                            '17:00:00'         => '05:00 PM',
                            '17:15:00'         => '05:15 PM',
                            '17:30:00'        => '05:30 PM',
*/













                    );
                  
                    $attribute = 'class="form-control"';
                    echo form_dropdown('time', $options, '16:45:00',$attribute);
                   
                   
                        ?>

        </div>

        <div class="col-12 mt-4">
        <?php
        echo form_submit('submit', 'Continue', "class='btn btn-primary btn-block'");    
        ?>
        </div>
        </div>
        <?php 
            echo form_close();   
       ?>
    
    </div>
</div>




<?php $this->load->view('footer') ?>
</body>
</html>