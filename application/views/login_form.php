<?php
$this->load->view('head')
?>
<div class="container mt-5">
		<div class="row text-center justify-content-center">
			<div class="col-sm-6">
				<?php
				if (isset($logout_message)) {
					echo "<div class='alert alert-success alert-dismissible fade show' role='alert'><span class='sr-only'>Success: </span>";
					echo $logout_message;
					echo "</div>";
				}
				?>
				<?php
				if (isset($message_display)) {
					echo "<div class='alert alert-success alert-dismissible fade show' role='alert'<span class='sr-only'>Success: </span>";
					echo $message_display;
					echo "</div>";
				}
				if (isset($error_message)) {
					echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'><span class='sr-only'>Error: </span>";
					echo $error_message;
					echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
					echo "</div>";
				}
				if (validation_errors()) {
					echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'><span class='sr-only'>Error: </span>";
					echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
					echo validation_errors();
					echo "</div>";
				}
				?>

			</div>
		</div>
	<div class="row text-center justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header py-1 text-align-center">
					<h4>Login</h4>
				</div>
				<div class="card-body">
						<?php echo form_open('user_authentication/user_login_process'); ?>
						<?php
						
						?>
				
				<div class="form-floating mb-4">
					<i class="icon fa-solid fa-envelope fa-lg"></i>
					<input type="email" id="email" class="form-control form-control-lg" name="email" placeholder="ABC" />
					<label class="form-label" style="text-align:center;" for="user"> Email Address: </label>
				</div>
				
				<div class="form-floating mb-4">
					<i class="icon fa-solid fa-key fa-lg"></i>
					<input type="password" id="password" class="form-control form-control-lg" name="password" placeholder="456" />
					<label class="form-label" style="text-align:center;" for="password"> Password: </label>
				</div>
				
				<input type="submit" value="Sign In" style="width: 250px;" class="btn mb-0" name="submit">
			</div>			
					<h5>Don't have an account?</h5>
					<a type="submit" class="btn mb-3 justify-content-center" style="margin:0px 150px;width: 250px; " href="<?php echo base_url() ?>index.php/user_authentication/user_registration_show">Sign Up</a>
				

				<?php echo form_close(); ?>
			</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('footer') ?>