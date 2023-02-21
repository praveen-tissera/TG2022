
<?php echo validation_errors(); ?>

<?php echo form_open('create'); ?>

<?php 
if(isset($_POST['submit'])){
    $to = "mario.wasilev@gmail.com"; // this is PlanWiseRMS email
    $from = $_POST['emailAddress']; // this is the sender's Email address
    $username = $_POST['username'];
    $password = $_POST['password'];
    $subject = "Complete registration";
    $subject2 = "Copy of registration details";
    $message = "Username:" . $username . "\nPassoword: " . $password;
    $message2 = "Hello " . $username . ",\n\n" . "This email confirm your successful registration in PlanWiseRMS.\n" . "Your registration details are listed below:\n" . "Username:" . $username . "\n\n" . "Password:" . $password . "\n\n\n" . "I hope you enjoy using PlanWiseRMS!";

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent Successfuly.";
    }
?>

	<fieldset>
	<!-- Form Name -->

	<label class="col-md-7 control-label">Please fill in the details below(* denotes a required field)</label> <br/><br/>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="username">username</label>  
	  <div class="col-md-5">
	  <input id="username" name="username" type="text" minlength = "4" placeholder="jbloggs21" class="form-control input-md" required="">
	  <span class="help-block">Enter your username for your account using only letters and numbers</span>  
	  </div>
	</div>

	<!-- Password input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="passwordin">password</label>
	  <div class="col-md-5">
		<input id="password" name="password" type="password" minlength = "4" placeholder="" class="form-control input-md" required="">
		<span class="help-block">Minimum 8 characters, and 1 capital letter</span>
	  </div>
	</div>
	


	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="emailAddress">EMAIL Address</label>  
	  <div class="col-md-5">
	  <input id="emailAddress" name="emailAddress" type="email" placeholder="joebloggs@imaginary.com" class="form-control input-md" required="">
	  <span class="help-block">Please enter a valid email address</span>  
	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="emailAddress">Type</label>  
	  <div class="col-md-5">
	
	  <select class="form-control input-md" name="type">
		<option value="1">Client</option>
		<option value="2">Staff</option>
		<option value="3">Client</option>
	  </select>
	  </div>
	</div>
	

	<!-- Button -->
	<div class="form-group">
	  <div class="col-md-9 control-label">
		<button id="submit" name="submit" type="submit" class="btn btn-primary btn-lg">Register</button>
	  </div>
	</div>

	
	</fieldset>
	</form>


