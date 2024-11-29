<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<? $this->load->view('template-office/header'); ?>

<body class="body">

    <!-- #wrapper -->
    <div id="wrapper">
        <!-- #page -->
        <div id="page" class="">
            <div class="login-page">
                <div class="left">
                    <div class="login-box">
                        <div>
                            <h3>Admin</h3>
                            <div class="body-text text-white">Please enter the username & password to login</div>
                        </div>
                        <form class="form-login flex flex-column gap22 w-full" action="<?= base_url('admin/login') ?>" method="post">
                            <fieldset class="email">
                                <div class="body-title mb-10 text-white">Username <span class="tf-color-1">*</span></div>
                                <input class="flex-grow" type="text" placeholder="Username" name="username" tabindex="0" value="" aria-required="true" required="">
                            </fieldset>
                            <fieldset class="password">
                                <div class="body-title mb-10 text-white">Password <span class="tf-color-1">*</span></div>
                                <input class="password-input" type="password" placeholder="Password" name="password" tabindex="0" value="" aria-required="true" required="">
                                <span class="show-pass">
                                    <i class="icon-eye view"></i>
                                    <i class="icon-eye-off hide"></i>
                                </span>
                            </fieldset>
                            <button type="submit" class="tf-button w-full">Login</button>
                        </form>
                    </div>
                </div>
                <div class="right">
                    <img src="<?= base_url()?>assets-office/images/images-section/Sign in.jpg" alt="">
                </div>
            </div>
        </div>
        <!-- /#page -->
    </div>
    <!-- /#wrapper -->

    <!-- Javascript -->
    <? $this->load->view('template-office/script'); ?>

</body>

</html>