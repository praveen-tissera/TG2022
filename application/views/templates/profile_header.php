<!DOCTYPE html>
<html>
		<style>#datetimepicker5{z-index:1500 !important;}</style>
<head>
	
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/css/mystyle.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url()?>/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="<?php echo base_url()?>/css/style.css"> <!-- Resource style -->
	<link rel="stylesheet" href="<?php echo base_url()?>/css/style.scss"> <!-- Resource style -->
	<script src="<?php echo base_url()?>/js/modernizr.js"></script> <!-- Modernizr -->
	<script src="<?php echo base_url()?>/js/main.js"></script> <!-- Main JS -->
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	

	<title>PlanWiseRMS</title>
	<!-- <script type="text/javascript">
		var sessionTimeout = <?php echo $this->config->item("sess_expiration"); ?> ; 
			
		function DisplaySessionTimeout()
		{
			//assigning minutes left to session timeout to Label
				$("#timeDiv").show();
			sessionTimeout = sessionTimeout - 1 ;
			
			//if session is not less than 0
			if (sessionTimeout >= 5){
				$("#time").text(sessionTimeout); //call the function again after 1 minute delay
					setTimeout(DisplaySessionTimeout,1000);
				}
			else
			{
				//show message box
				if(sessionTimeout == 4) {alert("Your current Session is nearly over.");}
				if(sessionTimeout == 0) {window.location.href = '<?php echo site_url()."/login" ?>';}
				$("#time").text(sessionTimeout); //call the function again after 1 minute delay
					setTimeout(DisplaySessionTimeout,1000);
			}
		}	
	</script> -->
</head> 
<body onload="if(<?php echo $this->session->logged_in ?>){DisplaySessionTimeout();}">
  <div id="timeDiv" style="display:none; "  >
  <label id="SessionTimeLb" style="float:left;">SessionTime: </label>
  <p id="time" ></p>
	</div>
	<div id="navBack">
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo site_url();?>/view_profile"><img src="<?php echo base_url() ?>img/Picture1.png" alt="Logo" style="width:60px;height:50px; padding-bottom: 10px; "></a>

    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?php echo site_url();?>/view_profile" style="color: #1f497a;">Home</a></li>
     			<li class="dropdown" style="color: #1f497a;">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #1f497a;">Profile
				<span class="caret"></span></a>
       <ul class="dropdown-menu">
	  <li><a href="<?php echo site_url();?>/view_profile" style="color: #1f497a;">My profile</a></li>
      <li><a href="<?php echo site_url();?>/profile" style="color: #1f497a;"> Edit profile</a></li>
      <li><a href="<?php echo site_url();?>/profiles" style="color: #1f497a;">Profile database</a></li>
       </ul>
      </li>
			<li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #1f497a;">Projects
				<span class="caret"></span></a>
       <ul class="dropdown-menu">
	  <li><a href="<?php echo site_url();?>/create_project" style="color: #1f497a;">Create Project</a></li>
      <li><a href="<?php echo site_url();?>/my_project" style="color: #1f497a;">My Projects</a></li>
      <li><a href="<?php echo site_url();?>/projects" style="color: #1f497a;">Projects Database</a></li>
       </ul>
      </li>
      <li><a href="" style="color: #1f497a;">Company</a></li>
      <li><a href="#" data-toggle="modal" data-target="#myModal" style="color: #1f497a;">Log Out</a></li>
    </ul>
    </div>
  </nav>
  </div>
  
<!--start of modal for logout-->

<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Are you sure you want to quit ?</h4>
        </div>
        <div class="modal-body">
          
          
         <section class="lougout" id="panel">
  <div class="container">
      <div class="col-sm-2" style="padding-right:0px; margin-top:5px; padding-top:15px; margin-left:-20px; ">
        <div class="row">
			<form action="logout">
				<button type="submit" class="btn btn-default search-btn ">Yes</button>
			</form>
        </div>
      </div>
            <div class="row">
      <div class="col-sm-3" style="padding-right:15px; margin-top:5px; padding-top:15px;">
          <button type="submit" class="btn btn-default search-btn">No</button>
        </div>
  </div>
  </div>
</section>
  </div>
        </div>
        </div>
        </div>
        </div>
	<div id="timeDiv" style="display:none; "  >
		<label id="SessionTimeLb" style="float:left;">SessionTime: </label>
		<p id="time" ></p>
	</div>

                
             
