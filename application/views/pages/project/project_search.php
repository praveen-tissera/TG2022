
<?php echo form_open('search_project'); ?>

	<select name = "fields" >
		<option value="title">Project title</option>
		<option value="firstname">Manager's first name</option>
		<option value="lastname">Manager's last name</option>
		<option value="projectTypeID">Project type</option>
		<option value="startDate">Starting date</option>
		<option value="endDate">Ending date</option>

	
	</select>

	<input type="text" name="search" placeholder="Type to search..." size="50"> 
	
	<input type="submit" value="submit">

<?php if(isset($query)) { ?>
<table>
	<?php foreach($query as $q){ ?>
	<tr>

		<td> <?php echo ' __ '; echo $q->title; ?></td>
		<td> <?php echo ' __ '; echo $q->firstname; ?></td>
		<td> <?php echo ' __ '; echo $q->lastname; ?></td>
		<td> <?php echo ' __ '; echo $q->projectTypeID; ?></td>
		<td> <?php echo ' __ '; echo $q->startDate; ?></td>
		<td> <?php echo ' __ '; echo $q->endDate; ?></td>
		<td>__<a href=" <?php echo base_url() ; echo "index.php/find_project/"; echo $q->projectID; ?>"> Project</a></td>
	</tr>
	<div>
	</div>
	<?php } ?>
</table>
<?php } ?>
<?php echo form_close(); ?>