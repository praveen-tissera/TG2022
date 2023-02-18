

<section>
<div class="jumbotron">


<h1>Role Selection</h1>
<br>
<br>
<style type="text/css">

.list-group-item.active {
	background-color: #ABB7B7;
	border-color: #ABB7B7;
}

li .active {
	background-color: orange;
}

</style>


		<?php 
		//~ echo "<pre>";
		//~ print_r($roles);
				//~ echo "<br>";
		//~ print_r($candidates);
						//~ echo "<br>matches  ";
		//~ print_r($match);
		//~ echo "</pre>";

		?>

	

<!--
	<section class="col-md-3">
-->

		<h1>Tasks</h1>
		<br>
		<?php 
		$roleNumber = 0;
		$taskNumber = 0;
		$currentTask = $tasks[0]['taskID'];
		$currentRole = $roles[$taskNumber][$roleNumber]['roleID'];
		//~ echo $currentRole;
		 ?>






<!--
	</section>
-->
	 


	<section class="row" style="background-color: #ABB7B7;">
		<?php 
		echo form_open('project_allocation/');
		?>
		<div class="alert alert-info text-center" role="alert">
			<h3>Confirm Allocated Roles</h3>
			<h4> <?php echo validation_errors(); ?> </h4>
		</div>
		<div class="">


			<div id="sticky" class="">

				<ul class="nav nav-tabs nav-menu" role="tablist">
   			 	<?php 
   			 	$i=0;

   			 	foreach($roles as $role){
					if(empty($role)) 
						continue;
					foreach($role as $r){
							if($currentRole == $r['roleID'])
   			 				{ ?>
								<li class="active">
									  <a href="#tab<?php echo $i; ?>" role="tab" data-toggle="tab">
										  <i class="fa fa-male"></i> <?php echo $r['roleName'];?>
									  </a>
								</li>


			   		<?php   }

							else
							{ ?>
								<li><a href="#tab<?php echo $i; ?>"role="tab" data-toggle="tab">
								  <i class="fa fa-key"></i><?php echo $r['roleName'];?>
								  </a>
								</li>

								<?php
							}
							$i++;
						}
			   		}	
			   			?>
					</ul><!--nav-tabs close-->


			<div class="tab-content">
	<?php 
	$i =0;
	foreach($roles as $role){
			if(empty($role)) 
				continue;
				$j =-1;
			foreach($role as $r){
				if($currentRole == $r['roleID']){
				?>
				<div class="tab-pane fade active in" id="tab<?php echo $i ?>">
					<div class="container">
						<div class="col-sm-11" style="float:left;">
							<div class="hve-pro">
							</div><!--hve-pro close-->
						</div><!--col-sm-12 close-->
						<br clear="all" />
						<div class="row">
														
							<div>
								<h1>Selected Staff:</h1>
								<p>Please select employees for each role.</p>
								<br>
								<div class="row">
									
										<?php 
										 if(isset($match)){
										 foreach($match as $m){
											$j++;
											
												if($m['roleID'] == $r['roleID']){
											 ?>
											  <div class="col-sm-6 col-md-4">
												<div class="thumbnail">
												  <div class="caption">
													<h2>Employee Name</h2>
													<h4><?php echo $m['data']->firstname." ".$m['data']->lastname;  ?></h4>
													<h3>Employee Position</h3>
													<ul>
														<li>Skill 1</li>
														<li>Skill 2</li>
														<li>Skill 3</li>
													</ul>
													<input hidden name='assign[<?php echo $j; ?>][roleID]' value='<?php echo $m['roleID'];  ?>' >
													<input hidden name='assign[<?php echo $j; ?>][accountID]' value='<?php echo $m['accountID']  ?>' >
													<p><a href="#" class="btn btn-danger btn-xs" role="button">Remove</a> </p>
												  </div>
												</div>
											  </div>
									<?php			

												}
											} 
										}else{ ?>
												<div class="alert alert-info text-center" role="alert">
													<h3>Confirm Allocated Roles</h3>
													<h4> <?php echo validation_errors(); ?> </h4>
												</div>
											
		<?php								}
											
											?>
											  
										</div>
								
								<br>
								<h1>Matching staff for role</h1>
								<br>
								<div class="bs-example">
									<table  class="table table-border"   style="background-color: white; ">
										<thead>
											<tr >
												<th>First Name</th>
												<th>Last Name</th>
												<th>City</th>
												<th>Postcode</th>
												<td>  </td>

											</tr>
										</thead>
										<tbody>
											<?php 
											foreach ($candidates as $c)
											 { 
												 if($c['roleID']== $r['roleID'])
												 {
													foreach($c['candidates'] as $oneC){
												 ?>
												
								
											<tr>
												
												<td><?php echo $oneC->firstname;?></td>
												<td><?php echo $oneC->lastname;?></td>
												<td><?php echo $oneC->city;?></td>
												<td><?php echo $oneC->postcode;?></td>


												<td><button id="submit" name="submit" type="submit" class="btn btn-success btn-xs">Add to role</button></td>
											</tr>
								

										   <?php }
										     }
										   } ?>
										</tbody>
									</table>
								</div>
							
							</div>
						</div>
					</div>
				</div>
			<?php 
					}else{
			?>
				<div class="tab-pane fade" id="tab<?php echo $i ?>">
					<div class="container">
						<div class="col-sm-11" style="float:left;">
							<div class="hve-pro">
							</div><!--hve-pro close-->
						</div><!--col-sm-12 close-->
						<br clear="all" />
						<div class="row">
							<div>
								<h1>Selected Staff:</h1>
								<p>Please select employees for each role.</p>
								<br>
								<div class="row">
										<?php foreach($match as $m){
												if($m['roleID'] == $r['roleID']){
													
											 ?>
											  <div class="col-sm-6 col-md-4">
												<div class="thumbnail">
												  <div class="caption">
													<h2>Employee Name</h2>
													<h4><?php echo $m['data']->firstname." ".$m['data']->lastname;  ?></h4>
													<h3>Employee Position</h3>
													<ul>
														<li>Skill 1</li>
														<li>Skill 2</li>
														<li>Skill 3</li>
													</ul>
													<input hidden name='assign[<?php echo $j; ?>][roleID]' value='<?php echo $m['roleID'];  ?>' >
													<input hidden name='assign[<?php echo $j; ?>][accountID]' value='<?php echo $m['accountID']  ?>' >
													<p><a href="#" class="btn btn-danger btn-xs" role="button">Remove</a> </p>
												  </div> 
												</div>
											  </div>
									<?php			
												}
											} ?>
											  
										</div>
								
							<br>
								<h1>Matching staff for role</h1>
								<br>
								<div class="bs-example">
									<table  class="table table-border"   style="background-color: white; ">
										<thead>
											<tr >
												<th>First Name</th>
												<th>Last Name</th>
												<th>City</th>
												<th>Postcode</th>
												<td>  </td>

											</tr>
										</thead>
										<tbody>
											<?php 
											foreach ($candidates as $c)
											 { 
												 if($c['roleID']== $r['roleID'])
												 {
													foreach($c['candidates'] as $oneC){
												 ?>
												
								
											<tr>
												
												<td><?php echo $oneC->firstname;?></td>
												<td><?php echo $oneC->lastname;?></td>
												<td><?php echo $oneC->city;?></td>
												<td><?php echo $oneC->postcode;?></td>


												<td><button id="submit" name="submit" type="submit" class="btn btn-success btn-xs">Add to role</button></td>
											</tr>
								

										   <?php }
										     }
										   } ?>
										</tbody>
									</table>
								</div>
							
							</div>
						</div>
					</div>
				</div>
			<?php 
					}
				$i++;
				}
			}
			
			?>
			</div>
		</div>



					<!-- Button -->

				


		</div>

		



		<div class="form-group">
		  <div class="col-md-9 control-label">
			<button id="nextRole" name="submit" type="submit" class="btn btn-primary btn-lg">Complete Allocation</button>
		  </div>
		</div>
	</section>


</div>

</section>

<!--
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
</section>-->
