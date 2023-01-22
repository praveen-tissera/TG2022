<html>

<head>
<?php $this->load->view('head'); ?>
<title>Appointment Form</title>
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
            <div class="col-sm-4 col-lg-12 text-center">
                <h2>Appointment Form</h2>
                <?php echo form_open('appointment/appointment_booking_view'); ?>
	
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
		<?php
			print_r($doctor_details);
			
		?>
	  	<select name="doctorid" class="form-control">z
			<?php
				foreach ($doctor_details as $key => $value) {
					
					// print_r($value->doctor_name);
					echo "<option value='{$value->doctor_id}'>" .$value->doctor_name . "</option>";
					
				}

			?>
			
		</select>
	</div>
	
	<div class="input-group" style="margin-bottom:25px;">
	  <input type="date" name="date" class="form-control" >
	</div>
	
	<input type="submit" value="search"  class="btn btn-success" name="search" />
	
	
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
