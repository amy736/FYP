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
                                    <h3>All User</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="index.html"><div class="text-tiny">Dashboard</div></a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <a href="#"><div class="text-tiny">User</div></a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">All User</div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- all-user -->
                                <div class="wg-box">
                                    
                                    <table id="example" class="list-product-table">
                                        <thead style="font-size: 200%;">
                                            <tr>
                                                <th style="text-align: left;">No</th>
                                                <th style="text-align: left;">Name</th>
                                                <th style="text-align: left;">Phone No.</th>
                                                <th style="text-align: left;">Email</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 200%;">
                                            <? $no =1; ?>
                                            <? foreach ($all_users as $key) { ?>
                                            
                                            <tr>
                                                <td style="text-align: left;"><?=$no++?></td>
                                                <td style="text-align: left;"><?=$key['name']?></td>
                                                <td style="text-align: left;"><?=$key['phone_no']?></td>
                                                <td style="text-align: left;"><?=$key['email']?></td>
                                            </tr>
                                            <? } ?>
                                        </tbody>
                                    </table>
                                    
                                </div>
                                <!-- /all-user -->
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

    </script>

</body>

</html>