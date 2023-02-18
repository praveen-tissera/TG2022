<div id="myContainerr">
	
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
                <th>First Name</th>
                <th>Second Name</th>
                <th>Day rate</th>
            </tr>
 
     </thead>
     <tbody>
<?php   foreach($info as $person) {  ?>
        <tr>
            <td><a href=" <?php echo base_url() ; echo "index.php/find_profile/"; echo $person->username; ?>"</a><?php echo $person->firstname ?></td>
            <td><?php echo $person->lastname ?></td>
            <td><?php echo $person->dayRate ?></td>
            <td><a href=" <?php echo base_url() ; echo "add-skills/"; echo $person->username; ?>"</a><?php echo "Add Skill" ?></td>

        </tr>
 <?php
}
?>
    </tbody>
 
     <tfoot>
            <tr>
                <th>First Name</th>
                <th>Second Name</th>
                <th>Day rate</th>
            </tr>
        </tfoot>
    </table>
</div>
