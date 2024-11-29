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
                            <h4>DXPRINTS</h4>
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
                                    <h3>All Products</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="index.html"><div class="text-tiny">Dashboard</div></a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <a href="#"><div class="text-tiny">Product</div></a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">All Products</div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- product-list -->
                                <div class="wg-box">
                                    
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
                                            
                                        </div>
                                        <a class="tf-button style-1 w208" href="<? echo base_url('manage/addProduct'); ?>"><i class="icon-plus"></i>Add new</a>
                                    </div>
                                    
                                    <table id="example" style="width:100%" class="list-product-table">
                                        <thead style="font-size: 200%;">
                                            <tr>
                                                <th width="30%">Product</th>
                                                <th>Product ID</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Quantity</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 200%;">
                                            <? foreach ($products as $key) { ?>
                                                    <tr>
                                                        <td><?= $key['name']?></td>
                                                        <td>#<?= $key['product_id']?></td>
                                                        <td>RM<?= $key['price']?></td>
                                                        <td>
                                                            <?= ($key['stock'] == '0') ? "<div class='block-stock bg-1 fw-7'>Out of stock</div>" : "<div class='block-available bg-1 fw-7'>In stock</div>";?>
                                                            <!-- <div class="block-stock bg-1 fw-7">In Stock</div></td> -->
                                                        <td><?= $key['stock']?></td>
                                                        <td>
                                                            <a class="tf-button" href="<?=base_url('manage/editProduct/'.$key['id'])?>" style="padding: 12px; height: 12px;">Edit</a> 
                                                        </td>
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
                            <div class="body-text">Copyright © 2024 <a href="../index.html">DX Prints</a>.</div>
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

    <!-- Javascript -->
    <? $this->load->view('template-office/script'); ?>

    <script type="text/javascript">
        new DataTable('#example');
        <?php if ($this->session->flashdata('success')) { ?>
                
                var msg = "<? echo $this->session->flashdata('success'); ?>";
                alert (msg);
                
        <?php } ?>
    </script>

</body>

</html>