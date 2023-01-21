<html>
<?php
if (isset($this->session->userdata['logged_in'])) {

    header("location: http://localhost/ciproject/index.php/user_authentication/user_login_process");
}
?>

<head>
    <?php $this->load->view('head'); ?>
    <title>Registration Form</title>
</head>

<body>
    <!-- Navigation -->
    <?php $this->load->view('nav'); ?>

    <!-- Half Page Image Background Carousel Header -->
    <?php $this->load->view('slider'); ?>


    <div class="container" style="margin-top:5px;">

        <div class="row text-center">
            <div class="col-sm-12">

                <?php
                if (validation_errors()) {
                    echo "<div class='alert alert-danger' role='alert'><span class='sr-only'>Success:</span>";
                    echo validation_errors();
                    echo "</div>";
                }
                ?>

            </div>

        </div>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 col-lg-12 text-center">
                <h2>Registration Form</h2>
                <?php

                echo form_open('user_authentication/new_user_registration');


                $data = array(
                    'type' => 'text',
                    'name' => 'username',
                    'class' => 'form-control',
                    'placeholder' => 'Create Username'
                );
                echo form_input($data);
                echo "<div class='error_msg'>";
                if (isset($message_display)) {
                    echo "<span class=\"label label-danger\">" . $message_display . "</span>";
                }
                echo "</div>";
                echo "<br/>";

                $data = array(
                    'type' => 'email',
                    'name' => 'email_value',
                    'class' => 'form-control',
                    'placeholder' => 'Email'
                );
                echo form_input($data);
                echo "<br/>";



                $data = array(
                    'type' => 'text',
                    'name' => 'password',
                    'class' => 'form-control',
                    'placeholder' => 'Password'
                );
                echo form_password($data);
                echo "<br/>";

                echo form_submit('submit', 'Sign Up', "class='btn btn-success'");
                $url = base_url() . 'index.php/user_authentication';
                echo "<a href=\"$url\" \" style=\"margin-left:20px;\">For Login Click Here</a>";
                echo form_close();
                ?>

            </div>
            <div class="col-sm-4"></div>
        </div>

        <hr>

        <!-- Footer -->
        <?php $this->load->view('footer'); ?>

    </div>
</body>

</html>
<?php $this->load->view('script'); ?>