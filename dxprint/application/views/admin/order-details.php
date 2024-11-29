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
                                    <h3>Order #<?=$order['id']?></h3>
                                    <!-- <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
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
                                            <a href="#"><div class="text-tiny">Order detail</div></a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Order #123783</div>
                                        </li>
                                    </ul> -->
                                </div>
                                <!-- order-detail -->
                                <div class="wg-order-detail">
                                    <div class="left flex-grow">
                                        <div class="wg-box mb-20">
                                            <div class="wg-table table-order-detail">
                                                <ul class="table-title flex items-center justify-between gap20 mb-24">
                                                    <li>
                                                        <div class="body-title">All item</div>
                                                    </li>    
                                                    
                                                </ul>
                                                <ul class="flex flex-column">
                                                    <li class="wg-product">
                                                        <div class="name">
                                                            <div class="image">
                                                                <? $product_img = get_any_table_row(array('product_id' => $order['product_id'], 'is_submit' => '1'), 'product_image');  ?>
                                                                <? $img_url = base_url() . $product_img['path'] . "/" . $product_img['filename']; ?>
                                                                <img src="<?=$img_url?>" alt="">
                                                            </div>
                                                            <div>
                                                                <div class="text-tiny">Product name</div>
                                                                <div class="title">
                                                                    <a href="#" class="body-title-2"><?=$product['name']?></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="text-tiny">Quantity</div>
                                                            <div class="title">
                                                                <div class="body-title-2"><?=$order['quantity']?></div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="text-tiny">Price</div>
                                                            <div class="title">
                                                                <div class="body-title-2">RM<?=number_format($order['payment'],2)?></div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="wg-box">
                                            <div class="wg-table table-cart-totals">
                                                <ul class="table-title flex mb-24">
                                                    <li>
                                                        <div class="body-title">Cart Totals</div>
                                                    </li>    
                                                    <li>
                                                        <div class="body-title">Price</div>
                                                    </li>    
                                                </ul>
                                                <ul class="flex flex-column gap14">
                                                    <!-- <li class="cart-totals-item">
                                                        <span class="body-text">Subtotal:</span>
                                                        <span class="body-title-2">$70.13</span>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li class="cart-totals-item">
                                                        <span class="body-text">Shipping:</span>
                                                        <span class="body-title-2">$10.00</span>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li class="cart-totals-item">
                                                        <span class="body-text">Tax (GST):</span>
                                                        <span class="body-title-2">$5.00</span>
                                                    </li> -->
                                                    <li class="divider"></li>
                                                    <li class="cart-totals-item">
                                                        <span class="body-title">Total price:</span>
                                                        <span class="body-title tf-color-1">RM<?=number_format($order['payment'],2)?></span>
                                                    </li>
                                                  
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="wg-box mb-20 gap10">
                                            <div class="body-title">Summary</div>
                                            <div class="summary-item">
                                                <div class="body-text">Order ID</div>
                                                <div class="body-title-2">#<?=$order['id']?></div>
                                            </div>
                                            <div class="summary-item">
                                                <div class="body-text">Date</div>
                                                <div class="body-title-2"><?=dmy($order['order_date'])?></div>
                                            </div>
                                            <div class="summary-item">
                                                <div class="body-text">Total</div>
                                                <div class="body-title-2 tf-color-1">RM<?=number_format($order['payment'],2)?></div>
                                            </div>
                                        </div>
                                        <div class="wg-box mb-20 gap10">
                                            <div class="body-title">Shipping Address</div>
                                            <div class="body-text" style="text-transform: uppercase;"><?=$address['address']?><br> <?=$address['postcode']?>, <?=$address['city']?><br><?=get_ref_code('state',$address['state'])?></div>
                                        </div>
                                        <div class="wg-box mb-20 gap10">
                                            <div class="body-title">Payment Method</div>
                                            <div class="body-text">Debit / Credit Card</div>
                                        </div>
                                        <? if($log){ ?>
                                        <div class="wg-box gap10">
                                            <div class="body-title">Expected Date Of Delivery</div>
                                            <div class="body-title-2 tf-color-2"><?=dmy($log['estimate_date'])?></div>
                                            <a class="tf-button style-1 w-full" href="<?=base_url('manage/trackOrder/'.$order['id'])?>"><i class="icon-truck"></i>Track order</a>
                                        </div>
                                        <? } else { ?>
                                        <div class="wg-box gap10">
                                            <div class="body-title">Expected Date Of Delivery</div>
                                            <div class="body-title-2 tf-color-2">Pending Shipment</div>
                                        </div>
                                        <? } ?>
                                    </div>
                                </div>
                                <!-- /order-detail -->
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