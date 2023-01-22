<html>

<head>
	<?php $this->load->view('head'); ?>
	<title>Appointment Confirmation</title>
</head>

<body>
	<!-- Navigation -->
	<?php $this->load->view('nav'); ?>



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
			<div class="col-sm-4 col-lg-12">
				<h2>Doctor Completion</h2>
				<?php echo form_open('appointment/register_patient'); ?>

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

				<div class="card" style="width: 18rem;">
					<img src="<?php echo base_url() . 'images/completeimg.jpg' ?>" class="card-img-top" alt="...">
					<div class="card-body">
						<p class="card-text">Booking Number : <?php echo $bookingnumber; ?></p>
						<p class="card-text">Slot Number : <?php echo $slotnumber; ?></p>
						<p class="card-text">Appointment Date : <?php echo $date; ?></p>
						<p class="card-text">Appointment Time : <?php echo $time; ?></p>
					</div>
				</div>

				


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