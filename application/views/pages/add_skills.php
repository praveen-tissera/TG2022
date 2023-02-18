<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

</script>


<div id="myContainerr">
    <?php    if(isset($info)){ if(sizeof($info)){		 ?>
        <table id="myTable" class="display table table-striped table-bordered" cellspacing="0" width="100%" margin-left="15px">
            <thead>
                <tr>
                    <th>user Name</th>
                    <th>Skill Name</th>
                    <th>Skill Level</th>
                    <th>Years of Experience</th>
                </tr>

            </thead>
            <tbody>
                <?php   foreach($info as $user) {  			 ?>
                    <tr>
                        <td>
                            <?php echo $user->username ?>
                        </td>
                        <td>
                            <?php echo $user->skillName ?>
                        </td>
                        <td>
                            <?php echo $user->skillLevel ?>
                        </td>
                        <td>
                            <?php echo $user->experienceYears ?>
                        </td>
                    </tr>
                    <?php
}
?>
            </tbody>

            <tfoot>
                <tr>
                    <th>Skill Name</th>
                    <th>Skill Level</th>
                    <th>Years of Experience</th>
                </tr>
            </tfoot>
        </table>
        <?php
}else{ ?>
            <h3>There are no skills in the database yet for that user.</h3>
            <br/>
            <?php } 
}else{ ?>
                <h3>There are no skills in the database yet for that user.</h3>
                <br>
                <?php } ?>

                    <br/>
<?php  echo validation_errors();   echo form_open("add-skills/".$username);
              ?>
                    <div class="col-sm-12">

                        <div class="row">
                            <div class="col-lg-12 noPadding ">
                                <div class="input-group " id="skillSelect">
                                    <div class="col-sm-4 ">
                                        <label for="skillName">Skill:</label>
                                        <select class="form-control" id="skillName">
                                            
                                            <?php foreach($skills['names'] as $skillName) { ?>
                                                <option >
                                                    <?php  echo  $skillName['skillName']; ?>
                                                </option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 ">
                                        <label for="skillLevel">Level:</label>
                                        <select class="form-control" id="skillLevel">
                                            <?php foreach($skills['levels'] as $skillLevel) { ?>
                                                <option>
                                                    <?php echo($skillLevel['level']);?>
                                                </option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 ">
                                        <label for="expYears">Years of Experience:</label>
                                        <input type="number" id="experience" value="0" min="0" class="form-control"/>
                                    </div>
                                    <div class=" input-group-btn noPadding">
                                        <button id="addSkill" type="button" class="btn btn-primary  ">Add Skill</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <br>

                        <div class="">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Skills</h3>
                                </div>

                                <div class="panel-body">
                                    Please choose the new skills to add to this persons' profile.
                                    <label for="newSkills">* Skills Required:</label>
                                    <ul class="list-group well well-sm pre-scrollable tested" style="max-height: 240px; overflow-y:auto;" id="newSkills">
                                    </ul>
                                    <button id="delSkill" type="button" class="btn btn-danger">Delete</button>
                                </div>
                            </div>


                        </div>


                        <br>
                        <!--            TAKE SELECTED from below AND INSERT above-->

                        <br>
                        <br>

                        <script>
                            var i = 0;
                            $("#addSkill").click(function() {
                                $("#newSkills").append(' <li value="' + $("#skillName").val() + ' " class="list-group-item skill ">' + $("#skillName").val() + 
                                    '<span class="label label-primary pull-right">' + ($("#skillLevel option:selected").index() + 1) + 
                                    '</span><span class="label label-success pull-right">' + $("#experience").val() + '</span>' + 
                                    '<input type="hidden"  name="skill['+ i +'][accountID]" value=" <?php echo $acc; ?> "/> ' +
                                    '<input type="hidden"  name="skill['+ i +'][skillID]" value="' + ($("#skillName option:selected").index() + 1) + ' "/> ' +
                                    '<input type="hidden"  name="skill['+ i +'][skillLevel]" value="' + ($("#skillLevel option:selected").index() + 1) + ' "/> ' + 
                                    '<input type="hidden"  name="skill['+ i +'][experienceYears]" value="' + $("#experience").val() + ' "/> ' + '</li>');
                                                                i++;

                            });
                            
                            $("#delSkill").click(function() {
                                $("#newSkills .selected").remove();
                            });

                            $("#newSkills").on("click", ".skill", function(e) {
                                $(".selected").css("background","#fff");
                                $(this).parent().children().removeClass("selected");
                                $(this).addClass("selected");
                                $(this).css("background","#007");
                                //~ .clone()    //clone the element
                                //~ .children() //select all the children
                                //~ .remove()   //remove all the children
                                //~ .end()  //again go back to selected element
                                //~ .text() );

                            });

                        </script>


                    </div>
            <button id="addSkills" type="submit" class="btn btn-primary  ">Add Listed Skills</button>
    </form>
</div>
