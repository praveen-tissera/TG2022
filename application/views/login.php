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
 .location{
        margin-top: 150px;
        margin-bottom: 100px;
      } 
</head>

<body>
<?php $this->load->view('menu.php'); ?>
<div class="container login">
    <div class="row">
        <div class="col-6 mx-auto">
            
            <?php 

            if (isset($error_message_display)) {
                echo "<h3 class='alert alert-danger'>". $error_message_display ."</h3>";
            }
            if(isset($success_message_display)){
                echo '<div class="alert alert-success" role="alert">';
                echo $success_message_display;
                echo '</div>';
            }



                echo form_open('user/userLogin');
                echo '<div class="form-group">';
                echo '<label>Username</label>'; 
                $data = array(
                    'type' => 'text',
                    'name' => 'username',
                    'class' => 'form-control',
                    'id' => 'from-place',
                    'placeholder' => 'Email address',
                    'autofocus' => 'autofocus',
                    'required'=> 'required'
                    );
                    echo form_input($data);
                echo '</div>';
                echo '<div class="form-group">';
                    echo '<label >Password</label>';
                    $data = array(
                        'type' => 'password',
                        'name' => 'password',
                        'class' => 'form-control',
                        'id' => 'from-place',
                        'placeholder' => 'Password',
                        'required'=> 'required'
                        );
                        echo form_input($data);
                echo '</div>';
                    echo form_submit('submit', 'LOG IN', "class='btn btn-primary btn-block'");
                echo form_close();
            
            ?>

        
        </div>
    </div>
</div>




<?php $this->load->view('footer') ?>
</body>
</html>