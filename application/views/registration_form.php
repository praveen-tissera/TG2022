<html>
<?php
if (isset($this->session->userdata['logged_in'])) {

    header("location: http://localhost/ciproject/index.php/user_authentication/user_login_process");
}
?>

<head>
    <?php $this->load->view('head'); ?>
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="..\css\signupstyle.css">
</head>

<body>
 



    <div class="container right-panel-active">

        <div class="row text-center">
            <div class="col-sm-12">

                <?php
                if (validation_errors()) {
                    echo "<div class='alert alert-danger' role='alert' style='height:80%; width: 45%; margin-left:400px'><span class='sr-only'>Success:</span>";
                    echo validation_errors();
                    echo "</div>";
                }
                ?>

            </div>

        </div>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 col-lg-12 text-center">
                <div class="container__form container--signup">
                    <h2 class=form__title style="margin-top: 39px;">Sign Up</h2>
                    <?php

                    echo form_open('user_authentication/new_user_registration');
                    echo "<div class='row justify-content-center'>";
                    echo "<div class='form-floating'>";
                    echo "<i class='icon fa-solid fa-user fa-lg'></i>";
                    echo "<label class='form-label' for='user'> User Name: </label>";
                    $data = array(
                        'type' => 'text',
                        'id' => 'user',
                        'name' => 'username',
                        'class' => 'form-control form-control-lg',
                        'placeholder' => 'Username:'
                    );
                    

                    echo form_input($data);
                    echo "<div class='error_msg'>";
                    if (isset($message_display)) {
                        echo "<div class='alert alert-danger' role='alert'><span class=\"label label-danger\">" . $message_display . "</span>";
                    }
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";


                    echo "<div class='row justify-content-center'>";
                    echo "<div class='form-floating'>";
                    echo "<i class='icon fa-solid fa-envelope fa-lg'></i>";
                    echo "<label class='form-label' for='email'> Email Address: </label>";
                    $data = array(
                        'type' => 'email',
                        'id' => 'email',
                        'name' => 'email_value',
                        'class' => 'form-control form-control-lg',
                        'placeholder' => 'Email Address:'
                    );
                   
                    echo form_input($data);
                    echo "</div>";
                    echo "</div>";

                    
                    echo "<div class='row justify-content-center'>";
                    echo "<div class='form-floating'>   ";
                    echo "<i class='icon fa-solid fa-key fa-lg'></i>";
                    $data = array(
                        'type' => 'text',
                        'id' => 'pass',
                        'name' => 'password',
                        'class' => 'form-control',
                        'placeholder' => 'Password:'
                    );
                    echo "<label class='form-label' for='pass'> Password: </label>";


                    echo form_password($data);
                    echo "</div>";
                    echo "</div>";
                    echo "<br>";
                    echo form_submit('submit', 'Sign Up', "class='btn'");
                    $url = base_url() . 'index.php/user_authentication';

                    echo form_close();
                    ?>

                </div>
                <div class="col-sm-4"></div>
            </div>





        </div>
        <div class="container__overlay">
            <div class="overlay">
                <div class="overlay__panel overlay--left" style="height: 104%;">
                    <h5>Already have an account?</h5>
                    <form action="user_login_show">
                        <input type="submit" class="btn" value="Sign In" style="padding: 14px default;" />
                    </form>

                </div>
                
            </div>
        </div>
    </div>

</body>

</html>
<?php $this->load->view('script'); ?>