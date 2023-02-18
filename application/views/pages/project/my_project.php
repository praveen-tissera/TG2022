<div class="container">
	
<script>
$(document).ready(function() {
    $('#myTable').DataTable();
} );
 
</script>

<script>
	$(function(){
    $('.table tr[data-href]').each(function(){
        $(this).css('cursor','pointer').hover(
            function(){ 
                $(this).addClass('active'); 
            },  
            function(){ 
                $(this).removeClass('active'); 
            }).click( function(){ 
                document.location = $(this).attr('data-href'); 
            }
        );
    });
});
</script>


<table id="myTable" class="display table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
             <tr>
                <th>Title</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Budget</th>
            </tr>
 
     </thead>
     <tbody>
<?php   foreach($info as $project) {  ?>
        <tr>
            <td><a href=" <?php echo base_url() ; echo "index.php/find_project/"; echo $project->projectID; ?>"</a><?php echo $project->title ?></td>
            <td><?php echo $project->startDate ?></td>
            <td><?php echo $project->endDate ?></td>
            <td><?php echo $project->budget ?></td>
        </tr>
 <?php
}
?>
    </tbody>
 
     <tfoot>
            <tr>
                <th>Title</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Budget</th>
            </tr>
        </tfoot>
    </table>
</div>
