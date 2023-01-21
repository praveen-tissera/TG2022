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
				<h2>View All Tasks</h2>


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
				print_r($task_list);
				echo "<table class='table'>";
				foreach ($task_list as $key => $value) {
					echo "<tr>";
					echo "<td>";
					echo $value->task_id;
					echo "</td>";
					echo "<td>";
					echo $value->task_description;
					echo "</td>";
					echo "<td>";
					echo $value->status;
					echo "</td>";
					echo "<td>";
					echo $value->created_date;
					echo "</td>";
					echo "<td>";
					echo "<a href='" . base_url() . "tasks/edit_tasks/{$value->task_id}'>Edit</a>";
					echo "<a href='" . base_url() . "tasks/delete_tasks/{$value->task_id}'>Delete</a>";
					echo "</td>";

					echo "</tr>";
				}
				echo "</table>";

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