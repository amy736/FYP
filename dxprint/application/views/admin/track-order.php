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
                        <a href="index.html" id="site-logo-inner">
                            <img class="" id="logo_header" alt="" src="../images/logo/logo.svg" data-light="../images/logo/logo.svg" data-dark="../images/logo/logo-white.svg" >
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
                                    <h3>Track Order</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="index.html"><div class="text-tiny">Dashboard</div></a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <a href="#"><div class="text-tiny">Order</div></a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Track Order</div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- order-track -->
                                <div class="wg-box mb-20">
                                    <div class="order-track">
                                        <div class="image">
                                            <img src="images/images-section/track-oder-1.jpg" alt="">
                                        </div>
                                        <div class="content">
                                            <h5 class="mb-20"><?=ucfirst($product['name'])?></h5>
                                            <div class="infor mb-10">
                                                <div class="body-text">Order ID</div>
                                                <div class="body-title-2">#<?=$order['id']?></div>
                                            </div>
                                            <div class="infor mb-10">
                                                <div class="body-text">Order Placed:</div>
                                                <div class="body-title-2"><?=dmy($order['order_date'])?></div>
                                            </div>
                                            <div class="infor mb-20">
                                                <div class="body-text">Quantity:</div>
                                                <div class="body-title-2"><?=$order['quantity']?></div>
                                            </div>
                                                
                                        </div>
                                    </div>
                                </div>
                                <!-- /order-track -->
                                <!-- detail -->
                                <div class="wg-box mb-20">
                                    <div>
                                        <h6 class="mb-10">Detail</h6>
                                        <div class="body-text">Items is on the way. Tracking information will be available within 24 hours.</div>
                                    </div>
                                    <div class="road-map">
                                        <? if($track){ ?>
                                        <? foreach ($track as $result) { ?>
                                        <div class="road-map-item <? if($result['status'] == '1'){echo "active";} ?>">
                                            <div class="icon"><i class="icon-check"></i></div>
                                            <h6><?=$result['checklist']?></h6>
                                            <? if($result['status'] == '1'){ ?>
                                            <div class="body-text"><?=dmy($result['complete_dt'])?></div>
                                            <? } else { ?>
                                            <div class="body-text">Pending</div>
                                            <? } ?>
                                        </div>
                                        <? } ?>
                                    <? } ?>
                                        
                                        <!-- <div class="road-map-item active">
                                            <div class="icon"><i class="icon-check"></i></div>
                                            <h6>Order processing</h6>
                                            <div class="body-text">01:21 PM</div>
                                        </div>
                                        <div class="road-map-item active">
                                            <div class="icon"><i class="icon-check"></i></div>
                                            <h6>Being delivered</h6>
                                            <div class="body-text">Processing</div>
                                        </div>
                                        <div class="road-map-item">
                                            <div class="icon"><i class="icon-check"></i></div>
                                            <h6>Delivered</h6>
                                            <div class="body-text">Pending</div>
                                        </div> -->
                                    </div>

                                </div>
                                <!-- /detail -->
                                <!-- table -->
                                <?/*
                                <div class="wg-box">
                                    <div class="wg-table table-order-track">
                                        <ul class="table-title flex mb-24 gap20">
                                            <li>
                                                <div class="body-title">Date</div>
                                            </li>    
                                            <li>
                                                <div class="body-title">Time</div>
                                            </li>    
                                            <li>
                                                <div class="body-title">Description</div>
                                            </li> 
                                            <li>
                                                <div class="body-title"></div>
                                            </li>   
                                               
                                        </ul>
                                        <ul class="flex flex-column gap14">
                                            <li class="cart-totals-item">
                                                <div class="body-text">20 Nov 2023</div>
                                                <div class="body-text">2:30 PM</div>
                                                <div class="body-text">The sender is preparing the goods</div>
                                                <!-- <div class="body-text">2715 Ash Dr. San Jose, South Dakota 83475</div> -->
                                            </li>
                                            <li class="divider"></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                */?>
                                <!-- /table -->
                            </div>
                            <!-- /main-content-wrap -->
                        </div>
                        <!-- /main-content-wrap -->
                        <!-- bottom-page -->
                        <div class="bottom-page">
                            <div class="body-text">Copyright © 2024 <a href="../index.html">Ecomus</a>. Design by Themesflat All rights reserved</div>
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