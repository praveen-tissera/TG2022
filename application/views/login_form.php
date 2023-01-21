<html>

<head>
<?php $this->load->view('head'); ?>
<title>Login Form</title>
</head>
<body>
<!-- Navigation -->
   <?php $this->load->view('nav'); ?>

<!-- Half Page Image Background Carousel Header -->
    
   <?php $this->load->view('slider'); ?>

<div class="container" style="margin-top:5px;">

		<div class="row text-center">
			<div class="col-sm-12">
				<?php
				if (isset($logout_message)) {
					echo "<div class='alert alert-success' role='alert'><span class='sr-only'>Success:</span>";
					echo $logout_message;
					echo "</div>";
				}
			?>
			<?php
				if (isset($message_display)) {
					echo "<div class='alert alert-success' role='alert'><span class='sr-only'>Success:</span>";
					echo $message_display;
					echo "</div>";
				}
			?>

			</div>


		</div>
        <div class="row">
        	<div class="col-sm-4"></div>
            <div class="col-sm-4 col-lg-12 text-center">
                <h2>Login Form</h2>
                <?php echo form_open('user_authentication/user_login_process'); ?>
	
	<?php

	
		if (isset($error_message)) {
	        echo "<div class='alert alert-danger' role='alert'><span class='sr-only'>Error:</span>";
		    echo $error_message;
		    echo "</div>";
		}
		if (validation_errors()) {
			echo "<div class='alert alert-danger' role='alert'><span class='sr-only'>Error:</span>";
			echo validation_errors();
			echo "</div>";
		}	
	?>
	
	<div class="input-group" style="margin-bottom:25px;">
		<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	  	<input type="text" name="username" id="name" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
	</div>
	
	<div class="input-group" style="margin-bottom:25px;">
	  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	  <input type="password" name="password" id="password" class="form-control" placeholder="password" aria-describedby="basic-addon1">
	</div>
	
	<input type="submit" value=" Login "  class="btn btn-success" name="submit" />
	
	<a href="<?php echo base_url() ?>index.php/user_authentication/user_registration_show" style="margin-left:20px;">To SignUp Click Here</a>
<?php echo form_close(); ?>
            </div>
            <div class="col-sm-4"></div>
        </div>

        <hr>

       <?php $this->load->view('footer'); ?>

    </div>
</body>
</html>
<?php $this->load->view('script'); ?>
