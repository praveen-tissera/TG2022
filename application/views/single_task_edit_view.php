<html>

<head>
	<?php $this->load->view('head'); ?>
	<title>Edit task</title>
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
				<h2>Edit Task</h2>


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
				<?php
				print_r($task_detail);
				echo form_open("tasks/updateTask/{$task_detail[0]->task_id}");
				echo "<div class='form-group'>";
					echo "<input type='text' name='description' class='form-control' value='{$task_detail[0]->task_description}'>";
				echo "</div>";

				echo "<div class='form-group'>";
				echo "<label class='alert alert-warning'>Current Status: {$task_detail[0]->status}</label><br>";

					echo "<select>";
						echo "<option value='new'>New</option>";
						echo "<option value='assign'>Assigned</option>";
						echo "<option value='inprogress'>Inprogress</option>";
						echo "<option value='complete'>Complete</option>";
					echo "</select>";
				echo "</div>";
				echo "<input type='submit' class='btn btn-success' value='submit'>";
				echo form_close();

				?>
			</div>
			<div class="col-sm-4"></div>
		</div>

		<hr>

		<?php $this->load->view('footer'); ?>

	</div>
</body>

</html>
<?php $this->load->view('script'); ?>