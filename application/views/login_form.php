<html>

<head>
<?php $this->load->view('head'); ?>
<title>Login Form</title>
</head>
<body>


<!-- Half Page Image Background Carousel Header -->
    
<div class="row" style="height: 200px;"></div>
<div class="container" style="margin-top:5px;">

		<div class="row text-center">
			<div style="width:50%; margin:auto">
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
				<br>
                <?php echo form_open('user_authentication/user_login_process'); ?>
	

				<div class="row text-center">
			<div style="width:50%; margin:auto">
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
	</div>
	</div>

	<br>
	
	<div class="input-group" style="margin-bottom:25px; width:50%; margin:auto">
		<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	  	<input type="text" name="username" id="name" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
	</div>

	<br>
	
	<div class="input-group" style="margin-bottom:25px; width:50%;  margin:auto;">
	  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	  <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
	</div>

	<br>
	
	<input type="submit" value=" Login "  class="btn btn-success" name="submit" />
	
	<a href="<?php echo base_url() ?>index.php/user_authentication/user_registration_show" style="margin-left:20px;">To SignUp Click Here</a>
<?php echo form_close(); ?>
            </div>
            <div class="col-sm-4"></div>
        </div>

    </div>
</body>
</html>
<?php $this->load->view('script'); ?>
