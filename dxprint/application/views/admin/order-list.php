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
                                    <h3>Order List</h3>
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
                                            <div class="text-tiny">Order List</div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- product-list -->
                                <div class="wg-box">
                                    
                                    
                                    <table id="example" class="list-product-table">
                                        <thead style="font-size: 200%;">
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Payment</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 200%;">
                                            <? foreach ($orders as $key) { ?>
                                                    <? $product = get_any_table_row(array('product_id' => $key['product_id']), 'product'); ?>
                                                    <tr>
                                                        <td><?=ucfirst($product['name'])?>
                                                            <!-- <p><strong>Order ID : #<?= $key['id']?></strong></p> -->
                                                            <div class="block-available bg-1 fw-7">Order ID #<?= $key['id']?> </div>
                                                        </td>
                                                        <td>RM<?= $product['price']?></td>
                                                        <td><?= $key['quantity']?></td>
                                                        <td>RM<?=number_format($key['payment'],2)?></td>
                                                        <td>
                                                            <?
                                                            switch ($key['status']) {
                                                                case 'PAID':
                                                                    $a = "Paid";
                                                                    break;
                                                                case 'PACKAGING':
                                                                    $a = "Product Packaging";
                                                                    break;
                                                                case 'SHIPPED':
                                                                    $a = "Shipped";
                                                                    break;
                                                                case 'COMPLETE':
                                                                    $a = "Complete";
                                                                    break;
                                                                
                                                                default:
                                                                    // code...
                                                                    break;
                                                            }
                                                            ?>

                                                            <? if($key['status'] == "COMPLETE"){ ?>
                                                            <div class="block-tracking bg-1"><?=$a?></div>
                                                            <? } else { ?>
                                                            <div class='block-available bg-1 fw-7'>
                                                                <?=$a?>
                                                            </div>
                                                            <? if($key['status'] == "SHIPPED"){ ?>
                                                                <p>
                                                                    <strong>Tracking Number : <?=$key['tracking_no']?></strong>
                                                                </p>
                                                                <? } ?>
                                                            <? } ?>
                                                            
                                                        </td>
                                                        <?/*
                                                        <td>
                                                            <?= ($key['id'] == '0') ? "<div class='block-stock bg-1 fw-7'>Out of stock</div>" : "<div class='block-available bg-1 fw-7'>In stock</div>";?>
                                                        </td>
                                                        */?>
                                                        <td>
                                                            <? if($key['status'] == "PAID"){ ?>
                                                            <button class="tf-button" onclick="packThisOrder('<?=$key['id']?>')" type="submit" style="padding: 12px; height: 12px;">Packaging Order</button> 
                                                            <? } elseif ($key['status'] == "PACKAGING") { ?>
                                                            <button class="tf-button" onclick="shipThisOrder('<?=$key['id']?>')" type="submit" style="padding: 12px; height: 12px;">Ship Order</button> 
                                                            <? } elseif ($key['status'] == "SHIPPED") { ?>
                                                            
                                                            <? } else { ?>
                                                            <div class="block-available bg-1 fw-7">Delivered</div>
                                                            <? } ?>
                                                            <?/*
                                                            <select onchange="updateStatus('<?=$key['id']?>', this.value)">
                                                                <option value="">Select Option</option>
                                                                <option value="Packaging">Packaging</option>
                                                                <option value="Shipped">Shipped</option>
                                                            </select>
                                                            */?>
                                                            <a class="tf-button" href="<?=base_url('manage/orderDetails/'.$key['id'])?>" style="padding: 12px; height: 12px;">View</a> 
                                                        </td>
                                                        <!-- <td></td> -->
                                                    </tr>
                                            <? } ?>
                                        </tbody>
                                    </table>

                                </div>
                                <!-- /product-list -->
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