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
                <h2>Doctor Appointment Guest Registration</h2>
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
	
	
	
	<?php 
	
		print_r($slotDetails);
		// create form to get guest user details
		
		
		
	?>
<input type="hidden" name="slotid" value="<?php echo $slotDetails[0]->slot_id ?>">
<div class="form-group">
    <label for="name">Patient Name</label>
    <input type="text" name="name" class="form-control" id="name">
  </div>

  <div class="form-group">
    <label for="age">Age</label>
    <input type="number" name="age" class="form-control" id="age">
  </div>

  <div class="form-group">
    <label for="tel">Contact Numebr</label>
    <input type="tel" name="contactNumber" class="form-control" id="tel">
  </div>
  <button type="submit" class="btn btn-primary">Continute</button>
	
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
