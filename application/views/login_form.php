<html>

<head>
	<?php $this->load->view('head'); ?>
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css\signupstyle.css">
</head>

<body>
	<!-- Navigation -->
	<?php $this->load->view('nav'); ?>



	<div class="container" style="margin-top:5px;">

		<div class="row text-center">
			<div class="col-sm-12">
				<?php
				if (isset($logout_message)) {
					echo "<div class='alert alert-success' role='alert' style=' text-margin:0px;'><span class='sr-only'>Success:</span>";
					echo $logout_message;
					echo "</div>";
				}
				?>
				<?php
				if (isset($message_display)) {
					echo "<div class='alert alert-success' role='alert'style=' width: 45%; margin-left:10px text-margin:0px;><span class='sr-only'>Success:</span>";
					echo $message_display;
					echo "</div>";
				}
				?>

			</div>


		</div>
		<div class="row">
			
			<div class="col-sm-4 col-lg-12">
			<h2 class=form__title style="margin-top: 39px; margin-left:140px ;">Sign In</h2>
				<?php echo form_open('user_authentication/user_login_process'); ?>

				<?php


				if (isset($error_message)) {
					echo "<div class='alert alert-danger' role='alert' style='height:20%; width: 45%; margin-left:10px'><span class='sr-only'>Error:</span>";
					echo $error_message;
					echo "</div>";
				}
				if (validation_errors()) {
					echo "<div class='alert alert-danger' role='alert' style='height:20%;width: 45%; margin-left:10px'><span class='sr-only'>Error:</span>";
					echo validation_errors();
					echo "</div>";
				}
				?>
				<div style="margin-left: 28px; margin-top: 0%;">
				<div class="form-floating">
					<i class="icon fa-solid fa-envelope fa-lg"></i>
					<input type="email" id="email" class="form-control form-control-lg" name="email" placeholder="ABC" />
					<label class="form-label" style="text-align:center;" for="user"> Email Address: </label>
				</div>
				</div>


				<div style="margin-left: 28px;">
				<div class="form-floating">
					<i class="icon fa-solid fa-key fa-lg"></i>
					<input type="password" id="password" class="form-control form-control-lg" name="password" placeholder="456" />
					<label class="form-label" style="text-align:center;" for="password"> Password: </label>
				</div>
				</div>

<br>
				<div style="margin-left: 80px;">
				<input type="submit" value=" Sign In " class="btn" name="submit">
			</div>



				<?php echo form_close(); ?>
			</div>

		</div>
		<div class="container__overlay">
			<div class="overlay">
				<div class="overlay__panel overlay--right">
					<h5>Don't have an account?</h5>
					<a type="submit" class="btn" style="margin:0.5px 30px; " href="<?php echo base_url() ?>index.php/user_authentication/user_registration_show" style="margin-left:20px;">Sign Up</a>
				</div>
			</div>
		</div>


	</div>
</body>

</html>
<?php $this->load->view('script'); ?>