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
            <div class="col-sm-4 col-lg-12 text-center">
                <h2>Doctor Appointment Slots</h2>
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
	
	
	
	<?php 
	
		print_r($doctor_appointment_slots);
		if(gettype($doctor_appointment_slots) == 'string'){
			echo $doctor_appointment_slots;
		}else {
			echo "<table class='table'>";
			foreach ($doctor_appointment_slots as $key => $value) {
				echo "<tr>";	
					echo "<td>";
						// print_r($value);
						echo $value->date;
					echo "</td>";
					echo "<td>";
						echo $value->time;
					echo "</td>";
					echo "<td>";	
						echo $value->status;
					echo "</td>";
					echo "<td>";
					if($value->status == 'available'){
						echo "<a href='".base_url()."appointment/booking/{$value->slot_id}"."' class='btn btn-dark'  >Book</a>";
					}else{
						echo "<a href='' class='btn btn-dark disabled'  >Book</a>";
					}
						
					echo "</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		
	?>
	
	
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
