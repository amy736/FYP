<ul class="nav-icon d-flex justify-content-end align-items-center gap-20">
    <!-- <li class="nav-search">
        <a href="#canvasSearch" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="nav-icon-item"><i class="icon icon-search"></i></a>
    </li> -->

    <? if($user_id){ ?>

            <?
                    if ($user_type == "MEMBER") {
                        ?>
                            <li class="nav-account"><a href="<?= base_url('main/my_account')?>" class="nav-icon-item"><i class="icon icon-account"></i></a></li>
                        <?
                    }

            ?>

    <? } else { ?>

            <li class="nav-account"><a href="#login" data-bs-toggle="modal" class="nav-icon-item"><i class="icon icon-account"></i></a></li>

    <? } ?>

    

    <!-- <li class="nav-wishlist"><a href="wishlist.html" class="nav-icon-item"><i class="icon icon-heart"></i><span class="count-box">0</span></a></li> -->

    
    <!-- <li class="nav-cart"><a href="#shoppingCart" data-bs-toggle="modal" class="nav-icon-item"><i class="icon icon-bag"></i><span class="count-box"><?= $total_in_cart?></span></a></li> -->

    <li class="nav-cart"><a href="javascript:void(0);" onclick="viewMyCart('<?= $user_id?>')" class="nav-icon-item" data-init="<?= $user_id?>"><i class="icon icon-bag"></i><span class="count-box"><?= $total_in_cart?></span></a></li>

</ul>