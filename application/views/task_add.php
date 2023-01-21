<html>

<head>
	<?php $this->load->view('head'); ?>
	<title>Doctor Appointment Form</title>
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
				<h2>Task to Add</h2>


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
			<div class="col-12">
				<?php echo form_open('tasks/add_task/1') ?>
				<div class="form-group">
					<label for="title">Task Description</label>
					<input type="text" class="form-control" id="title" name="taskDescription">

				</div>
				<input type="submit" class="btn btn-success" name="submit" value="Add">
				<?php echo form_close() ?>
			</div>
			<div class="col-sm-4"></div>
		</div>

		<hr>

		<?php $this->load->view('footer'); ?>

	</div>
</body>

</html>
<?php $this->load->view('script'); ?>