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
<div class="container mt-4 pt-4">
    <div class="row mt-4 pt-4">
        <div class="col-12 mt-4 pt-4">
        <?php 

if (isset($error_message_display)) {
    echo "<h3 class='alert alert-danger'>". $error_message_display ."</h3>";
}
if(isset($success_message_display)){
    echo '<div class="alert alert-success">';
    echo $success_message_display;
    echo '</div>';
}



    echo form_open('user/userRegister');
    echo '<div class="form-group">';
    echo '<label>Title</label>'; 
    $data = array(
      
        'Mr'  => 'Mr',
        'Mrs'    => 'Mrs',
        'Miss'   => 'Miss',
        'placeholder' => 'Mr',
        'Dr' => 'Dr'
          );
          $attribute = 'class="form-control"';
          echo form_dropdown('title', $data, 'Mr',$attribute);
        
    echo '</div>';

    echo '<div class="form-group">';
        echo '<label >First Name</label>';
        $data = array(
            'type' => 'Text',
            'name' => 'firstname',
            'class' => 'form-control',
            'id' => 'from-place',
            'placeholder' => 'firstname',
           
            );
            echo form_input($data);
    echo '</div>';

    echo '<div class="form-group">';
        echo '<label >Last Name</label>';
    $data = array(
        'type' => 'Text',
        'name' => 'lastname',
        'class' => 'form-control',
        'id' => 'from-place',
        'placeholder' => 'lastname',
        
        );
        echo form_input($data);
echo '</div>';

echo '<div class="form-group">';
echo '<label >Phone Number</label>';
$data = array(
    'type' => 'Tel',
    'name' => 'contactnumber',
    'class' => 'form-control',
    'id' => 'from-place',
    'placeholder' => 'Mobile No.',
    'maxlength' => '10'
    );
    echo form_input($data);
echo '</div>';

echo '<div class="form-group">';
echo '<label >Email</label>';
$data = array(
    'type' => 'email',
    'name' => 'email',
    'class' => 'form-control',
    'id' => 'from-place',
    'placeholder' => 'Email',
    'required'=> 'required'
    );
    echo form_input($data);
echo '</div>';

echo '<div class="form-group">';
echo '<label >Password</label>';
$data = array(
    'type' => 'Password',
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