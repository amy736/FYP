<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<? $this->load->view('template-office/header'); ?>
<?/*<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> */?>

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
                                    <h3>Add Product</h3>
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
                                            <div class="text-tiny">Add Product</div>
                                        </li>
                                    </ul>
                                </div>
                                
                               


                                    


                                    <form class="form-add-product" action="<?= base_url('manage/doEditProduct'); ?>" method='post' id="edit-product-form">
                                    <input type="hidden" name="id" value="<?=$product['id']?>">
                                    <div class="wg-box mb-30">
                                        <fieldset class="name">
                                            <div class="body-title mb-10">Product title <span class="tf-color-1">*</span></div>
                                            <input class="mb-10" type="text" placeholder="Enter title" value="<?=$product['name']?>" name="name" tabindex="0" aria-required="true" required="">
                                            <div class="text-tiny text-surface-2">Do not exceed 20 characters when entering the product name.</div>
                                        </fieldset>
                                        <fieldset class="category">
                                            <div class="body-title mb-10">Category <span class="tf-color-1">*</span></div>
                                            <!-- <input class="" type="text" placeholder="Choose category" name="text" tabindex="0" value="" aria-required="true" required=""> -->
                                            <select name="category" required>
                                                <option value="">Choose category</option>
                                                <option value="1" <? if($product['category'] == '1'){echo"selected";} ?>>Long Sleeve</option>
                                                <option value="2" <? if($product['category'] == '2'){echo"selected";} ?>>Short Sleeve</option>
                                                <option value="3" <? if($product['category'] == '3'){echo"selected";} ?>>Others</option>
                                                <option value="4" <? if($product['category'] == '4'){echo"selected";} ?>>Uniform</option>
                                            </select>
                                        </fieldset>
                                        <div class="cols-lg gap22">
                                            <fieldset class="price">
                                                <div class="body-title mb-10">Price <span class="tf-color-1">*</span></div>
                                                <input class="" type="number" value="<?=$product['price']?>" placeholder="Price" name="price" tabindex="0"aria-required="true" required="">
                                            </fieldset>
                                            <fieldset class="category">
                                                <div class="body-title mb-10">Stock <span class="tf-color-1">*</span></div>
                                                <input class="" type="text" value="<?=$product['stock']?>" placeholder="Enter Stock" name="stock" tabindex="0" aria-required="true" required="">
                                            </fieldset>
                                            <?/*
                                            <fieldset class="variant-picker-item">
                                                <div class="variant-picker-label body-title">
                                                    Color: 
                                                    <!-- <span class="body-title-2 fw-4 variant-picker-label-value">Orange</span> -->
                                                </div>
                                                <div class="variant-picker-values">

                                                    <? foreach ($colors as $colorval) { ?>

                                                            <input id="values-<?=$colorval['value']?>" type="checkbox" name="color[]" value="<?= $colorval['id']?>">
                                                            <label class="radius-60" for="values-<?=$colorval['value']?>" data-value="<?=ucfirst($colorval['value'])?>">
                                                                <span class="btn-checkbox bg-color-<?= $colorval['value']?>"></span>
                                                            </label>

                                                    <? } ?>

                                                    <!-- <input id="values-blue" type="checkbox" name="color[]" value="2">
                                                    <label class="radius-60" for="values-blue" data-value="Blue">
                                                        <span class="btn-checkbox bg-color-blue"></span>
                                                    </label>
                                                    <input id="values-yellow" type="checkbox" name="color[]" value="3">
                                                    <label class="radius-60" for="values-yellow" data-value="Yellow">
                                                        <span class="btn-checkbox bg-color-yellow"></span>
                                                    </label>
                                                    <input id="values-black" type="checkbox" name="color[]" value="4">
                                                    <label class="radius-60" for="values-black" data-value="Black">
                                                        <span class="btn-checkbox bg-color-black"></span>
                                                    </label> -->
                                                </div>
                                            </fieldset>
                                            */?>
                                            <!-- <fieldset class="sale-price">
                                                <div class="body-title mb-10">Sale Price </div>
                                                <input class="" type="number" placeholder="Sale Price " name="text" tabindex="0" value="" aria-required="true" required="">
                                            </fieldset> -->
                                            <!-- <fieldset class="schedule">
                                                <div class="body-title mb-10">Schedule</div>
                                                <input type="date" name="date" >
                                            </fieldset> -->
                                        </div>
                                        <?/*
                                        <div class="cols-lg gap22">
                                            <!-- <fieldset class="choose-brand">
                                                <div class="body-title mb-10">Brand <span class="tf-color-1">*</span></div>
                                                <input class="" type="text" placeholder="Choose brand" name="text" tabindex="0" value="" aria-required="true" required="">
                                            </fieldset> -->
                                            <fieldset class="variant-picker-item">
                                                <div class="variant-picker-label body-title">
                                                    Size: 
                                                    <!-- <span class="body-title-2 variant-picker-label-value">S</span> -->
                                                </div>
                                                <div class="variant-picker-values">

                                                    <? foreach ($sizes as $sizeval) { ?>
                                                    
                                                    <input type="checkbox" name="size[]" id="values-<?= $sizeval['value']?>" value="<?= $sizeval['id']?>">
                                                    <label class="style-text" for="values-<?= $sizeval['value']?>" data-value="<?= $sizeval['value']?>">
                                                        <div class="text"><?= $sizeval['value']?></div>
                                                    </label>

                                                    <? } ?>

                                                    

                                                    <!-- input type="checkbox" name="size[]" id="values-m" value="6">
                                                    <label class="style-text" for="values-m" data-value="M">
                                                        <div class="text">M</div>
                                                    </label>

                                                    <input type="checkbox" name="size[]" id="values-l" value="7">
                                                    <label class="style-text" for="values-l" data-value="L">
                                                        <div class="text">L</div>
                                                    </label>

                                                    <input type="checkbox" name="size[]" id="values-xl" value="8">
                                                    <label class="style-text" for="values-xl" data-value="XL">
                                                        <div class="text">XL</div>
                                                    </label> -->
                                                </div>
                                            </fieldset>
                                            */?>
                                            <!-- <fieldset class="variant-picker-item">
                                                <div class="variant-picker-label body-title">
                                                    Size: 
                                                    <span class="body-title-2 variant-picker-label-value">S</span>
                                                </div>
                                                <div class="variant-picker-values">

                                                    <input type="checkbox" name="size" id="values-s">
                                                    <label class="style-text" for="values-s" data-value="S">
                                                        <div class="text">S</div>
                                                    </label>

                                                    <input type="checkbox" name="size" id="values-m">
                                                    <label class="style-text" for="values-m" data-value="M">
                                                        <div class="text">M</div>
                                                    </label>

                                                    <input type="checkbox" name="size" id="values-l">
                                                    <label class="style-text" for="values-l" data-value="L">
                                                        <div class="text">L</div>
                                                    </label>

                                                    <input type="checkbox" name="size" id="values-xl">
                                                    <label class="style-text" for="values-xl" data-value="XL">
                                                        <div class="text">XL</div>
                                                    </label>
                                                </div>
                                            </fieldset> -->
                                        </div>
                                        <!-- <div class="cols-lg gap22">
                                            <fieldset class="sku">
                                                <div class="body-title mb-10">SKU</div>
                                                <input class="" type="text" placeholder="Enter SKU" name="text" tabindex="0" value="" aria-required="true" required="">
                                            </fieldset>
                                            <fieldset class="category">
                                                <div class="body-title mb-10">Stock <span class="tf-color-1">*</span></div>
                                                <input class="" type="text" placeholder="Enter Stock" name="text" tabindex="0" value="" aria-required="true" required="">
                                            </fieldset>
                                            <fieldset class="sku">
                                                <div class="body-title mb-10">Tags</div>
                                                <input class="" type="text" placeholder="Enter a tag" name="text" tabindex="0" value="" aria-required="true" required="">
                                            </fieldset>
                                        </div> -->
                                        <?/*
                                        <fieldset class="description">
                                            <div class="body-title mb-10">Description <span class="tf-color-1">*</span></div>
                                            <textarea class="mb-10" name="description" placeholder="Short description about product" tabindex="0" aria-required="true" required=""></textarea>
                                            <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div>
                                        </fieldset>
                                        */?>
                                    </div>
                                
                                    <div class="cols gap10">
                                        <button class="tf-button w380" type="submit">Edit product</button>
                                        <!-- <a class="tf-button style-3 w380" onclick="javascript:clearForm();">Cancel</a> -->
                                    </div>
                                </form>
                                <!-- /form-add-product -->
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

    <? $this->load->view('template-office/script'); ?>
    <?/*<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>*/?>

    <script>
        
        /*
        var tempkey = $("#temp-key").val();

        var myDropzone = new Dropzone("#kt_dropzone_1", {
            url: base_url + 'manage/upload_product_img',
            paramName: "file", 
            maxFiles: 10,
            maxFilesize: 10,
            // addRemoveLinks: true,
            acceptedFiles: "image/*", // Accept images only
            params: {tempkey:tempkey},
            init: function () {
                this.on("success", function (file, response) {
                    // this.removeFile(file); 
                    $("#load-product-img").html(response.content);
                })
                

            }
        });
        */

        <?php if ($this->session->flashdata('success')) { ?>
                
                var msg = "<? echo $this->session->flashdata('success'); ?>";
                alert (msg);
                
        <?php } ?>

        <?php if ($this->session->flashdata('error')) { ?>
                
                var msg = "<? echo $this->session->flashdata('error'); ?>";
                alert (msg);
                
        <?php } ?>

        function clearForm() {
            document.getElementById("add-product-formid").reset();
        }

        $('.direct-upload').on('change', function(e) {

            e.preventDefault();

            const formData = new FormData($('#uploadForm')[0]);
            var tempkey = $("#temp-key").val();

            $.ajax({
                url: base_url + 'manage/upload_product_img',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(data) {
                    $('#uploadStatus').html(data.content);
                    console.log(data.content);
                    // if (data.status === 'success') {
                    //     console.log('Image uploaded:', data.filePath);
                    // } else {
                    //     console.error('Upload failed:', data.message);
                    // }
                },
                error: function() {
                    $('#uploadStatus').html('Upload error occurred!');
                }
            });

        });

        function deleteProductImg(id, tempkey) {
            // body...
            $.ajax({
                url: base_url + 'manage/deleteImg',
                type: 'POST',
                data: {id:id,tempkey:tempkey},
                dataType: "json",
                success: function(data) {
                    if (data.status == true) {
                        alert ('Image Deleted !');
                        $('#uploadStatus').html(data.content);
                    } else {
                        alert ("Error To Delete"); return;
                    }
                },
                error: function() {
                    alert ("Error on deleting");
                }
            });

        }

    </script>

</body>

</html>