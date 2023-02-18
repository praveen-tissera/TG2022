
<?php echo validation_errors(); ?>

<!-- FIND THE title VARIABLE BELOW -->

<!-- <?php  echo $title ?> -->
<?php echo form_open('profile'); ?>
<div class="container" style="width: 100%; height: 100%">
	<fieldset>
	<!-- Form Name -->
	
	<label class="col-md-7 control-label">Please fill in the details below(* denotes a required field)</label> <br/><br/>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="fname" style="color: #1f497a;">First Name: </label>
	  <div class="col-md-5">
	  <input id="fname" name="fname" type="text" placeholder="Joe" class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info->firstname; }   ?>  > 
	  <span class="help-block">Enter your first name above</span>  
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="sname" style="color: #1f497a;">Second Name: </label>  
	  <div class="col-md-5">
	  <input id="sname" name="sname" type="text" placeholder="Bloggs" class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info->lastname; }   ?> >
	  <span class="help-block">Enter your second name above</span>  
	  </div>
	</div>
	
	<!-- Date of birth input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="dob" style="color: #1f497a;">Date Of Birth: </label>  
	  <div class="col-md-5">
	  <input id="dob" name="dob" type="date" min="1917-09-09" max="2017-09-09" placeholder="dd/mm/yyyy" class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info->dob; }   ?> >
	  <span class="help-block">Enter your date of birth above</span>  
	  </div>
	</div>
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="country" style="color: #1f497a;">Country: </label>  
	  <div class="col-md-5">
	  <input id="country" name="country" type="text" placeholder="Scotland..." class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info->country; }   ?> >
	  <span class="help-block">Enter residing country above</span>  
	  </div>
	</div>
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="city" style="color: #1f497a;">City: </label>  
	  <div class="col-md-5">
	  <input id="city" name="city" type="text" placeholder="Edinburgh..." class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info->city; }   ?> >
	  <span class="help-block">Enter residing city above</span>  
	  </div>
	</div>
	
		<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="postcode" style="color: #1f497a;">Postcode: </label>  
	  <div class="col-md-5">
	  <input id="postcode" name="postcode" type="text"   placeholder="EH11 ABC..." class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value='".$info->postcode."'"; }   ?>  >
	  <span class="help-block">Enter postcode above</span>  
	  </div>
	</div>
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="streetName" style="color: #1f497a;">Street Name: </label>  
	  <div class="col-md-5">
	  <input id="streetName" name="streetName" type="text" placeholder="Riccarton Avenue..." class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info->streetName; }   ?>>
	  <span class="help-block">Enter street name</span>  
	  </div>
	</div>
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="buildingNumber" style="color: #1f497a;">Building Number: </label>  
	  <div class="col-md-5">
	  <input id="buildingNumber" name="buildingNumber" type="number" placeholder="Insert number..." class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info->buldingNumber; }   ?> >
	  <span class="help-block">Enter building number</span>  
	  </div>
	</div>
	
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="religion" style="color: #1f497a;">Religion</label>  
	  <div class="col-md-5">
	  <input id="religion" name="religion" type="text" placeholder="" class="form-control input-md" <?php if(isset($info)) { 	echo "value=".$info->religion; }   ?> >
	  <span class="help-block">Enter your religion above</span>  
	  </div>
	</div>

	<!-- Multiple Checkboxes -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="locationFlex" style="color: #1f497a;" >Location Flexibility</label>
	  <div class="col-md-4">
	  <div class="checkbox">
		<label for="locationFlex-0">
		
	<!-- RADIO BUTTONS BUGGY AF - FIXED -->			

		  <input type="radio" name="locationFlex" id="locationFlex" value="able" required=""> Able to relocate
		  <input type="radio" name="locationFlex" id="locationFlex" value ="inable" style="margin-left: 20px"> In-able to relocate
		</label>
		</div>
	  </div>
	</div>

	<!-- Button -->
	<div class="form-group">
	  <div class="col-md-9 control-label">
		<button id="submit" name="submit" type="submit" class="btn btn-primary btn-lg">Submit</button>
	  </div>
	</div>
	
	</fieldset>
	</form>

</div>
