
<!-- start of profile well-->

<section>
<div class="well well-sm">
<div class="container" style="margin-top: 30px;">
<div class="profile-head" style="background-color: #6C7A89">
<div class="col-md- col-sm-4 col-xs-12">
<img src="<?php echo base_url().'/img/profile.jpg' ?>" class="img-responsive" />
<h6><?php/* echo $info[0]['firstname']; echo " ".  $info[0]['lastname']; */?>  </h6>
</div><!--col-md-4 col-sm-4 col-xs-12 close-->


		
<div class="col-md-5 col-sm-5 col-xs-12">
<h5 id="h01"> <?php echo $info[0]['firstname']; echo " ".  $info[0]['lastname']; ?>  </h5>
<p id="p01"> <?php if($history != NULL){foreach($history as $h){ echo $h['role_title']; break; } }?> </p>
<ul>
	<?php if(isset($history) && isset($time_off)) { /*print_r($history);*/ $true = true;?>
<?php $currentDate = date('y-m-d'); $latest = date(0000-00-00); foreach($history as $h){ if(($h['task_end']) > $latest ) {  $latest = $h['task_end'];}  else { continue;}	}?>
	<?php if((($latest) > $currentDate) || (isset($time_off[0]) && $time_off[0]['endDate'] > $currentDate )) {?>
	<li class = "unavailable"> <p style = "color: red">unavailable</p></li>
	<?php } else { ?>	
	<li class = "available"> <p style = "color: #00FF66">available</p> </li>
	<?php } }?>
<li><span class="glyphicon glyphicon-briefcase"></span> 5 years</li>
<li><span class="glyphicon glyphicon-map-marker"></span> <?php echo $info[0]['country']; ?></li>
<li><span class="glyphicon glyphicon-home"></span> 
<?php echo $info[0]['buldingNumber'];echo " ".  $info[0]['streetName'];echo " ".  $info[0]['postcode'];echo " ".  $info[0]['city']; ?>
</li>
<!-- <li><span class="glyphicon glyphicon-phone"></span> <a href="#" title="call">(+021) 956 789123</a></li> -->
<li><span class="glyphicon glyphicon-envelope"></span><a href="#" title="mail"> <?php echo $info[0]['email'];?></a></li>

</ul>


</div><!--col-md-8 col-sm-8 col-xs-12 close-->


</div><!--profile-head close-->
</div>
</div>



<!--start timeline of projects-->

<section id="cd-timeline" class="cd-container">
	<?php if(isset($history)) { ?>
	 <?php foreach($history as $h) { /*print_r($h);*/?>
		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-picture">
				<img src="<?php echo base_url() ?>/img/cd-icon-picture.svg" alt="Picture">
			</div> <!-- cd-timeline-img -->

				 
			<div class="cd-timeline-content">
				<h2><?php echo $h['project_title'];?> <p><?php ?></p></h2>
				<p><?php echo $h['project_start']; echo ' - '; echo $h['project_end']; ?></p>
				<!-- <p> <?php echo $h['project_description'];?></p> -->
				<h1><?php echo $h['task_title'];?></h1>
				<p><?php  echo $h['task_start']; echo ' - '; echo$h['task_end']; echo '<br>';?></p>
				<h1><?php echo $h['role_title'];?></h1>
				<a href="#0" class="cd-read-more"><?php echo $h['project_title']; ?></a>
				<?php echo '<br>';?>

				<span class="cd-date"></span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->
			<?php } }?>
		
	</section> <!-- cd-timeline -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="<?php echo base_url()?>/js/main.js"></script> <!-- Main JS -->

<!--start of profile information-->

<div id="sticky" class="container">
    
    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-menu" role="tablist">
      <li class="active">
          <a href="#profile" role="tab" data-toggle="tab">
              <i class="fa fa-male"></i> Profile
          </a>
      </li>
            <?php 
            // print_r($this->session->account_level);
            
            if(!isset($find) && $this->session->account_level != '3' ) { ?>

      <li><a href="#request" role="tab" data-toggle="tab">
          <i class="fa fa-key"></i> Request days off
          </a>
      </li>
      <?php } ?>

    </ul><!--nav-tabs close-->
    
    <!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane fade active in" id="profile">
		<div class="container">
			<div class="col-sm-11" style="float:left;">
				<div class="hve-pro">
				</div><!--hve-pro close-->
			</div><!--col-sm-12 close-->
			<br clear="all" />
			<div class="row">
				<div class="col-md-12">
					<h4 class="pro-title">Bio Graph</h4>
				</div><!--col-md-12 close-->

				<div class="col-md-6">

					<div class="table-responsive responsiv-table">
						<table class="table bio-table">
							<tbody>
								<tr>      
									<td>Firstname</td>
									<td>: <?php echo $info[0]['firstname'];?></td> 
								</tr>
								<tr>    
									<td>Lastname</td>
									<td>: <?php echo $info[0]['lastname'];?></td>       
								</tr>
								<!-- <tr>    
									<td>Birthday</td>
									<td>: <?php echo $info[0]['dob'];?></td>       
								</tr> -->
								<tr>    
									<td>Contury</td>
									<td>: <?php echo $info[0]['country'];?></td>       
								</tr>
								<tr>
									<td>Occupation</td>
									<td>: Web Designer</td> 
								</tr>

							</tbody>
						</table>
					</div><!--table-responsive close-->
					
				</div><!--col-md-6 close-->

<div class="col-md-6">

<div class="table-responsive responsiv-table">
  <table class="table bio-table">
      <tbody>
     <tr>  
        <td>Email Id</td>
        <td>: <?php echo $info[0]['email'];?></td> 
     </tr>
     <tr>    
        <td>Mobile</td>
        <td>: (+6283) 456 789</td>       
     </tr>
     <tr>    
        <td>Phone</td>
        <td>: (+021) 956 789123</td>       
    </tr>
    <tr>    
        <td>Experience</td>
        <td>: 5 years</td>       
    </tr>
    <tr>
        <td>Twiter</td>
        <td>#@jenifer123</td> 
     </tr>

    </tbody>
  </table>
  </div><!--table-responsive close-->
</div><!--col-md-6 close-->

</div><!--row close-->




</div><!--container close-->
</div><!--tab-pane close-->
      
<?php if(!isset($find)) { ?>
<div class="tab-pane fade" id="change">
<div class="container fom-main">
<div class="row">
<div class="col-sm-12">
<h2 class="register">Edit Your Profile</h2>
</div><!--col-sm-12 close-->

</div><!--row close-->
<br />
<div class="row">

<form class="form-horizontal main_form text-left" action=" " method="post"  id="contact_form">
<fieldset>


<div class="form-group col-md-12">
  <label class="col-md-10 control-label">First Name</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
 <input name="first_name" placeholder="Last Name" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group col-md-12">
  <label class="col-md-10 control-label" >Last Name</label> 
    <div class="col-md-12 inputGroupContainer">
    <div class="input-group">
  <input name="last_name" placeholder="Last Name" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group col-md-12">
  <label class="col-md-10 control-label">E-Mail</label>  
    <div class="col-md-12 inputGroupContainer">
    <div class="input-group">
  <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group col-md-12">
  <label class="col-md-10 control-label">Phone #</label>  
    <div class="col-md-12 inputGroupContainer">
    <div class="input-group">
  <input name="phone" placeholder="(845)555-1212" class="form-control" type="text">
    </div>
  </div>
</div>

<!-- Text input-->
      
 <div class="form-group col-md-12">
  <label class="col-md-10 control-label">Address</label>
    <div class="col-md-12 inputGroupContainer">
    <div class="input-group">
            <textarea class="form-control" name="comment" placeholder="Project Description"></textarea>
  </div>
  </div>
</div>

 <div class="form-group col-md-12">
  <label class="col-md-10 control-label">Project Description</label>
    <div class="col-md-12 inputGroupContainer">
    <div class="input-group">
        	<textarea class="form-control" name="comment" placeholder="Project Description"></textarea>
  </div>
  </div>
</div>



<div class="form-group col-md-12"> 
  <label class="col-md-10 control-label">Industry</label>
    <div class="col-md-12 selectContainer">
    <div class="input-group">
    <select name="state" class="form-control selectpicker" >
      <option value=" " >Industry</option>
      <option>Industry</option>
      <option>Industry</option>
      <option>Industry</option>
    </select>
  </div>
</div>
</div>


<!-- Select Basic -->
   
<div class="form-group col-md-12"> 
  <label class="col-md-10 control-label">Qualification</label>
    <div class="col-md-12 selectContainer">
    <div class="input-group">
    <select name="state" class="form-control selectpicker" >
           <option value=" " >your Qualification</option>
      <option>M.A.</option>
      <option>B.A.</option>
      <option >B.Ed</option>
    </select>
  </div>
</div>
</div>



<div class="form-group col-md-12"> 
  <label class="col-md-10 control-label">Expertise areas</label>
    <div class="col-md-12 selectContainer">
    <div class="input-group">
    <select name="state" class="form-control selectpicker" >
      <option value=" " >Expertise areas</option>
      <option>Expertise areas1</option>
      <option>Expertise areas1</option>
      <option>Expertise areas1</option>
    </select>
  </div>
</div>
</div>

<div class="form-group col-md-12"> 
  <label class="col-md-10 control-label">Experience</label>
    <div class="col-md-12 selectContainer">
    <div class="input-group">
    <select name="state" class="form-control selectpicker" >
      <option value=" " >your Experience</option>
      <option>1 year</option>
      <option>2 years</option>
      <option>3 years</option>
    </select>
  </div>
</div>
</div>

<div class="form-group col-md-12"> 
  <label class="col-md-10 control-label">Salary expected</label>
    <div class="col-md-12 selectContainer">
    <div class="input-group">
    <select name="state" class="form-control selectpicker" >
      <option value=" " >your Salary expectation</option>
      <option>50 thousand</option>
      <option>30 thousand</option>
    </select>
  </div>
</div>
</div>

<div class="form-group col-md-12"> 
  <label class="col-md-10 control-label">Preferred Location</label>
    <div class="col-md-12 selectContainer">
    <div class="input-group">
    <select name="state" class="form-control selectpicker" >
      <option value=" " >your Preferred Location</option>
      <option>Chandigarh</option>
      <option>Chandigarh</option>
    </select>
  </div>
</div>
</div>

<div class="form-group col-md-12">
  <label class="col-md-10 control-label">Choose Password</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="first_name" placeholder="Choose Password" class="form-control"  type="password">
    </div>
  </div>
</div>



<div class="form-group col-md-12">
  <label class="col-md-10 control-label">Confirm Password</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="first_name" placeholder="Confiram Password" class="form-control"  type="password">
    </div>
  </div>
</div>


<!-- radio checks -->
 <div class="form-group col-md-12">
                        <label class="col-md-10 control-label">Gender</label>
                        <div class="col-md-6">
                            <div class="radio col-md-2">
                                <label>
                                    <input type="radio" name="hosting" value="yes" /> Male
                                </label>
                            </div>
                            <div class="radio col-md-2">
                                <label>
                                    <input type="radio" name="hosting" value="no" /> Female
                                </label>
                            </div>
                        </div>
                    </div>

<!-- upload profile picture -->
<div class="col-md-12 text-left">
<div class="uplod-picture">
<span class="btn btn-default uplod-file">
    Upload Photo <input type="file" />
</span>
</div><!--uplod-picture close-->
</div><!--col-md-12 close-->
<!-- Button -->
<div class="form-group col-md-10">
  <div class="col-md-6">
    <button type="submit" class="btn submit-button" >Save</button>
    <button type="submit" class="btn submit-button" >Cancel</button>

  </div>
</div>
</fieldset>
</form>
</div><!--row close-->
</div><!--container close -->          
</div><!--tab-pane close-->
<?php } ?>

<?php if(!isset($find)) { ?>
<div class="tab-pane fade" id="request">
<div class="container fom-main">
<div class="row">
<div class="col-sm-12">
<h2 class="register">Request days off</h2>
</div><!--col-sm-12 close-->

</div><!--row close-->
<br />
<div class="row">

<?php echo form_open('view_profile'); ?>
<fieldset>
	
	<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Select type of request</label>
  <div class="col-md-4">
    <select id="selectbasic" name="selecType" class="form-control">
      <option value="1">Holiday</option>
      <option value="2">Sickness</option>
    </select>
  </div>
</div>
<div class="createProject container-fluid col-sm-5">
 <div class='input-group date' >
		<label for="startDate">* Start Date:</label>
		<div class="form-group">
			<div class='input-group date' >
				<input type='text' class="form-control" id="datepicker" name="startDate" />
				</span>
			</div>
		</div>
		<label for="endDate">* End Date:</label>
		<div class="form-group">
			<div class='input-group date' >
				<input type='text' class="form-control" id="datepicker1" name="endDate" />
				</span>
			</div>
		</div>
	</div>
	</div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <script>
  $( function() 
  {$( "#datepicker" ).datepicker();
    $( "#datepicker" ).datepicker( "option", "dateFormat", "dd/mm/yy");
  } );
  
  $( function() {
    $( "#datepicker1" ).datepicker();
    $( "#datepicker1" ).datepicker( "option", "dateFormat", "dd/mm/yy");
    
  } );
  
   </script>
   </div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button type="submit" class="btn btn-default">Submit</button>
  </div>
</div>

</fieldset>
</form>
</div><!--row close-->
</div><!--container close -->          
</div><!--tab-pane close-->
<?php } ?>

</div><!--tab-content close-->
</div><!--container close-->

</section>

  </div>
</body>
