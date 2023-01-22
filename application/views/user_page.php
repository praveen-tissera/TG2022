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
</head>

<body>


    <!-- Navigation -->
    <?php $this->load->view('nav'); ?>




    <div class="container" style="margin-top:60px;">

        <div class="row">
            <div class="col-6">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4 col-md-4 py-5 px-4">
                            <img width="150px" src="<?php echo base_url() ?>/images/dashboard/myaccount.png" alt="myaccount">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">MY ACCOUNT</h5>
                                <p><a href="#">Edit your account information</a></p>
                                <p><a href="#">Change your password</a></p>
                                <p><a href="#">Modify your address book entries</a></p>
                                <p><a href="#">Modify your wish list</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4 pt-4 pb-3">
                            <img width="205px" src="<?php echo base_url() ?>/images/dashboard/myorders.jpg" alt="myorders">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">MY ORDERS</h5>
                                <p><a href="#">Edit your account information</a></p>
                                <p><a href="#">Change your password</a></p>
                                <p><a href="#">Modify your address book entries</a></p>
                                <p><a href="#">Modify your wish list</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4 col-md-4 py-5 px-4">
                            <img width="150px" src="<?php echo base_url() ?>/images/dashboard/myaccount.png" alt="myaccount">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Task Management</h5>
                                <p><a href="#">Tasks Assigned for me</a></p>
                                <p><a href="<?php echo base_url() . 'tasks/add_task'; ?>">Add Task</a></p>
                                <p><a href="<?php echo base_url() . 'tasks/update_delete_task'; ?>">Update/Delete Task</a></p>
                                <p><a href="#">Manage Task Assignee</a></p>
                                <p><a href="#">Modify your address book entries</a></p>
                                <p><a href="#">Modify your wish list</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4 pt-4 pb-3">
                            <img width="205px" src="<?php echo base_url() ?>/images/dashboard/myorders.jpg" alt="myorders">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">MY ORDERS</h5>
                                <p><a href="#">Edit your account information</a></p>
                                <p><a href="#">Change your password</a></p>
                                <p><a href="#">Modify your address book entries</a></p>
                                <p><a href="#">Modify your wish list</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Family Medical Center 2015</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
</body>

</html>
<?php $this->load->view('script'); ?>