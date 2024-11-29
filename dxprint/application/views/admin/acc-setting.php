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
            <!-- layout-wrap -->
           <div class="layout-wrap loader-off">
                <!-- preload -->
                <div id="preload" class="preload-container">
                    <div class="preloading">
                        <span></span>
                    </div>
                </div>
                <!-- /preload -->
                <!-- section-menu-left -->
                <div class="section-menu-left">
                    <div class="box-logo">
                        <a href="<?=base_url('admin')?>" id="site-logo-inner">
                            <h4>DXPRINT</h4>
                        </a>
                        <div class="button-show-hide">
                            <i class="icon-chevron-left"></i>
                        </div>
                    </div>
                    <div class="section-menu-left-wrap">
                        <div class="center">
                            <? include('menu.php'); ?>
                        </div>
                    </div>
                </div>
                <!-- /section-menu-left -->
                <!-- section-content-right -->
                <div class="section-content-right">
                    <!-- header-dashboard -->
                    <? $this->load->view('admin/header-dash'); ?>
                    <!-- /header-dashboard -->
                    <!-- main-content -->
                    <div class="main-content">
                        <!-- main-content-wrap -->
                        <div class="main-content-inner">
                            <!-- main-content-wrap -->
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-30">
                                    <h3>Setting</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="index.html"><div class="text-tiny">Dashboard</div></a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Setting</div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- setting -->
                                <form class="form-setting form-style-2" action="<?= base_url('manage/updateProfile')?>" method="POST">
                                    <div class="wg-box">
                                        <div class="left">
                                            <h5 class="mb-4">General Information</h5>
                                            <div class="body-text">Setting general information</div>
                                        </div>
                                        <div class="right flex-grow">
                                            <div class="cols gap24">
                                                <fieldset class="mb-24">
                                                    <div class="body-title mb-10">Name</div>
                                                    <input class="flex-grow" type="text" placeholder="First Name" name="name" tabindex="0" value="<?=$user['name']?>" aria-required="true" required="">
                                                </fieldset>
                                                <fieldset class="mb-24">
                                                    <div class="body-title mb-10">Username</div>
                                                    <input class="flex-grow" type="text" placeholder="Last Name" name="username" tabindex="0" value="<?=$user['username']?>" aria-required="true" required="">
                                                </fieldset>
                                            </div>
                                            <div class="cols gap24">
                                                <fieldset class="mb-24">
                                                    <div class="body-title mb-10">Email</div>
                                                    <input class="flex-grow" type="email" placeholder="Email" name="email" tabindex="0" value="<?=$user['email']?>" aria-required="true" required="">
                                                </fieldset>
                                                <fieldset class="mb-24">
                                                    <div class="body-title mb-10">Phone No.</div>
                                                    <input class="flex-grow" type="text" placeholder="Phone No." name="phone_no" tabindex="0" value="<?=$user['phone_no']?>" aria-required="true" required="">
                                                </fieldset>
                                            </div>
                                            <div class="cols gap24">
                                                <fieldset class="mb-24">
                                                    <div class="body-title mb-10">New Password</div>
                                                    <input class="flex-grow" type="password" placeholder="New Password" name="password" tabindex="0" aria-required="true">
                                                </fieldset>
                                                <!-- <fieldset class="mb-24">
                                                    <div class="body-title mb-10">Confirm Password</div>
                                                    <input class="flex-grow" type="password" placeholder="Confirm Password" name="cpassword" tabindex="0" aria-required="true">
                                                </fieldset> -->
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="cols gap10">
                                        <button class="tf-button w380" type="submit">Update</button>
                                    </div>
                                </form>
                                <!-- /setting -->
                            </div>
                            <!-- /main-content-wrap -->
                        </div>
                        <!-- /main-content-wrap -->
                        <!-- bottom-page -->
                        <div class="bottom-page">
                            <div class="body-text">Copyright © 2024 <a href="../index.html">DX Print</a>.</div>
                        </div>
                        <!-- /bottom-page -->
                    </div>
                    <!-- /main-content -->
                </div>
                <!-- /section-content-right -->
            </div>
            <!-- /layout-wrap -->
        </div>
        <!-- /#page -->
    </div>
    <!-- /#wrapper -->

    <div class="modal modalCentered fade form-sign-in modal-part-content" id="shipped-item-modal">
        
    </div>

    <!-- Javascript -->
    <? $this->load->view('template-office/script'); ?>

    <script type="text/javascript">

        new DataTable('#example');


        function shipThisOrder(id) {
            // body...
            $.ajax({
                url: base_url + 'manage/shippedModal',
                type: 'POST',
                data: {id:id},
                success: function(data) {
                    $('#shipped-item-modal').html(data);
                    $("#shipped-item-modal").modal('show');
                },
                error: function() {
                    alert ('error');
                }
            });
        }

        function packThisOrder(id) {
            // body...
            $.ajax({
                url: base_url + 'manage/packaging',
                type: 'POST',
                data: {id:id},
                success: function(data) {
                    alert ('Successfully save !');
                    location.reload();
                },
                error: function() {
                    alert ('error');
                }
            });
        }


        function proceedToShip(id) {
            // body...
            var trackingno = $("#track-no-id-pass").val();
            if (trackingno == '') {
                alert ('Please insert tracking number'); return;
            }
            $.ajax({
                url: base_url + 'manage/proceedShipping',
                type: 'POST',
                data: {id:id,trackingno:trackingno},
                success: function(data) {
                    alert ('Successfully save !');
                    location.reload();
                },
                error: function() {
                    alert ('error');
                }
            });
        }

        function updateStatus(id, status)
        {
            if (status === "Shipped") {

                $.ajax({
                    url: base_url + 'manage/shippedModal',
                    type: 'POST',
                    data: {id:id},
                    success: function(data) {
                        $('#shipped-item-modal').html(data);
                        $("#shipped-item-modal").modal('show');
                    },
                    error: function() {
                        alert ('error');
                    }
                });

            } else {
                $.ajax({
                    url: base_url + 'manage/packaging',
                    type: 'POST',
                    data: {id:id},
                    success: function(data) {
                        alert ('Successfully save !');
                        location.reload();
                    },
                    error: function() {
                        alert ('error');
                    }
                });
            }
        }

         <?php if ($this->session->flashdata('success')) { ?>
                var msg = '<?php echo $this->session->flashdata('success'); ?>';
                alert (msg);
        <?php } ?>

    </script>

</body>

</html>