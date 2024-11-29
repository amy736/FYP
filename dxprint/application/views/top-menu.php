<nav class="box-navigation text-center">
                            <ul class="box-nav-ul d-flex align-items-center justify-content-center gap-30">
                                <li class="menu-item">
                                    <a href="<?= base_url(); ?>" class="item-link">Home</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#" class="item-link">Products<i class="icon icon-arrow-down"></i></a>
                                    <div class="sub-menu mega-menu">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <div class="mega-menu-item">
                                                        <div class="menu-heading">Long Sleeve</div>
                                                        <ul class="menu-list">
                                                            <!-- <li><a href="product-detail.html" class="menu-link-text link">Koleksi Kain Sarung</a></li> -->
                                                            <? if($list_tshirt_panjang){ ?>
                                                                <? foreach ($list_tshirt_panjang as $tshirt_panjang) { ?>
                                                                <li><a href="<?= base_url('main/productDetail/'.$tshirt_panjang['product_id'])?>" class="menu-link-text link" <? if($tshirt_panjang['stock'] == '0'){echo 'onclick="return false;"';} ?>><?= $tshirt_panjang['name']?>&nbsp; <? if($tshirt_panjang['stock'] == '0'){echo '<font color="red">(Out of stock)</font>';} ?></a></li>
                                                                <? } ?>
                                                            <? } else {
                                                                    echo "<font color='red'>Product is empty</font>";
                                                            } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mega-menu-item">
                                                        <div class="menu-heading">Short Sleeve</div>
                                                        <ul class="menu-list">
                                                            <? if($list_tshirt_pendek){ ?>
                                                                <? foreach ($list_tshirt_pendek as $tshirt_pendek) { ?>
                                                                <li><a href="<?= base_url('main/productDetail/'.$tshirt_pendek['product_id'])?>" class="menu-link-text link" <? if($tshirt_pendek['stock'] == '0'){echo 'onclick="return false;"';} ?>><?= $tshirt_pendek['name']?>&nbsp; <? if($tshirt_pendek['stock'] == '0'){echo '<font color="red">(Out of stock)</font>';} ?></a></li>
                                                                <? } ?>
                                                            <? } else {
                                                                    echo "<font color='red'>Product is empty</font>";
                                                            } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mega-menu-item">
                                                        <div class="menu-heading">Others</div>
                                                        <ul class="menu-list">
                                                            <? if($list_jersey){ ?>
                                                                <? foreach ($list_jersey as $jersey) { ?>
                                                                <li><a href="<?= base_url('main/productDetail/'.$jersey['product_id'])?>" class="menu-link-text link" <? if($jersey['stock'] == '0'){echo 'onclick="return false;"';} ?>><?= $jersey['name']?> &nbsp; <? if($jersey['stock'] == '0'){echo '<font color="red">(Out of stock)</font>';} ?></a></li>
                                                                <? } ?>
                                                            <? } else {
                                                                    echo "<font color='red'>Product is empty</font>";
                                                            } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mega-menu-item">
                                                        <div class="menu-heading">Uniform</div>
                                                        <ul class="menu-list">
                                                            <? if($list_uniform){ ?>
                                                                <? foreach ($list_uniform as $uniform) { ?>
                                                                <li><a href="<?= base_url('main/productDetail/'.$uniform['product_id'])?>" class="menu-link-text link" <? if($uniform['stock'] == '0'){echo 'onclick="return false;"';} ?>><?= $uniform['name']?>&nbsp; <? if($uniform['stock'] == '0'){echo '<font color="red">(Out of stock)</font>';} ?></a></li>
                                                                <? } ?>
                                                            <? } else {
                                                                    echo "<font color='red'>Product is empty</font>";
                                                            } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="menu-item"><a href="<?=base_url('main/contactUs')?>" class="item-link">Contact Us</a></li>
                            </ul>
                        </nav>