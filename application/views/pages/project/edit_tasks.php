<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style type="text/css">
        .row {
            margin-top: 40px;
            padding: 0 10px;
        }

        .clickable {
            cursor: pointer;
        }

        .panel-heading span {
            margin-top: -20px;
            font-size: 15px;
        }
    </style>
</head>

<div class="container-fluid">
    <div class="alert alert-info text-center" role="alert">
        <h3>Create Project tasks and assign roles to the tasks</h3>
        <strong>(Project must contain at least one task)</strong>
        <h4> </h4>
    </div>
    <?php echo form_open('edit_tasks/' . $projectID); ?>

    <div class="row">
        <div class="col-lg-12 noPadding ">
            <div class="input-group " id="skillSelect">
                <div class="col-sm-1 ">
                    <label>Task Id:</label>
                    <input type="text" name='taskId' id='taskId' value="0" placeholder='Task Id' class="form-control" readonly>
                </div>
                <div class="col-sm-5 ">
                    <label>Task Title:</label>
                    <input type="text" name="taskTitle" id="taskTitle" placeholder="Task Title" class="form-control">
                </div>
                <div class="col-sm-2">
                    <label>Start Date:</label>
                    <input type="text" class="form-control hasDatepicker" placeholder="Start date" name="startDate" id="datepicker">
                </div>
                <div class="col-sm-2 ">
                    <label>End Date:</label>
                    <input type="text" class="form-control hasDatepicker" placeholder="End date" name="endDate" id="datepicker2">
                </div>
                <div class="col-sm-2 ">
                    <label>Number of Roles in task:</label>
                    <input type="number" id="numOfPeople" value="1" min="1" class="form-control">
                </div>
                <div class=" input-group-btn noPadding">
                    <button id="create_task" type="button" class="btn btn-default  ">Create Task</button>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Tasks</h3>
            </div>

            <div class="panel-body">
                Please allocate a member of staff to every task role in the project.
                <!--            <input type="text" class="form-control" name="taskTitle">-->




                <ul class="list-group well well-sm pre-scrollable tested" style="max-height: 800px; overflow-y:auto;" id="projectTasks">



                    <?php
                    $taskNo = 0;
                    // print_r($tasks);
                    foreach ($tasks as $task) { //echo $taskNo;
                    ?>


                        <li id="pTask<?php echo $taskNo; ?>" onclick="selectTask(<?php echo $taskNo; ?>)" class="">

                            <div id="taskcon" class="panel panel-primary">
                                <div class="panel-heading task foundit" name="task[0]" style="background: rgb(51, 122, 183);"> Task: <?php echo $task['title']; ?> Start Date:<?php echo $task['startDate']; ?> End Date :<?php echo $task['endDate']; ?> Number Of Roles : <?php echo sizeof($roles[$taskNo]) ?> <a data-toggle="collapse" href="http://137.195.15.99/~gg3/index.php/edit_tasks#<?php echo $task['taskID']; ?>" style="color: #C0C0C0;" class="collapsed" aria-expanded="false"> Click to exand/collapse </a> </div>

                                <div id="<?php echo $task['taskID']; ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">


                                    <?php
                                    $roleNo = 0;
                                    foreach ($roles[$taskNo] as $role) {


                                    ?>





                                        <div id="first_task_roles" class="panel-body">
                                            <input name="task[<?php echo $taskNo; ?>][taskID]" type="text" value="<?php echo $task['taskID']; ?>" hidden="">
                                            <input name="task[<?php echo $taskNo; ?>][role][<?php echo $roleNo; ?>][roleID]" type="text" value="<?php echo $role['roleID']; ?>" hidden="">
                                            <input name="task[<?php echo $taskNo; ?>][title]" type="text" value="<?php echo $task['title']; ?>" hidden="">
                                            <input name="task[<?php echo $taskNo; ?>][startDate]" type="text" value="<?php echo $task['startDate']; ?>" hidden="">
                                            <input name="task[<?php echo $taskNo; ?>][endDate]" type="text" value="<?php echo $task['endDate']; ?> " hidden="">

                                            <div class="" id="first_task_table">
                                                <label class="text-center">Role Title</label>
                                                <label class="text-center">Number of People</label>
                                                <div class="panel panel-danger" name="0_0" id="first_task0">
                                                    <div class="panel-heading role">Role <?php echo $roleNo + 1; ?></div>
                                                    <div>
                                                        <input name="task[<?php echo $taskNo; ?>][role][<?php echo $roleNo; ?>][name]" type="text" placeholder="Role Title" class="form-control input-md" value="<?php echo $role['roleName'];   ?>">
                                                    </div>
                                                    <div>
                                                        <input name="task[<?php echo $taskNo; ?>][role][<?php echo $roleNo; ?>][numPeople]" placeholder="1" type="number" class="form-control input-md" value="<?php echo $role['numPeople'];    ?>">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 noPadding ">
                                                            <div class="input-group " id="skillSelect">
                                                                <div class="col-sm-5 ">
                                                                    <label for="skillName">Skill:</label>
                                                                    <select class="form-control" id="skillName0_0">
                                                                        <option>Planner</option>
                                                                        <option>Architect</option>

                                                                        <!-- <option> IT governance </option>
                                                                        <option> IT strategy and planning </option>
                                                                        <option> Information management </option>
                                                                        <option> Information systems coordination </option>
                                                                        <option> Information security </option>
                                                                        <option> Information assurance </option>
                                                                        <option> Analytics </option>
                                                                        <option> Information content publishing </option>
                                                                        <option> Consultancy </option>
                                                                        <option> Technical specialism </option>
                                                                        <option> Research </option>
                                                                        <option> IT management </option>
                                                                        <option> Financial management </option>
                                                                        <option> Innovation </option>
                                                                        <option> Business process improvement </option>
                                                                        <option> Enterprise and business architecture </option>
                                                                        <option> Business risk management </option>
                                                                        <option> Sustainability strategy </option>
                                                                        <option> Emerging technology monitoring </option>
                                                                        <option> Continuity management </option>
                                                                        <option> Sustainability management </option>
                                                                        <option> Network planning </option>
                                                                        <option> Solution architecture </option>
                                                                        <option> Data management </option>
                                                                        <option> Methods and tools </option>
                                                                        <option> Portfolio management </option>
                                                                        <option> Programme management </option>
                                                                        <option> Project management </option>
                                                                        <option> Portfolio, programme and project support </option>
                                                                        <option> Business analysis </option>
                                                                        <option> Requirements definition and management </option>
                                                                        <option> Business process testing </option>
                                                                        <option> Change implementation planning and management </option>
                                                                        <option> Organisation design and implementation </option>
                                                                        <option> Benefits management </option>
                                                                        <option> Business modelling </option>
                                                                        <option> Sustainability assessment </option>
                                                                        <option> Systems development management </option>
                                                                        <option> Data analysis </option>
                                                                        <option> Systems design </option>
                                                                        <option> Network design </option>
                                                                        <option> Database design </option>
                                                                        <option> Programming/software development </option>
                                                                        <option> Animation development </option>
                                                                        <option> Safety engineering </option>
                                                                        <option> Sustainability engineering </option>
                                                                        <option> Information content authoring </option>
                                                                        <option> Testing </option>
                                                                        <option> User experience analysis </option>
                                                                        <option> User experience design </option>
                                                                        <option> User experience evaluation </option>
                                                                        <option> Systems integration </option>
                                                                        <option> Porting/software configuration </option>
                                                                        <option> Hardware design </option>
                                                                        <option> Systems installation/decommissioning </option>
                                                                        <option> Availability management </option>
                                                                        <option> Service level management </option>
                                                                        <option> Service acceptance </option>
                                                                        <option> Configuration management </option>
                                                                        <option> Asset management </option>
                                                                        <option> Change management </option>
                                                                        <option> Release and deployment </option>
                                                                        <option> System software </option>
                                                                        <option> Capacity management </option>
                                                                        <option> Security administration </option>
                                                                        <option> Penetration testing </option>
                                                                        <option> Radio frequency engineering </option>
                                                                        <option> Application support </option>
                                                                        <option> IT Infrastructure </option>
                                                                        <option> Database administration </option>
                                                                        <option> Storage management </option>
                                                                        <option> Network support </option>
                                                                        <option> Problem management </option>
                                                                        <option> Incident management </option>
                                                                        <option> Facilities management </option>
                                                                        <option> Learning and development management </option>
                                                                        <option> Learning assessment and evaluation </option>
                                                                        <option> Learning design and development </option>
                                                                        <option> Learning delivery </option>
                                                                        <option> Teaching and subject formation </option>
                                                                        <option> Performance management </option>
                                                                        <option> Resourcing </option>
                                                                        <option> Professional development </option>
                                                                        <option> Quality management </option>
                                                                        <option> Quality assurance </option>
                                                                        <option> Quality standards </option>
                                                                        <option> Conformance review </option>
                                                                        <option> Safety assessment </option>
                                                                        <option> Digital forensics </option>
                                                                        <option> Sourcing </option>
                                                                        <option> Contract management </option>
                                                                        <option> Relationship management </option>
                                                                        <option> Customer service support </option>
                                                                        <option> Digital marketing </option>
                                                                        <option> Selling </option>
                                                                        <option> Sales support </option>
                                                                        <option> Product management </option> -->
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-3 ">
                                                                    <label for="skillLevel">Level:</label>
                                                                    <select class="form-control" id="skillLevel0_0">
                                                                    <option>1</option>  
                                                                    <option>2</option>  
                                                                        <!-- <option> Follow </option>
                                                                        <option> Assist </option>
                                                                        <option> Apply </option>
                                                                        <option> Enable </option>
                                                                        <option> Ensure, advise </option>
                                                                        <option> Initiate, influence </option>
                                                                        <option> Set strategy, inspire, mobilise </option> -->
                                                                    </select>
                                                                </div>
                                                                <div class=" input-group-btn noPadding">
                                                                    <button id="addSkill" type="button" onclick="addskill(0,0)" class="btn btn-default  ">Add Skill</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="">
                                                        <div class="panel panel-info">
                                                            <div class="panel-heading">
                                                                <h3 id="titleSkills" class="panel-title">Skills</h3>
                                                            </div>
                                                            <div class="panel-body">Please choose the skills required for the project, the level of proficiency needed for each skill and the number of people which will need to hold it.
                                                                <label for="projectSkills">* Skills Required:</label>
                                                                <ul class="list-group well well-sm pre-scrollable tested" style="max-height: 240px; overflow-y:auto;" id="projectSkills0_0">



                                                                    <?php
                                                                    $skillNo = 0;

                                                                    // echo $skills[0]['skillName'];
                                                                    foreach ($skills[$taskNo][$roleNo] as $skill) { ?>



                                                                        <li id="pSkills0_0_0" value="Analytics " onclick="selectSkill(0,0,0)" class="list-group-item skill" style="background: rgb(255, 255, 255); color: rgb(0, 0, 0);"><?php echo $skill['skillName']; ?><span class="label label-primary pull-right"><?php echo $skill['skillLevel']; ?></span>
                                                                            <input type="number" hidden="" name="task[<?php echo $taskNo ?>][role][<?php echo $roleNo ?>][skill][<?php echo $skillNo ?>][skillID]" value="<?php echo $skill['skillID']; ?>">
                                                                            <input type="number" hidden="" name="task[<?php echo $taskNo ?>][role][<?php echo $roleNo ?>][skill][<?php echo $skillNo ?>][skillLevel]" value="<?php echo $skill['skillLevel']; ?>">
                                                                        </li>


                                                                    <?php
                                                                        $skillNo++;
                                                                    }

                                                                    //echo $skills[0]['skillName'];
                                                                    ?>


                                                                </ul>
                                                                <button id="delSkill" type="button" onclick="delskill(0,0)" class="btn btn-primary">Delete Skill</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    <?php
                                        $roleNo++;
                                    }
                                    ?>

                                </div>
                            </div>
                        </li>


                    <?php
                        $taskNo++;
                    }
                    ?>


                </ul>




                <button id="delTask" type="button" class="btn btn-primary">Delete Task</button>
            </div>
        </div>


    </div>
</div>

<br>
<br>
<br>

<script>
    var taskNum = 0;
    $("#create_task").click(function() {
        var title = $("#taskTitle").val();
        var j = $("#numOfPeople").val();
        var i;
        var newtitle = title.replace(" ", "_");
        if (!$("[name='taskTitle']").val()) {
            alert("Please enter a Task Title.");
            return;
        }
        if (!$("[name='startDate']").val()) {
            alert("Please enter a Start Date.");
            return;
        }
        if (!$("[name='endDate']").val()) {
            alert("Please enter an End Date.");
            return;
        }
        if ($("#" + newtitle).length) {
            alert("A task with the name '" + newtitle + "' already exists.\nPlease enter a unique title.");
            return;
        }
        $("#projectTasks").append('<li id="pTask' + taskNum + '"  onClick="selectTask(' + taskNum + ')" > <div id="taskcon" class="panel panel-primary"> ' +
            '<div class="panel-heading task"   name="task[' + taskNum + ']"> ID: ' + taskNum + '  Task: ' + title + '   Start Date:' + $("#datepicker").val() + '       End Date :' + $("#datepicker1").val() + '       Number Of Roles : ' + $("#numOfPeople").val() + ' <a data-toggle="collapse"  href="#' + taskNum + '"  style="color: #C0C0C0;" >  Click to exand/collapse </a>     </div>' +
            '<div id="' + taskNum + '" class="panel-collapse collapse">' +
            '<div id="' + taskNum + '_roles" class="panel-body">	' +
            '<input name="task[' + taskNum + '][title]" type="text" value="' + newtitle + '" hidden > </input>' +
            '<input name="task[' + taskNum + '][startDate]" type="text" value="' + $("#datepicker").val() + '"  hidden > </input>' +
            '<input name="task[' + taskNum + '][endDate]" type="text" value="' + $("#datepicker1").val() + '" hidden > </input>' +

            '<div class="" id="' + taskNum + '_table"> ' +
            '<label class="text-center">Role Title</label>' +
            '<label class="text-center">Number of People</label>' +
            '</div id="roletable"></div></li>');

        for (i = 0; i < j; i++) {
            $('#' + taskNum + '_table').append('<div class ="panel panel-danger" name="' + taskNum + '_' + i + '" id="' + taskNum + '' + i + '"><div class="panel-heading role">Role ' + (i + 1) + '</div>' +
                '<div><input name="task[' + taskNum + '][role][' + i + '][name]" type="text" placeholder="Role Title" class="form-control input-md"/> </div>' +
                '<div><input name="task[' + taskNum + '][role][' + i + '][numPeople]" placeholder="Number of people in this role" type="number" class="form-control input-md"/> </div>' +
                '<div class="row">' +
                '<div class="col-lg-12 noPadding ">' +
                '<div class="input-group " id="skillSelect">' +
                '<div class="col-sm-5 ">' +
                '<label for="skillName" >Skill:</label>' +
                '<select class="form-control" id="skillName' + taskNum + '_' + i + '">' +
                <?php foreach ($skills[0][0] as $skillName) { ?> '<option> <?php echo $skillName["skillName"]; ?> </option>' +
                <?php } ?> '</select>' +
                '</div>' +
                '<div class="col-sm-3 ">' +
                '<label for="skillLevel" >Level:</label>' +
                '<select class="form-control" id="skillLevel' + taskNum + '_' + i + '">' +
                <?php foreach ($skills[0][0] as $skillLevel) { ?> '<option> <?php echo ($skillLevel['skillLevel']); ?> </option>' +
                <?php } ?> '</select>' +
                '</div>' +
                '<div class=" input-group-btn noPadding">' +
                '<button id="addSkill" type="button" onclick="addskill(' + taskNum + ',' + i + ')" class="btn btn-default  ">Add Skill</button>' +
                '</div>' +
                '</div>' +
                '</div>' +

                '</div>' +
                '<br>' +
                '<div class="">' +
                '<div class = "panel panel-info">' +
                '<div class = "panel-heading">' +
                '<h3 id="titleSkills" class = "panel-title">Skills</h3>' +
                '</div>' +

                ' <div class = "panel-body">' +
                'Please choose the skills required for the project, the level of proficiency needed for each skill and the number of people which will need to hold it.' +
                '<label for="projectSkills">* Skills Required:</label>' +
                '<ul class="list-group well well-sm pre-scrollable tested" style="max-height: 240px; overflow-y:auto;"  id="projectSkills' + taskNum + '_' + i + '">' +
                '</ul>' +
                '<button id="delSkill" type="button" onclick="delskill(' + taskNum + ',' + i + ')" class="btn btn-primary">Delete Skill</button>' +
                '</div>' +
                ' </div>' +
                '</div></tr>');
        }
        taskNum = taskNum + 1;

        document.getElementById('taskId').value = taskNum;
    });

    $("#edit_task").click(function() {
        var title = $("#taskTitle").val();
        var j = $("#numOfPeople").val();
        var i;
        var newtitle = title.replace(" ", "_");
        if (!$("[name='taskTitle']").val()) {
            alert("Please enter a Task Title.");
            return;
        }
        if (!$("[name='startDate']").val()) {
            alert("Please enter a Start Date.");
            return;
        }
        if (!$("[name='endDate']").val()) {
            alert("Please enter an End Date.");
            return;
        }
        if ($("#" + newtitle).length) {
            alert("A task with the name '" + newtitle + "' already exists.\nPlease enter a unique title.");
            return;
        }
        $("#projectTasks").append('<li id="pTask' + taskNum + '"  onClick="selectTask(' + taskNum + ')" > <div id="taskcon" class="panel panel-primary"> ' +
            '<div class="panel-heading task"   name="task[' + taskNum + ']"> Task: ' + title + '   Start Date:' + $("#datepicker").val() + '       End Date :' + $("#datepicker2").val() + '       Number Of Roles : ' + $("#numOfPeople").val() + ' <a data-toggle="collapse"  href="#' + newtitle + '"  style="color: #C0C0C0;" >  Click to exand/collapse </a>     </div>' +
            '<div id="' + newtitle + '" class="panel-collapse collapse">' +
            '<div id="' + newtitle + '_roles" class="panel-body">   ' +
            '<input name="task[' + taskNum + '][title]" type="text" value="' + newtitle + '" hidden > </input>' +
            '<input name="task[' + taskNum + '][startDate]" type="text" value="' + $("#datepicker").val() + '"  hidden > </input>' + '<input name="task[' + taskNum + '][endDate]" type="text" value="' + $("#datepicker2").val() + '" hidden > </input>' +

            '<div class="" id="' + newtitle + '_table"> ' +
            '<label class="text-center">Role Title</label>' +
            '<label class="text-center">Number of People</label>' +
            '</div id="roletable"></div></li>');

        for (i = 0; i < j; i++) {
            $('#' + newtitle + '_table').append('<div class ="panel panel-danger" name="' + taskNum + '_' + i + '" id="' + newtitle + '' + i + '"><div class="panel-heading role">Role ' + (i + 1) + '</div>' +
                '<div><input name="task[' + taskNum + '][role][' + i + '][name]" type="text" placeholder="Role Title" class="form-control input-md"/> </div>' +
                '<div><input name="task[' + taskNum + '][role][' + i + '][numPeople]" placeholder="1" type="number" class="form-control input-md"/> </div>' +
                '<div class="row">' +
                '<div class="col-lg-12 noPadding ">' +
                '<div class="input-group " id="skillSelect">' +
                '<div class="col-sm-5 ">' +
                '<label for="skillName" >Skill:</label>' +
                '<select class="form-control" id="skillName' + taskNum + '_' + i + '">' +
                '<option> IT governance </option>' +
                '<option> IT strategy and planning </option>' +
                '<option> Information management </option>' +
                '<option> Information systems coordination </option>' +
                '<option> Information security </option>' +
                '<option> Information assurance </option>' +
                '<option> Analytics </option>' +
                '<option> Information content publishing </option>' +
                '<option> Consultancy </option>' +
                '<option> Technical specialism </option>' +
                '<option> Research </option>' +
                '<option> IT management </option>' +
                '<option> Financial management </option>' +
                '<option> Innovation </option>' +
                '<option> Business process improvement </option>' +
                '<option> Enterprise and business architecture </option>' +
                '<option> Business risk management </option>' +
                '<option> Sustainability strategy </option>' +
                '<option> Emerging technology monitoring </option>' +
                '<option> Continuity management </option>' +
                '<option> Sustainability management </option>' +
                '<option> Network planning </option>' +
                '<option> Solution architecture </option>' +
                '<option> Data management </option>' +
                '<option> Methods and tools </option>' +
                '<option> Portfolio management </option>' +
                '<option> Programme management </option>' +
                '<option> Project management </option>' +
                '<option> Portfolio, programme and project support </option>' +
                '<option> Business analysis </option>' +
                '<option> Requirements definition and management </option>' +
                '<option> Business process testing </option>' +
                '<option> Change implementation planning and management </option>' +
                '<option> Organisation design and implementation </option>' +
                '<option> Benefits management </option>' +
                '<option> Business modelling </option>' +
                '<option> Sustainability assessment </option>' +
                '<option> Systems development management </option>' +
                '<option> Data analysis </option>' +
                '<option> Systems design </option>' +
                '<option> Network design </option>' +
                '<option> Database design </option>' +
                '<option> Programming/software development </option>' +
                '<option> Animation development </option>' +
                '<option> Safety engineering </option>' +
                '<option> Sustainability engineering </option>' +
                '<option> Information content authoring </option>' +
                '<option> Testing </option>' +
                '<option> User experience analysis </option>' +
                '<option> User experience design </option>' +
                '<option> User experience evaluation </option>' +
                '<option> Systems integration </option>' +
                '<option> Porting/software configuration </option>' +
                '<option> Hardware design </option>' +
                '<option> Systems installation/decommissioning </option>' +
                '<option> Availability management </option>' +
                '<option> Service level management </option>' +
                '<option> Service acceptance </option>' +
                '<option> Configuration management </option>' +
                '<option> Asset management </option>' +
                '<option> Change management </option>' +
                '<option> Release and deployment </option>' +
                '<option> System software </option>' +
                '<option> Capacity management </option>' +
                '<option> Security administration </option>' +
                '<option> Penetration testing </option>' +
                '<option> Radio frequency engineering </option>' +
                '<option> Application support </option>' +
                '<option> IT Infrastructure </option>' +
                '<option> Database administration </option>' +
                '<option> Storage management </option>' +
                '<option> Network support </option>' +
                '<option> Problem management </option>' +
                '<option> Incident management </option>' +
                '<option> Facilities management </option>' +
                '<option> Learning and development management </option>' +
                '<option> Learning assessment and evaluation </option>' +
                '<option> Learning design and development </option>' +
                '<option> Learning delivery </option>' +
                '<option> Teaching and subject formation </option>' +
                '<option> Performance management </option>' +
                '<option> Resourcing </option>' +
                '<option> Professional development </option>' +
                '<option> Quality management </option>' +
                '<option> Quality assurance </option>' +
                '<option> Quality standards </option>' +
                '<option> Conformance review </option>' +
                '<option> Safety assessment </option>' +
                '<option> Digital forensics </option>' +
                '<option> Sourcing </option>' +
                '<option> Contract management </option>' +
                '<option> Relationship management </option>' +
                '<option> Customer service support </option>' +
                '<option> Digital marketing </option>' +
                '<option> Selling </option>' +
                '<option> Sales support </option>' +
                '<option> Product management </option>' +
                '</select>' +
                '</div>' +
                '<div class="col-sm-3 ">' +
                '<label for="skillLevel" >Level:</label>' +
                '<select class="form-control" id="skillLevel' + taskNum + '_' + i + '">' +
                '<option> Follow </option>' +
                '<option> Assist </option>' +
                '<option> Apply </option>' +
                '<option> Enable </option>' +
                '<option> Ensure, advise </option>' +
                '<option> Initiate, influence </option>' +
                '<option> Set strategy, inspire, mobilise </option>' +
                '</select>' +
                '</div>' +
                '<div class=" input-group-btn noPadding">' +
                '<button id="addSkill" type="button" onclick="addskill(' + taskNum + ',' + i + ')" class="btn btn-default  ">Add Skill</button>' +
                '</div>' +
                '</div>' +
                '</div>' +

                '</div>' +
                '<br>' +
                '<div class="">' +
                '<div class = "panel panel-info">' +
                '<div class = "panel-heading">' +
                '<h3 id="titleSkills" class = "panel-title">Skills</h3>' +
                '</div>' +

                ' <div class = "panel-body">' +
                'Please choose the skills required for the project, the level of proficiency needed for each skill and the number of people which will need to hold it.' +
                '<label for="projectSkills">* Skills Required:</label>' +
                '<ul class="list-group well well-sm pre-scrollable tested" style="max-height: 240px; overflow-y:auto;"  id="projectSkills' + taskNum + '_' + i + '">' +
                '</ul>' +
                '<button id="delSkill" type="button" onclick="delskill(' + taskNum + ',' + i + ')" class="btn btn-primary">Delete Skill</button>' +
                '</div>' +
                ' </div>' +
                '</div></tr>');
        }
        taskNum = taskNum + 1;
    });

    function addskill(x, y) {
        $("#projectSkills" + x + "_" + y).append(' <li id="pSkills' + x + '_' + y + '_' + $("#projectSkills" + x + "_" + y + " li").length + '" value="' + $("#skillName" + x + "_" + y).val() + ' " onClick="selectSkill(' + x + ',' + y + ',' + $("#projectSkills" + x + "_" + y + " li").length + ')" class="list-group-item skill ">' + $("#skillName" + x + "_" + y).val() + '<span class="label label-primary pull-right">' + ($("#skillLevel" + x + "_" + y + " option:selected").index() + 1) + '</span>' + '<input type="number" hidden name="task[' + x + '][role][' + y + '][skill][' + $("#projectSkills" + x + "_" + y + " li").length + '][skillID]" value="' + ($("#skillName" + x + "_" + y + " option:selected").index() + 1) + '"/> ' + '<input type="number" hidden name="task[' + x + '][role][' + y + '][skill][' + $("#projectSkills" + x + "_" + y + " li").length + '][skillLevel]" value="' + ($("#skillLevel" + x + "_" + y + " option:selected").index() + 1) + '"/> ' + '</li>');
    };




    //$("#taskcon").append('<tr id="role'+ i +'"> <td>'+ i +'</td><td><input name="taskTitle" type="text" placeholder="Task Title" class="form-control input-md"/></td><td><input name="employeeName" type="text" placeholder="Employee Name" class="form-control input-md" /> </td></tr>'); }


    //<tbody><tr id="addr0"><td>1</td><td><input type="text" name="name0"  placeholder="Name" class="form-control"/></td><td><input type="text" class="form-control" placeholder="Start date" name="startDate0" id="datepicker" /></td><td><input type="text" class="form-control" placeholder="End date" name="endDate0" id="datepicker2" /></td><td><input type="number" id="rolesInTask" value="1" min="1" class="form-control"></td></tr></tbody> 



    // <li value="'+ $("#taskTitle").val() +'">' + $("#taskTitle").val() + '<span class="label label-primary pull-right">'     

    // <input type="text" ='name0'  placeholder='Name' class="form-control"/></td><td>





    /// Notes  id and name for role,  the skill required and the number of people wilth thtat sikill and their proficiency,  along with the employee id and name perhaps

    function delskill(x, y) {
        var r = confirm("Are you sure you would like to delete this task?");
        if (r == true)
            $("#projectSkills" + x + "_" + y + " .selectedSkill").remove();
    }


    $("#delTask").click(function() {
        $("#projectTasks .selected").remove();
    });

    function selectSkill(x, y, z) {
        $("#projectSkills" + x + "_" + y + "  .selectedSkill").css('background', '#fff');
        $("#projectSkills" + x + "_" + y + "  .selectedSkill").css('color', '#000');
        $("#projectSkills" + x + "_" + y + "  .selectedSkill").removeClass("selectedSkill");
        $("#pSkills" + x + "_" + y + "_" + z).addClass("selectedSkill");
        $("#pSkills" + x + "_" + y + "_" + z).css('background', '#007');
        $("#pSkills" + x + "_" + y + "_" + z).css('color', '#fff');
    }

    function selectTask(x) {
        $("#projectTasks .selected > div .task").css('background', '#337ab7');
        $("#projectTasks .selected ").removeClass("selected");
        $("#pTask" + x).addClass("selected");
        $("#pTask" + x + " > div  .task").addClass("foundit");
        $("#pTask" + x + " > div  .task").css('background', '#007');
    }
    //~ $("#delSkill").click(function() {
    //~ $("#projectSkills"+x+"_"+y+" .selected").remove();
    //~ });

    //~ $("#projectSkills"+x+"_"+y).on("click",".skill",function(e) {
    //~ $(this).parent().children().removeClass("selected");
    //~ $(this).addClass("selected");
    //~ });

    $(function() {
        $("#datepicker").datepicker({
            dateFormat: "dd/mm/yy",
            minDate: 0,
            onSelect: function(date) {
                var datepicker1 = $('#datepicker1');
                var startDate = $(this).datepicker('getDate');
                var minDate = $(this).datepicker('getDate');
                datepicker1.datepicker('setDate', minDate);
                startDate.setDate(startDate.getDate());
                datepicker1.datepicker('option', 'minDate', minDate);
                $(this).datepicker('option', 'minDate', minDate);
            }
        });
        $("#datepicker").datepicker();
        $("#datepicker").datepicker("option", "dateFormat", "dd/mm/yy");
    });

    $(function() {
        $("#datepicker2").datepicker();
        $("#datepicker2").datepicker("option", "dateFormat", "dd/mm/yy");

    });
</script>





<button type="submit" class="btn btn-success btn-lg">Go Forward</button>

</form>








<div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" style="position: absolute; top: 544px; left: 1076.31px; z-index: 4; display: none;">
    <div class="ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all"><a class="ui-datepicker-prev ui-corner-all" data-handler="prev" data-event="click" title="Prev"><span class="ui-icon ui-icon-circle-triangle-w">Prev</span></a><a class="ui-datepicker-next ui-corner-all" data-handler="next" data-event="click" title="Next"><span class="ui-icon ui-icon-circle-triangle-e">Next</span></a>
        <div class="ui-datepicker-title"><span class="ui-datepicker-month">April</span>&nbsp;<span class="ui-datepicker-year">2017</span></div>
    </div>
    <table class="ui-datepicker-calendar">
        <thead>
            <tr>
                <th scope="col" class="ui-datepicker-week-end"><span title="Sunday">Su</span></th>
                <th scope="col"><span title="Monday">Mo</span></th>
                <th scope="col"><span title="Tuesday">Tu</span></th>
                <th scope="col"><span title="Wednesday">We</span></th>
                <th scope="col"><span title="Thursday">Th</span></th>
                <th scope="col"><span title="Friday">Fr</span></th>
                <th scope="col" class="ui-datepicker-week-end"><span title="Saturday">Sa</span></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">1</a></td>
            </tr>
            <tr>
                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">2</a></td>
                <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">3</a></td>
                <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">4</a></td>
                <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">5</a></td>
                <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">6</a></td>
                <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">7</a></td>
                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">8</a></td>
            </tr>
            <tr>
                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">9</a></td>
                <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">10</a></td>
                <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">11</a></td>
                <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">12</a></td>
                <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">13</a></td>
                <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">14</a></td>
                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">15</a></td>
            </tr>
            <tr>
                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">16</a></td>
                <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">17</a></td>
                <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">18</a></td>
                <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">19</a></td>
                <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">20</a></td>
                <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">21</a></td>
                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">22</a></td>
            </tr>
            <tr>
                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">23</a></td>
                <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">24</a></td>
                <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">25</a></td>
                <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">26</a></td>
                <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">27</a></td>
                <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">28</a></td>
                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">29</a></td>
            </tr>
            <tr>
                <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/edit_tasks#">30</a></td>
                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                <td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
            </tr>
        </tbody>
    </table>
</div>