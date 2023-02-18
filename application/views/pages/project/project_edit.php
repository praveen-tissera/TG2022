<?php echo validation_errors(); ?>

<!-- FIND THE title VARIABLE BELOW -->

<!-- <?php  echo $title ?> -->
<?php echo form_open('edit_project/'.$project); ?>

<div class="container" style=" padding: 1%;">

	<form>
	<fieldset>
	<!-- Form Name -->


	<legend >Edit Project Details<legend>

	<label class="col-md-7">Please fill in the details below(* denotes a required field)</label> <br/><br/>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 " for="projectTitle" style="color: #1f497a;">Project Title: </label>
	  <div class="col-md-5">
	  <input id="projectTitle" name="projectTitle" type="text" placeholder="" class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info[0]['title']; }   ?>  > 
	  <span class="help-block">Enter the project title above</span>  
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4" for="" style="color: #1f497a;">Project Email: </label>  
	  <div class="col-md-5">
	  <input id="" name="" type="text" placeholder="" class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info[0]['email']; }   ?> >
	  <span class="help-block">Enter the project email above</span>  
	  </div>
	</div>
	
	<!-- Date of birth input-->
	<div class="form-group">
	  <label class="col-md-4 " for="projectType" style="color: #1f497a;">Project type: </label>  
	  <div class="col-md-5">
	  <input id="projectType" name="projectType" type="text" placeholder="" class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info[0]['projectTypeID']; }   ?> >
	  <span class="help-block">Enter the project type above</span>  
	  </div>
	</div>
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 " for="startDate" style="color: #1f497a;">Start date: </label>  
	  <div class="col-md-5">
	  <input id="startDate" name="startDate" type="date" placeholder="" class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info[0]['startDate']; }   ?> >
	  <span class="help-block">Enter the starting date above</span>  
	  </div>
	</div>
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 " for="endDate" style="color: #1f497a;">End date: </label>  
	  <div class="col-md-5">
	  <input id="endDate" name="endDate" type="date" placeholder="" class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info[0]['endDate']; }   ?> >
	  <span class="help-block">Enter the ending date above</span>  
	  </div>
	</div>
		
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 " for="projectBudget" style="color: #1f497a;">Budget: </label>  
	  <div class="col-md-5">
	  <input id="projectBudget" name="projectBudget" type="number" placeholder="" class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info[0]['budget']; }   ?> >
	  <span class="help-block">Enter project budget</span>  
	  </div>
	</div>
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 " for="country" style="color: #1f497a;">Country: </label>  
	  <div class="col-md-5">
	  <input id="country" name="country" type="text" placeholder="Scotland..." class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info[0]['country']; }   ?> >
	  <span class="help-block">Enter residing country above</span>  
	  </div>
	</div>
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 " for="city" style="color: #1f497a;">City: </label>  
	  <div class="col-md-5">
	  <input id="city" name="city" type="text" placeholder="Edinburgh..." class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info[0]['city']; }   ?> >
	  <span class="help-block">Enter residing city above</span>  
	  </div>
	</div>
	
		<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 " for="postcode" style="color: #1f497a;">Postcode: </label>  
	  <div class="col-md-5">
	  <input id="postcode" name="postcode" type="text"   placeholder="EH11 ABC..." class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value='".$info[0]['postcode']."'"; }   ?>  >
	  <span class="help-block">Enter postcode above</span>  
	  </div>
	</div>
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 " for="streetName" style="color: #1f497a;">Street Name: </label>  
	  <div class="col-md-5">
	  <input id="streetName" name="streetName" type="text" placeholder="Riccarton Avenue..." class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info[0]['streetName']; }   ?>>
	  <span class="help-block">Enter street name</span>  
	  </div>
	</div>
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4" for="buildingNumber" style="color: #1f497a;">Building Number: </label>  
	  <div class="col-md-5">
	  <input id="buildingNumber" name="buildingNumber" type="number" placeholder="Insert number..." class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info[0]['buldingNumber']; }   ?> >
	  <span class="help-block">Enter building number</span>  
	  </div>
	</div>

<div class="container">

	<!--
	
	<?php

	foreach($tasks as $task)
		{ ?>
		<br>
	
		<div class="row">
				<div class="col-lg-12 noPadding ">
					<div class="input-group " >
						<div class="col-sm-5 ">
							<label>Task Title:</label>
							<input type="text" name='taskTitle' id='taskTitle'  placeholder='Task Title' class="form-control" <?php if(isset($tasks)) { 	echo "value=".$task['title']; }   ?>/>
						</div>
						<div class="col-sm-2">
							<label>Start Date:</label>
							<input type='text' class="form-control" placeholder='Start date' name='taskStartDate' id='datepicker' <?php if(isset($tasks)) { 	echo "value=".$task['startDate']; }   ?> />
						</div>
							<div class="col-sm-2 ">
							<label>End Date:</label>
							<input type='text' class="form-control" placeholder='End date' name='taskEndDate' id='datepicker2' <?php if(isset($tasks)) { 	echo "value=".$task['endDate']; }   ?> />
						</div>
		  				
					</div>
				</div>
            </div>

           
         

            <br>

            <?php
            foreach ($roles as $role)
             { ?>
			      <div class="form-group">
				  	<label class="col-md-4 " for="streetName">Role: </label>  
				  <div class="col-md-5">
				  <input id="streetName" name="streetName" type="text" placeholder="Riccarton Avenue..." class="form-control input-md" required="" <?php if(isset($roles)) { 	echo "value=".$role['roleName']; }   ?>>
				  <span class="help-block">Enter role name</span>  
				  </div>
				</div>
				<br>
			<?php
            }

         
      	}
      	?>
      -->


    
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

<div>

