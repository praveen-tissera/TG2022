<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
} else {
    header("location: login");
}
?>

<head>
    <?php $this->load->view('head'); ?>
    <title>User Page</title>
    <style>
        h4{
            color:black;
        }
        div>h4:hover{
            font-size:30px;
        }
    </style>
</head>

<body>

    <?php $this->load->view('nav'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

            <br>

                <a href="<?php echo base_url() . 'dashboardcontroller/student_details'; ?>">
                    <div class="col-md-12 panel" style="background-color: #a3a2a2; height: 200px; display:inline-block; border-radius:30px; border:solid 3px black; ">

                        <div class="row" style="height:10px">
                        </div>

                        <h4 class="h4" align="center">Student Details</h4>

                        <div class="row" style="height:10px">
                        </div>

                        <h5 align="center">
                            <img src="../images/student_details.jpg" width="100px" height="100px"/>
                        </h5>
                    </div>
                    <br><br>
                </a>

                <a href="teacher-staff_details">
                    <div class="col-md-12 panel" style="background-color: #a3a2a2; height: 200px; display:inline-block; border-radius:30px; border:solid 3px black;">

                        <div class="row" style="height:10px">
                        </div>

                        <h4 class="h4" align="center">Teacher & Staff Member Details</h4>

                        <div class="row" style="height:10px">
                        </div>

                        <h5 align="center">
                            <img src="../images/teacher_details.jpg" width="100px" height="100px"/>
                        </h5>
                    </div>
                    <br><br>
                </a>
            
                <a href="timetables">
                    <div class="col-md-12 panel" style="background-color: #a3a2a2; height: 200px; display:inline-block; border-radius:30px; border:solid 3px black;">

                        <div class="row" style="height:10px">
                        </div>

                        <h4 class="h4" align="center">Timetables</h4>

                        <div class="row" style="height:10px">
                        </div>

                        <h5 align="center">
                            <img src="../images/timetables.png" width="100px" height="100px"/>
                        </h5>
                    </div>
                    <br><br>
                </a>

                <a href="teacherFee">
                    <div class="col-md-12 panel" style="background-color: #a3a2a2; height: 200px; display:inline-block; border-radius:30px; border:solid 3px black;">

                        <div class="row" style="height:10px">
                        </div>

                        <h4 class="h4" align="center">Teacher Fee Details</h4>

                        <div class="row" style="height:10px">
                        </div>

                        <h5 align="center">
                            <img src="../images/teacher_fee.png" width="100px" height="100px"/>
                        </h5>
                    </div>
                    <br><br>
                </a>

                <a href="studentFee">
                    <div class="col-md-12 panel" style="background-color: #a3a2a2; height: 200px; display:inline-block; border-radius:30px; border:solid 3px black;">

                        <div class="row" style="height:10px">
                        </div>

                        <h4 class="h4" align="center">Student Fee Details</h4>

                        <div class="row" style="height:10px">
                        </div>

                        <h5 align="center">
                            <img src="../images/student_fee.png" width="100px" height="100px"/>
                        </h5>
                    </div>
                </a>
                <br><br>
            </div>
        </div>
    </div>


</body>

</html>
<?php $this->load->view('script'); ?>